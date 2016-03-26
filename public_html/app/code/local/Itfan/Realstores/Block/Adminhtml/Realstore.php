<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 19.11.15
 * Time: 20:35
 */
class Itfan_Realstores_Block_Adminhtml_Realstore extends Mage_Adminhtml_Block_Widget_Grid_Container {

    protected function _construct()
    {
        $this->_addButtonLabel = Mage::helper('itfan_realstores')->__('Add New Store'); //Кнопка для добавления. В маршрутизаторе дописывает new (admin/realstore/new)
        $this->_blockGroup = 'itfan_realstores'; // Указывает модуль, тоесть Itfan_Realstore_Block
        $this->_controller = 'adminhtml_realstore'; // Здесь формируеться полностью путь(Itfan_Realstore_Block_Adminhtml_Realstore) к папке где находиться Grid
        $this->_headerText = Mage::helper('itfan_realstores')->__('Store');
        parent::_construct();
    }

    public function getHeaderCssClass()
    {
        return 'icon-head head-faq';
    }
}