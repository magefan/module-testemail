<?php
/**
 * Copyright © Magefan (support@magefan.com). All rights reserved.
 * See LICENSE.txt for license details (http://opensource.org/licenses/osl-3.0.php).
 */

namespace Magefan\TestEmail\Model;

use Magento\Framework\Api\SortOrder;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Store\Model\StoreManagerInterface;
use Magefan\TestEmail\Api\TestEmailRepositoryInterface;
use Magefan\TestEmail\Api\Data\TestEmailSearchResultsInterfaceFactory;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magefan\TestEmail\Api\Data\TestEmailInterfaceFactory;
use Magento\Framework\Reflection\DataObjectProcessor;
use Magefan\TestEmail\Model\ResourceModel\TestEmail as ResourceTestEmail;
use Magefan\TestEmail\Model\ResourceModel\TestEmail\CollectionFactory as TestEmailCollectionFactory;

class TestEmailRepository implements testEmailRepositoryInterface
{

    protected $resource;

    private $storeManager;

    protected $dataObjectProcessor;

    protected $testEmailCollectionFactory;

    protected $searchResultsFactory;

    protected $dataObjectHelper;

    protected $testEmailFactory;

    protected $dataTestEmailFactory;


    /**
     * @param ResourceTestEmail $resource
     * @param TestEmailFactory $testEmailFactory
     * @param TestEmailInterfaceFactory $dataTestEmailFactory
     * @param TestEmailCollectionFactory $testEmailCollectionFactory
     * @param TestEmailSearchResultsInterfaceFactory $searchResultsFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param DataObjectProcessor $dataObjectProcessor
     * @param StoreManagerInterface $storeManager
     */
    public function __construct(
        ResourceTestEmail $resource,
        TestEmailFactory $testEmailFactory,
        TestEmailInterfaceFactory $dataTestEmailFactory,
        TestEmailCollectionFactory $testEmailCollectionFactory,
        TestEmailSearchResultsInterfaceFactory $searchResultsFactory,
        DataObjectHelper $dataObjectHelper,
        DataObjectProcessor $dataObjectProcessor,
        StoreManagerInterface $storeManager
    ) {
        $this->resource = $resource;
        $this->testEmailFactory = $testEmailFactory;
        $this->testEmailCollectionFactory = $testEmailCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataTestEmailFactory = $dataTestEmailFactory;
        $this->dataObjectProcessor = $dataObjectProcessor;
        $this->storeManager = $storeManager;
    }

    /**
     * {@inheritdoc}
     */
    public function save(
        \Magefan\TestEmail\Api\Data\TestEmailInterface $testEmail
    ) {
        /* if (empty($testEmail->getStoreId())) {
            $storeId = $this->storeManager->getStore()->getId();
            $testEmail->setStoreId($storeId);
        } */
        try {
            $testEmail->getResource()->save($testEmail);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the testEmail: %1',
                $exception->getMessage()
            ));
        }
        return $testEmail;
    }

    /**
     * {@inheritdoc}
     */
    public function getById($testEmailId)
    {
        $testEmail = $this->testEmailFactory->create();
        $testEmail->getResource()->load($testEmail, $testEmailId);
        if (!$testEmail->getId()) {
            throw new NoSuchEntityException(__('TestEmail with id "%1" does not exist.', $testEmailId));
        }
        return $testEmail;
    }

    /**
     * {@inheritdoc}
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->testEmailCollectionFactory->create();
        foreach ($criteria->getFilterGroups() as $filterGroup) {
            $fields = [];
            $conditions = [];
            foreach ($filterGroup->getFilters() as $filter) {
                if ($filter->getField() === 'store_id') {
                    $collection->addStoreFilter($filter->getValue(), false);
                    continue;
                }
                $fields[] = $filter->getField();
                $condition = $filter->getConditionType() ?: 'eq';
                $conditions[] = [$condition => $filter->getValue()];
            }
            $collection->addFieldToFilter($fields, $conditions);
        }
        
        $sortOrders = $criteria->getSortOrders();
        if ($sortOrders) {
            /** @var SortOrder $sortOrder */
            foreach ($sortOrders as $sortOrder) {
                $collection->addOrder(
                    $sortOrder->getField(),
                    ($sortOrder->getDirection() == SortOrder::SORT_ASC) ? 'ASC' : 'DESC'
                );
            }
        }
        $collection->setCurPage($criteria->getCurrentPage());
        $collection->setPageSize($criteria->getPageSize());
        
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        $searchResults->setTotalCount($collection->getSize());
        $searchResults->setItems($collection->getItems());
        return $searchResults;
    }

    /**
     * {@inheritdoc}
     */
    public function delete(
        \Magefan\TestEmail\Api\Data\TestEmailInterface $testEmail
    ) {
        try {
            $testEmail->getResource()->delete($testEmail);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the TestEmail: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById($testEmailId)
    {
        return $this->delete($this->getById($testEmailId));
    }
}
