<?php
/**
 * Copyright © Magefan (support@magefan.com). All rights reserved.
 * See LICENSE.txt for license details (http://opensource.org/licenses/osl-3.0.php).
 */

namespace Magefan\TestEmail\Model;

use Magefan\TestEmail\Api\Data\TestEmailInterface;

class TestEmail extends \Magento\Framework\Model\AbstractModel implements TestEmailInterface
{

    protected $_eventPrefix = 'magefan_testemail_testemail';

    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Magefan\TestEmail\Model\ResourceModel\TestEmail');
    }

    /**
     * Get testemail_id
     * @return string
     */
    public function getTestemailId()
    {
        return $this->getData(self::TESTEMAIL_ID);
    }

    /**
     * Set testemail_id
     * @param string $testemailId
     * @return \Magefan\TestEmail\Api\Data\TestEmailInterface
     */
    public function setTestemailId($testemailId)
    {
        return $this->setData(self::TESTEMAIL_ID, $testemailId);
    }

    /**
     * Get title
     * @return string
     */
    public function getTitle()
    {
        return $this->getData(self::TITLE);
    }

    /**
     * Set title
     * @param string $title
     * @return \Magefan\TestEmail\Api\Data\TestEmailInterface
     */
    public function setTitle($title)
    {
        return $this->setData(self::TITLE, $title);
    }

    /**
     * Get type
     * @return string
     */
    public function getType()
    {
        return $this->getData(self::TYPE);
    }

    /**
     * Set type
     * @param string $type
     * @return \Magefan\TestEmail\Api\Data\TestEmailInterface
     */
    public function setType($type)
    {
        return $this->setData(self::TYPE, $type);
    }

    /**
     * Get template_identifier
     * @return string
     */
    public function getTemplateIdentifier()
    {
        return $this->getData(self::TEMPLATE_IDENTIFIER);
    }

    /**
     * Set template_identifier
     * @param string $templateIdentifier
     * @return \Magefan\TestEmail\Api\Data\TestEmailInterface
     */
    public function setTemplateIdentifier($templateIdentifier)
    {
        return $this->setData(self::TEMPLATE_IDENTIFIER, $templateIdentifier);
    }

    /**
     * Get creation_time
     * @return string
     */
    public function getCreationTime()
    {
        return $this->getData(self::CREATION_TIME);
    }

    /**
     * Set creation_time
     * @param string $creationTime
     * @return \Magefan\TestEmail\Api\Data\TestEmailInterface
     */
    public function setCreationTime($creationTime)
    {
        return $this->setData(self::CREATION_TIME, $creationTime);
    }

    /**
     * Get update_time
     * @return string
     */
    public function getUpdateTime()
    {
        return $this->getData(self::UPDATE_TIME);
    }

    /**
     * Set update_time
     * @param string $updateTime
     * @return \Magefan\TestEmail\Api\Data\TestEmailInterface
     */
    public function setUpdateTime($updateTime)
    {
        return $this->setData(self::UPDATE_TIME, $updateTime);
    }

    /**
     * Get variables
     * @return string
     */
    public function getVariables()
    {
        return $this->getData(self::VARIABLES);
    }

    /**
     * Set variables
     * @param string $variables
     * @return \Magefan\TestEmail\Api\Data\TestEmailInterface
     */
    public function setVariables($variables)
    {
        return $this->setData(self::VARIABLES, $variables);
    }

    /**
     * Get store_id
     * @return string
     */
    public function getStoreId()
    {
        return $this->getData(self::STORE_ID);
    }

    /**
     * Set store_id
     * @param string $storeId
     * @return \Magefan\TestEmail\Api\Data\TestEmailInterface
     */
    public function setStoreId($storeId)
    {
        return $this->setData(self::STORE_ID, $storeId);
    }
}
