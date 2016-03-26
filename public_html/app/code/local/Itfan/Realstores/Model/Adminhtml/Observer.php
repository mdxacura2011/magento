<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 02.12.15
 * Time: 22:00
 */
class Itfan_Realstores_Model_Adminhtml_Observer {


    public function onBlockHtmlBefore(Varien_Event_Observer $observer) {

        $block = $observer->getBlock();
        if(!isset($block)) return;

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

    public function catalogProductSaveBefore(Varien_Event_Observer $observer)
    {   $product = $observer->getEvent()->getProduct();
        //$product_id = Mage::registry('current_product')->getId();
        //$product=Mage::getModel('catalog/product')->load($product_id);
    }

}