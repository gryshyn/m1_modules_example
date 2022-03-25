<?php

class Gotop_ShippingMethods_Model_Carriercourier extends Mage_Shipping_Model_Carrier_Abstract implements Mage_Shipping_Model_Carrier_Interface
{
    protected $_code = 'gotop_shippingmethodscourier';

    public function collectRates(Mage_Shipping_Model_Rate_Request $request)
    {
        /** @var Mage_Shipping_Model_Rate_Result $result */
        $result = Mage::getModel('shipping/rate_result');
        $result->append($this->_getStandardRate());

        return $result;
    }

    public function getAllowedMethods()
    {
        return array(
            'standard'    =>  'Доставка курьером'
        );
    }

    protected function _getStandardRate()
    {
        /** @var Mage_Shipping_Model_Rate_Result_Method $rate */
        $rate = Mage::getModel('shipping/rate_result_method');
        $rate->setCarrier($this->_code);
        $rate->setCarrierTitle($this->getConfigData('title'));
        $rate->setMethod('large');
        $rate->setMethodTitle('Доставка курьером');
        $rate->setPrice(0);
        $rate->setCost(0);
        return $rate;
    }
}