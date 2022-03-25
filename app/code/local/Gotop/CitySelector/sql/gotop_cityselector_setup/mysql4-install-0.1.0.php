<?php
/**
 * Created by PhpStorm.
 * User: lucky
 * Date: 24/05/17
 * Time: 12:36
 */ 
/* @var $installer Mage_Core_Model_Resource_Setup */
$installer = $this;
$installer->startSetup();
$tableCity = $installer->getTable('gotop_cityselector/gotop_cityselector');
$table = $installer->getConnection()
    ->newTable($tableCity)
    ->addColumn('gotop_cityselector_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'identity'  => true,
        'nullable'  => false,
        'primary'   => true,
    ))
    ->addColumn('gotop_cityselector_name', Varien_Db_Ddl_Table::TYPE_TEXT, '255', array(
        'nullable'  => false,
    ))
    ->addColumn('gotop_cityselector_phone_1', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
        'nullable'  => false,
    ))
    ->addColumn('gotop_cityselector_phone_2', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
        'nullable'  => false,
    ))
    ->addColumn('gotop_cityselector_created_at', Varien_Db_Ddl_Table::TYPE_DATETIME, null, array(
        'nullable'  => false,
    ));
$installer->getConnection()->createTable($table);
$installer->endSetup();