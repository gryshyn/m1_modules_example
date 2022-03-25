<?php

class Gotop_RecommendedProductsById_Block_List extends Mage_Catalog_Block_Product_List
{
    public function getRecommendedProductsById()
    {
        /** @var Mage_Catalog_Model_Product $product */
        $product = Mage::registry('current_product');

        if($product && $product->getId()){
            /** @var Mage_Catalog_Model_Resource_Product_Collection $collection */
            $collection=Mage::getModel('catalog/product')->getCollection();
            $collection->addAttributeToFilter('visibility', Mage_Catalog_Model_Product_Visibility::VISIBILITY_BOTH)
                ->addAttributeToFilter('status', 1)
                ->addAttributeToSelect(Mage::getSingleton('catalog/config')->getProductAttributes())
                ->addStoreFilter()
                ->addPriceData()
                ->addTaxPercents()
                ->setOrder('entity_id', 'ASC')
                ->addUrlRewrite();
            $collection->getSelect()->limit(10);
            $category=Mage::registry('current_category');
            if (!$category) {
                $categoryId = $product->getCategoryIds()[0];
                $category = Mage::getModel('catalog/category')->load($categoryId) ;
            }
            /** @var Mage_Catalog_Model_Category $categoryBaget */
            $categoryBaget = Mage::getModel('catalog/category')
                ->getCollection()
                ->addAttributeToFilter('url_key', 'baget')
                ->getFirstItem();
            if ($categoryBaget && ($category->getId() != $categoryBaget->getId())) {
                $bagetIds = $categoryBaget->getProductCollection()->getAllIds();
                $collection->addAttributeToFilter('entity_id', array('nin' => $bagetIds));
            }
            $collection->addCategoryFilter($category)
                ->addAttributeToFilter('entity_id',array('gt'=>$product->getId()))
                ->load();
            if($collection->count()<10){
                $products = $collection->getItems();
                $collection->clear();
                $where = $collection->getSelect()->getPart(Zend_Db_Select::WHERE);
                array_pop($where);
                $limit = 10 - count($products);
                $collection->getSelect()
                    ->setPart(Zend_Db_Select::WHERE, $where)
                    ->limit($limit);
                $collection->addAttributeToFilter('entity_id', array('lt'=>$product->getId()))
                    ->load();
                if ($products) {
                    foreach ($products as $item) {
                        $collection->addItem($item);
                    }
                }
            }
            return $collection;
        }
        return [];
    }
}