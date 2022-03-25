<?php class Gotop_PaymentTypeLegalEntity_Block_Info_PaymentTypeLegalEntity extends Mage_Payment_Block_Info
{
    protected function _prepareSpecificInformation($transport = null)
    {
        if (null !== $this->_paymentSpecificInformation)
        {
            return $this->_paymentSpecificInformation;
        }

        $data = array();
        if ($this->getInfo()->getLegalEntityCompanyName())
        {
            $data[Mage::helper('payment')->__('Company Name')] = $this->getInfo()->getLegalEntityCompanyName();
        }
        if ($this->getInfo()->getLegalEntityCompanyId())
        {
            $data[Mage::helper('payment')->__('ID')] = $this->getInfo()->getLegalEntityCompanyId();
        }
        if ($this->getInfo()->getLegalEntityCompanyAddress())
        {
            $data[Mage::helper('payment')->__('Address')] = $this->getInfo()->getLegalEntityCompanyAddress();
        }

        $transport = parent::_prepareSpecificInformation($transport);
        return $transport->setData(array_merge($data, $transport->getData()));
    }
}