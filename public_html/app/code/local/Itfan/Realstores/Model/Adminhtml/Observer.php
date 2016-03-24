<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 02.12.15
 * Time: 22:00
 */
class Itfan_Realstores_Model_Adminhtml_Observer {

    /*protected function _getAttributeOptions($attribute_code)
    {
        $attribute = Mage::getModel('catalog/product')->getAttribute('realstores', $attribute_code);
        $options = array();
        foreach( $attribute->getSource()->getAllOptions(true, true) as $option ) {
            $options[$option['value']] = $option['label'];
        }
        return $options;
    }*/

    /*public function addFieldToFilter($attribute, $condition = null)
    {
        return $this->addAttributeToFilter($attribute, $condition);
    }*/

    public function onBlockHtmlBefore(Varien_Event_Observer $observer) {

        $block = $observer->getBlock();
        if(!isset($block)) return;

        /*$_products = Mage::getResourceModel('catalog/product_collection')
            ->addAttributeToSelect(array('name'))
            ->addAttributeToFilter('realstores', array('like' => 'UX%'))
            ->load();*/


        /*$collection = Mage::getModel('catalog/product')->getCollection();
        $collection->addAttributeToSelect('name');
        $collection->addFieldToFilter(array(
            array('attribute'=>'realstores','gt'=>'100'),
        ));
        foreach ($collection as $product) {
                    //var_dump($product);
            echo '<pre>';
            print_r($product->getData());
                }
        /*$options = array();
        foreach ($collection as $item){
            if($item->getId() != ''){
                $options[$item->getId()] = $item->getName();
            }
        }*/

        switch ($block->getType()) {
            case 'adminhtml/catalog_product_grid':
                /* @var $block Mage_Adminhtml_Block_Catalog_Product_Grid */
                $block->addColumn('realstores', array(
                    'header' => Mage::helper('itfan_realstores')->__('Real stores'),
                    'index'  => 'realstores',
                    'align' => 'left',
                    'width' => '100px',
                    //'type' => 'options',
                    //'options' => $options,
                ));
                break;
        }

    }

    public function onEavLoadBeforeSee(Varien_Event_Observer $observer) {
        $collection = $observer->getCollection();
        if (!isset($collection)) return;

        if ($collection instanceof Mage_Catalog_Model_Resource_Product_Collection) {
            /* @var $collection Mage_Catalog_Model_Resource_Eav_Mysql4_Product_Collection */
            // Manipulate $collection here to add a COLUMN_ID column
            //$collection->addExpressionAttributeToSelect('realstores');
            $collection->addAttributeToSelect('realstores');
        }
    }

}