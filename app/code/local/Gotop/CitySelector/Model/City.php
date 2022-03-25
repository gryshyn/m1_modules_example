<?php
/**
 * Created by PhpStorm.
 * User: lucky
 * Date: 24/05/17
 * Time: 12:39
 */ 
class Gotop_CitySelector_Model_City extends Mage_Core_Model_Abstract
{

    protected function _construct()
    {
        $this->_init('gotop_cityselector/city');
    }

    public static function getSelectedCity()
    {
        if (!$cityId = Mage::getSingleton('core/session')->getSelectedCityId()) {
            $cityId = Mage::getResourceModel('gotop_cityselector/city_collection')->getFirstItem()->getId();
            Mage::getSingleton('core/session')->setSelectedCityId($cityId);
        }
        return $cityId;
    }

}