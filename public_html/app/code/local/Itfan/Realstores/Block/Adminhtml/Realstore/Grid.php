<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 19.11.15
 * Time: 20:40
 */
class Itfan_Realstores_Block_Adminhtml_Realstore_Grid extends Mage_Adminhtml_Block_Widget_Grid {

    protected function _construct()
    {
        $this->setId('realstoresGrid');
        $this->_controller = 'adminhtml_realstore';
        $this->setUseAjax(true);

        $this->setDefaultSort('id');
        $this->setDefaultDir('desc');

        parent::_construct();
    }

    protected function _prepareCollection()
    { //подготавливаем коллекцию объектов которые нужно отображать
        $collection = Mage::getModel('itfan_realstores/realstore')->getCollection();
        $this->setCollection($collection);

        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {
        $this->addColumn('id',array(
            'header' => 'ID',
            'wight' => 50,
            'index' => 'id',
            'sortable' => false,
        ));
        $this->addColumn('image', array(
            'header' => 'Image',
            'wight' => 50,
            'index' => 'image',
            'sortable' => false,
        ));
        $this->addColumn('name_store', array(
            'header' => 'Name store',
            'wight' => 50,
            'index' => 'name_store',
            'sortable' => false,
        ));
        $this->addColumn('short_description', array(
            'header' => 'Short description',
            'wight' => 50,
            'index' => 'short_description',
            'sortable' => false,
        ));
        $this->addColumn('full_description', array(
            'header' => 'Full description',
            'wight' => 50,
            'index' => 'full_description',
            'sortable' => false,
        ));
        $this->addColumn('address', array(
            'header' => 'Address',
            'wight' => 50,
            'index' => 'address',
            'sortable' => false,
        ));

        return parent::_prepareColumns();
    }

    public function getRowUrl($itfan_realstores)
    {
        return $this->getUrl('*/*/edit', array(
            'id' => $itfan_realstores->getId(),
        ));
    }
}