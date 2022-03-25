<?php
$installer = $this;
$installer->startSetup();
$quote_payment = $installer->getTable('sales/quote_payment');
$installer->getConnection()
    ->addColumn($quote_payment,'legal_entity_company_name', array(
        'type'      => Varien_Db_Ddl_Table::TYPE_TEXT,
        'nullable'  => false,
        'length'    => 255,
        'after'     => null, // column name to insert new column after
        'comment'   => 'Company Name'
    ));
$installer->getConnection()
    ->addColumn($quote_payment,'legal_entity_company_id', array(
        'type'      => Varien_Db_Ddl_Table::TYPE_TEXT,
        'nullable'  => false,
        'length'    => 255,
        'after'     => null, // column name to insert new column after
        'comment'   => 'Company Id'
    ));
$installer->getConnection()
    ->addColumn($quote_payment,'legal_entity_company_address', array(
        'type'      => Varien_Db_Ddl_Table::TYPE_TEXT,
        'nullable'  => false,
        'length'    => 255,
        'after'     => null, // column name to insert new column after
        'comment'   => 'Company Address'
    ));
$order_payment = $installer->getTable('sales/order_payment');
$installer->getConnection()
    ->addColumn($order_payment,'legal_entity_company_name', array(
        'type'      => Varien_Db_Ddl_Table::TYPE_TEXT,
        'nullable'  => false,
        'length'    => 255,
        'after'     => null, // column name to insert new column after
        'comment'   => 'Company Name'
    ));
$installer->getConnection()
    ->addColumn($order_payment,'legal_entity_company_id', array(
        'type'      => Varien_Db_Ddl_Table::TYPE_TEXT,
        'nullable'  => false,
        'length'    => 255,
        'after'     => null, // column name to insert new column after
        'comment'   => 'Company Id'
    ));
$installer->getConnection()
    ->addColumn($order_payment,'legal_entity_company_address', array(
        'type'      => Varien_Db_Ddl_Table::TYPE_TEXT,
        'nullable'  => false,
        'length'    => 255,
        'after'     => null, // column name to insert new column after
        'comment'   => 'Company Address'
    ));
$installer->endSetup();