<?php
/**
 * Created by PhpStorm.
 * User: lucky
 * Date: 24/05/17
 * Time: 12:39
 */ 
class Gotop_CitySelector_Model_Resource_City_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{

    protected function _construct()
    {
        $this->_init('gotop_cityselector/city');
    }

}