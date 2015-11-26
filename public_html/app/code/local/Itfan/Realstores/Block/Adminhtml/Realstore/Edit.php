<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 19.11.15
 * Time: 21:43
 */
class Itfan_Realstores_Block_Adminhtml_Realstore_Edit extends Mage_Adminhtml_Block_Widget_Form_Container {
    public function _construct()
    {
        $this -> _blockGroup = 'itfan_realstores';
        $this -> _controller = 'adminhtml_realstore';
        $this->_mode = 'edit';

        parent::_construct();

        if (!Mage::registry('curent_realstore')->getId()) {
            $this -> removeButton('delete');
        }
    }

    public function getHeaderText()
    {
        $model = Mage::registry('curent_realstore');
        if ($model->getId()) {
            return Mage::helper('itfan_realstores')->__("Edit Store '%s'", $this->escapeHtml($model->getName()));
        } else {
            return Mage::helper('itfan_realstores')->__("Add new Store");
        }
    }

    public function getHeaderCssClass()
    {
        return 'icon-head head-faq';
    }
}

