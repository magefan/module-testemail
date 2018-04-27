<?php
/**
 * Copyright © Magefan (support@magefan.com). All rights reserved.
 * See LICENSE.txt for license details (http://opensource.org/licenses/osl-3.0.php).
 */

namespace Magefan\TestEmail\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface TestEmailRepositoryInterface
{


    /**
     * Save TestEmail
     * @param \Magefan\TestEmail\Api\Data\TestEmailInterface $testEmail
     * @return \Magefan\TestEmail\Api\Data\TestEmailInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Magefan\TestEmail\Api\Data\TestEmailInterface $testEmail
    );

    /**
     * Retrieve TestEmail
     * @param string $testemailId
     * @return \Magefan\TestEmail\Api\Data\TestEmailInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($testemailId);

    /**
     * Retrieve TestEmail matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Magefan\TestEmail\Api\Data\TestEmailSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete TestEmail
     * @param \Magefan\TestEmail\Api\Data\TestEmailInterface $testEmail
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Magefan\TestEmail\Api\Data\TestEmailInterface $testEmail
    );

    /**
     * Delete TestEmail by ID
     * @param string $testemailId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($testemailId);
}
