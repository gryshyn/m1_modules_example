<?php class Gotop_CitySelector_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        $cityId = $this->getRequest()->getParam('id');
        if ($cityId) {
            Mage::getSingleton('core/session')->setSelectedCityId($cityId);
            echo 1;
        }
    }
}