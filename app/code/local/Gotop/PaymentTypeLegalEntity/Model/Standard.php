<?php class Gotop_PaymentTypeLegalEntity_Model_Standard extends Mage_Payment_Model_Method_Abstract
{
    protected $_code = 'gotop_paymenttypelegalentity';
    protected $_isInitializeNeeded      = true;
    protected $_canUseInternal          = false;
    protected $_canUseForMultishipping  = false;

    protected $_formBlockType = 'gotop_paymenttypelegalentity/form_paymentTypeLegalEntity';
    protected $_infoBlockType = 'gotop_paymenttypelegalentity/info_paymentTypeLegalEntity';

    public function assignData($data)
    {
        $info = $this->getInfoInstance();

        if ($data->getLegalEntityCompanyName())
        {
            $info->setLegalEntityCompanyName($data->getLegalEntityCompanyName());
        }

        if ($data->getLegalEntityCompanyId())
        {
            $info->setLegalEntityCompanyId($data->getLegalEntityCompanyId());
        }

        if ($data->getLegalEntityCompanyAddress())
        {
            $info->setLegalEntityCompanyAddress($data->getLegalEntityCompanyAddress());
        }
        return $this;
    }

    public function validate()
    {
        parent::validate();
        $info = $this->getInfoInstance();

        if (!$info->getLegalEntityCompanyName())
        {
            $errorCode = 'invalid_data';
            $errorMsg = $this->_getHelper()->__("Company name is a required field.");
        }

        if (!$info->getLegalEntityCompanyId())
        {
            $errorCode = 'invalid_data';
            $errorMsg .= $this->_getHelper()->__('ID is a required field.');
        }

        if (!$info->getLegalEntityCompanyAddress())
        {
            $errorCode = 'invalid_data';
            $errorMsg .= $this->_getHelper()->__('Address is a required field.');
        }

        if ($errorMsg)
        {
            Mage::throwException($errorMsg);
        }

        return $this;
    }

    /**
     * Return Order place redirect url
     *
     * @return string
     */
//    public function getOrderPlaceRedirectUrl()
//    {
//        //when you click on place order you will be redirected on this url, if you don't want this action remove this method
//        return Mage::getUrl('legalentity/standard/redirect', array('_secure' => true));
//    }

    public function isAvailable()
    {
        return true;
    }
}