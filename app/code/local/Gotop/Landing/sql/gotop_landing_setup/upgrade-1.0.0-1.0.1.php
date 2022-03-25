<?php

$installer = $this;
$installer->startSetup();

$table = $installer->getTable('searchlandingpage/page');


$installer->getConnection()->addColumn($table, 'content_bottom',
    array(
        'type' => Varien_Db_Ddl_Table::TYPE_TEXT,
        'nullable' => true,
        'comment' => 'Content Bottom Search Landing Page'
    )
);

$installer->endSetup();
