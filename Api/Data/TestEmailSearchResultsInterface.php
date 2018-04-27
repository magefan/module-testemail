<?php
/**
 * Copyright © Magefan (support@magefan.com). All rights reserved.
 * See LICENSE.txt for license details (http://opensource.org/licenses/osl-3.0.php).
 */

namespace Magefan\TestEmail\Api\Data;

interface TestEmailSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{


    /**
     * Get TestEmail list.
     * @return \Magefan\TestEmail\Api\Data\TestEmailInterface[]
     */
    public function getItems();

    /**
     * Set title list.
     * @param \Magefan\TestEmail\Api\Data\TestEmailInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
