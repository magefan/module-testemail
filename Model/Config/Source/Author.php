<?php
/**
 * Copyright © 2016 Ihor Vansach (ihor@magefan.com). All rights reserved.
 * See LICENSE.txt for license details (http://opensource.org/licenses/osl-3.0.php).
 *
 * Glory to Ukraine! Glory to the heroes!
 */

namespace Magefan\Blog\Model\Config\Source;

/**
 * Authors list
 *
 */
class Author extends \Magento\Email\Model\Source\Variables
{
    /**
     * @var \Magento\Newsletter\Model\ResourceModel\Template\CollectionFactory
     */
    protected $newsletterTemplateCollectionFactory;

    /**
     * @var \Magento\Email\Model\ResourceModel\Template\CollectionFactory
     */
    protected $emailTemplateCollectionFactory;

    /**
     * @var array
     */
    protected $options;

    /**
     * Initialize dependencies.
     *
     * @param \Magento\Newsletter\Model\ResourceModel\Template\CollectionFactory $newsletterTemplateCollectionFactory
     * @param \Magento\Email\Model\ResourceModel\Template\CollectionFactory $emailTemplateCollectionFactory
     * @param void
     */
    public function __construct(
        \Magento\Newsletter\Model\ResourceModel\Template\CollectionFactory $newsletterTemplateCollectionFactory,
        \Magento\Email\Model\ResourceModel\Template\CollectionFactory $emailTemplateCollectionFactory
    ) {
        $this->newsletterTemplateCollectionFactory = $newsletterTemplateCollectionFactory;
        $this->newsletterTemplateCollectionFactory = $emailTemplateCollectionFactory;

        parent::__construct();
    }

    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {

        if ($this->options === null) {

            $this->options = parent::toOptionArray();
            //$this->options = [['label' => __('Please select'), 'value' => 0]];
            $collection = $this->authorCollectionFactory->create();

            foreach ($collection as $item) {
                $this->options[] = [
                    'label' => $item->getName(),
                    'value' => $item->getId(),
                ];
            }
        }

        return $this->options;
    }

    /**
     * Get options in "key-value" format
     *
     * @return array
     */
    public function toArray()
    {
        $array = [];
        foreach ($this->toOptionArray() as $item) {
            $array[$item['value']] = $item['label'];
        }
        return $array;
    }
}
