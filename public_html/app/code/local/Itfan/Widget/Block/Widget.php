<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 12.01.16
 * Time: 9:47
 */
class Itfan_Widget_Block_Widget extends Mage_Core_Block_Template implements Mage_Widget_Block_Interface
{
    protected $_productImageUrl = array();

    protected function _toHtml()
    {
        $products = Mage::getModel('catalog/product')->getCollection();
        if (!isset($products)) return;

        if ($products instanceof Mage_Catalog_Model_Resource_Product_Collection) {
            $category_id = Mage::registry('current_category')->getId();
            $products->addAttributeToSelect('image');
            $products->addCategoryFilter(Mage::getModel('catalog/category')->load($category_id));
            $products->getSelect()->limit(3);
            $products->load();
            foreach ($products as $product) {
                $this->_productImageUrl[] = $product;
            }

            return parent::_toHtml();
        }
    }
}