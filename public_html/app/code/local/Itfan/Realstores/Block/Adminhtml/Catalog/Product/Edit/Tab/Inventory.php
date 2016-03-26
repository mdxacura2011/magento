<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 22.11.15
 * Time: 21:30
 */
class Itfan_Realstores_Block_Adminhtml_Catalog_Product_Edit_Tab_Inventory extends Mage_Adminhtml_Block_Catalog_Product_Edit_Tab_Inventory {

    protected function _toHtml()
    {
        $result = parent::_toHtml();

            $preinventory=$this->getLayout()->createBlock('core/template')->setTemplate('realstores/realstores.phtml')->toHtml();
            $result = str_replace('</table>', $preinventory, $result);
        return $result;
    }

    /*protected function _prepareColumns() {
        $this->addColumn('realstores', array(
            'header' => Mage::helper('itfan_realstores')->__('Real store'),
            'index' => 'realstores',
            'type' => 'options',
            'width' => '70px',
            ));

        return parent::_prepareColumns();
    }*/

}