<?php
/**
 * Copyright © Magefan (support@magefan.com). All rights reserved.
 * See LICENSE.txt for license details (http://opensource.org/licenses/osl-3.0.php).
 */

namespace Magefan\TestEmail\Api\Data;

interface TestEmailInterface
{

    const VARIABLES = 'variables';
    const CREATION_TIME = 'creation_time';
    const TYPE = 'type';
    const TESTEMAIL_ID = 'testemail_id';
    const UPDATE_TIME = 'update_time';
    const TITLE = 'title';
    const TEMPLATE_IDENTIFIER = 'template_identifier';
    const STORE_ID = 'store_id';


    /**
     * Get testemail_id
     * @return string|null
     */
    public function getTestemailId();

    /**
     * Set testemail_id
     * @param string $testemailId
     * @return \Magefan\TestEmail\Api\Data\TestEmailInterface
     */
    public function setTestemailId($testemailId);

    /**
     * Get title
     * @return string|null
     */
    public function getTitle();

    /**
     * Set title
     * @param string $title
     * @return \Magefan\TestEmail\Api\Data\TestEmailInterface
     */
    public function setTitle($title);

    /**
     * Get type
     * @return string|null
     */
    public function getType();

    /**
     * Set type
     * @param string $type
     * @return \Magefan\TestEmail\Api\Data\TestEmailInterface
     */
    public function setType($type);

    /**
     * Get template_identifier
     * @return string|null
     */
    public function getTemplateIdentifier();

    /**
     * Set template_identifier
     * @param string $templateIdentifier
     * @return \Magefan\TestEmail\Api\Data\TestEmailInterface
     */
    public function setTemplateIdentifier($templateIdentifier);

    /**
     * Get creation_time
     * @return string|null
     */
    public function getCreationTime();

    /**
     * Set creation_time
     * @param string $creationTime
     * @return \Magefan\TestEmail\Api\Data\TestEmailInterface
     */
    public function setCreationTime($creationTime);

    /**
     * Get update_time
     * @return string|null
     */
    public function getUpdateTime();

    /**
     * Set update_time
     * @param string $updateTime
     * @return \Magefan\TestEmail\Api\Data\TestEmailInterface
     */
    public function setUpdateTime($updateTime);

    /**
     * Get variables
     * @return string|null
     */
    public function getVariables();

    /**
     * Set variables
     * @param string $variables
     * @return \Magefan\TestEmail\Api\Data\TestEmailInterface
     */
    public function setVariables($variables);

    /**
     * Get store_id
     * @return string|null
     */
    public function getStoreId();

    /**
     * Set store_id
     * @param string $storeId
     * @return \Magefan\TestEmail\Api\Data\TestEmailInterface
     */
    public function setStoreId($storeId);
}
