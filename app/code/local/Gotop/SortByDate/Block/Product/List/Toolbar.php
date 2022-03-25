<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magento.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magento.com for more information.
 *
 * @category    Mage
 * @package     Mage_Catalog
 * @copyright  Copyright (c) 2006-2016 X.commerce, Inc. and affiliates (http://www.magento.com)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */


/**
 * Product list toolbar
 *
 * @category    Mage
 * @package     Mage_Catalog
 * @author      Magento Core Team <core@magentocommerce.com>
 */
class Gotop_SortByDate_Block_Product_List_Toolbar extends Mage_Catalog_Block_Product_List_Toolbar
{
    /**
     * Set collection to pager
     *
     * @param Varien_Data_Collection $collection
     * @return Mage_Catalog_Block_Product_List_Toolbar
     */
    public function setCollection($collection)
    {
        parent::setCollection($collection);
        if ($this->getCurrentOrder() == 'date')
            $this->_collection->setOrder('created_at', 'asc');
        return $this;
    }

    /**
     * Retrieve available Order fields list
     *
     * @return array
     */
    public function getAvailableOrders()
    {
        parent::getAvailableOrders();

        unset($this->_availableOrder['price']);
        unset($this->_availableOrder['position']);
        unset($this->_availableOrder['name']);

        $this->_availableOrder['date']='По новизне';
        $this->_availableOrder['price']=Mage::helper('catalog')->__('Price');
        $this->_availableOrder['name']=Mage::helper('catalog')->__('Name');
        $this->_availableOrder['position']=Mage::helper('catalog')->__('Position');
        $this->setDefaultOrder('date');

        return $this->_availableOrder;
    }
}
