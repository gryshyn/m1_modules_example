<?php

class Gotop_CitySelector_Model_Observer
{
    public function changeCity(Varien_Event_Observer $observer)
    {
        $block = $observer->getEvent()->getBlock();
        if (!isset($block)) {
            return $this;
        }
        if ($block->getType() == 'searchindex/results') {
            if ($title = $block->getHeaderText()) {
                $cityModel = Mage::getModel('gotop_cityselector/city');
                $city_collection = $cityModel->getCollection();
                foreach ($city_collection as $city) {
                    if ($city->getGotopCityselectorName() == 'Другой') {
                        $city_array = ['Одес', 'Днепропетров', 'Львов', 'Николаев', 'Запорож', 'Винниц', 'Черкас',
                            'Сум', 'Бел', 'Кременчуг', 'Полтав', 'Херсон', 'Криво', 'Луцк', 'Житомир', 'Ивано'];
                        foreach ($city_array as $otherCity) {
                            if (strstr($title, $otherCity)) {
                                Mage::getSingleton('core/session')->setSelectedCityId($city->getGotopCityselectorId());
                                return $this;
                            }
                        }
                    } elseif (stristr($title, substr($city->getGotopCityselectorName(), 0, 4))) {
                        Mage::getSingleton('core/session')->setSelectedCityId($city->getGotopCityselectorId());
                        return $this;
                    }
                }
            }
        }
    }
}