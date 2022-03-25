<?php
/**
 * Created by PhpStorm.
 * User: lucky
 * Date: 24/05/17
 * Time: 12:36
 */ 
class Gotop_CitySelector_Helper_Data extends Mage_Core_Helper_Abstract {
    public function toOptionArray($isMultiSelect = false)
    {
        $methods = Mage::getSingleton('shipping/config')->getActiveCarriers();
        
        $options = array();
        
        foreach($methods as $_code => $_method)
        {
            if(!$_title = Mage::getStoreConfig("carriers/$_code/title"))
                $_title = $_code;
            $options[] = array('value' => $_code, 'label' => $_title);
        }
        
        if($isMultiSelect)
        {
            array_unshift($options, array('value'=>'', 'label'=> Mage::helper('adminhtml')->__('--Please Select--')));
        }
        
        return $options;
    }
}