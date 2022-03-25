<?php class Gotop_PaymentTypeLegalEntity_Block_Form_PaymentTypeLegalEntity extends Mage_Payment_Block_Form
{
    protected function _construct()
    {
        parent::_construct();
        $this->setTemplate('gotop_paymenttypelegalentity/form/paymenttypelegalentity.phtml');
    }
}