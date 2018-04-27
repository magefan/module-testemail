<?php
/**
 * Copyright © Magefan (support@magefan.com). All rights reserved.
 * See LICENSE.txt for license details (http://opensource.org/licenses/osl-3.0.php).
 */

namespace Magefan\TestEmail\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;

class InstallSchema implements InstallSchemaInterface
{

    /**
     * {@inheritdoc}
     */
    public function install(
        SchemaSetupInterface $setup,
        ModuleContextInterface $context
    ) {
        $installer = $setup;
        $installer->startSetup();

        $table_magefan_testemail_testemail = $setup->getConnection()->newTable($setup->getTable('magefan_testemail_testemail'));

        
        $table_magefan_testemail_testemail->addColumn(
            'testemail_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            array('identity' => true,'nullable' => false,'primary' => true,'unsigned' => true,),
            'Entity ID'
        );
        

        
        $table_magefan_testemail_testemail->addColumn(
            'title',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            [],
            'Test Title'
        );
        

        
        $table_magefan_testemail_testemail->addColumn(
            'type',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            [],
            'Test Type'
        );
        

        
        $table_magefan_testemail_testemail->addColumn(
            'template_identifier',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            [],
            'Test Template Identifier'
        );
        

        
        $table_magefan_testemail_testemail->addColumn(
            'creation_time',
            \Magento\Framework\DB\Ddl\Table::TYPE_DATETIME,
            null,
            [],
            'Test Creation Time'
        );
        

        
        $table_magefan_testemail_testemail->addColumn(
            'update_time',
            \Magento\Framework\DB\Ddl\Table::TYPE_DATETIME,
            null,
            [],
            'Test Update Time'
        );
        

        
        $table_magefan_testemail_testemail->addColumn(
            'variables',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            null,
            [],
            'variables'
        );
        

        
        $table_magefan_testemail_testemail->addColumn(
            'store_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            [],
            'store_id'
        );
        

        $setup->getConnection()->createTable($table_magefan_testemail_testemail);

        $setup->endSetup();
    }
}
