<?php

$installer = $this;
$installer->startSetup();

$table = $installer->getTable('searchlandingpage/page');


$installer->getConnection()->addColumn($table, 'content_top',
        array(
            'type' => Varien_Db_Ddl_Table::TYPE_TEXT,
            'nullable' => true,
            'comment' => 'Content Top Search Landing Page'
        )
    );

$installer->endSetup();
