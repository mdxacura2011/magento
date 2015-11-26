<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 16.11.15
 * Time: 23:06
 */
class Itfan_Realstores_Adminhtml_RealstoresController extends Mage_Adminhtml_Controller_Action {

    public function _initRealstore() {
        $helper = Mage::helper('itfan_realstores');
        $this->_title($helper->__('Real Store'))->_title($helper->__('itfan_realstores'));
        Mage::register('curent_realstore', Mage::getModel('itfan_realstores/realstore'));
        $realId = $this->getRequest()->getParam('id');
        if(!is_null($realId)) {
            Mage::registry('curent_realstore')->load($realId);
        }
    }

    public function indexAction() {
       // $this->_title($this->__('Real Store')); // указываем заголовок в вкладке
        $this->loadLayout();
        $this->_setActiveMenu('itfan_realstores'); //делает активной(подсечивает) кнопку меню модуля
        //$this->_addBreadcrumb(Mage::helper('realstore')->__('Edit quote'), Mage::helper('realstore')->__('Edit Quote'));
        $this->renderLayout();
    }

    public function newAction() {
        $this->_forward('edit'); //пересылаем на метод editAction, тоесть выполняеться editAction
    }

    public function editAction() {
        $this->_initRealstore();
        $this->loadLayout();
        $this->_setActiveMenu('itfan_realstores');
        $this->renderLayout();
    }

    public function saveAction()
    {
        $id = $this->getRequest()->getParam('id');
        if ($data = $this->getRequest()->getPost()) {
            try {
                $model = Mage::getModel('itfan_realstores/realstore');

                $model->setData($data)->setId($id);
                $model->save();

                Mage::getSingleton('adminhtml/session')->addSuccess($this->__('Data saved successfully!'));
                Mage::getSingleton('adminhtml/session')->setFormData(false);
                $this->_redirect('*/*/');
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                Mage::getSingleton('adminhtml/session')->setFormData($data);
                $this->_redirect('*/*/edit', array(
                    'id' => $this->getRequest()->getParam('id')
                ));
            }
            return;
        }
        Mage::getSingleton('adminhtml/session')->addError($this->__('Unable to find item to save'));
        $this->_redirect('*/*/');
    }
    public function deleteAction()
    {

        if ($id = $this->getRequest()->getParam('id')) {
            try {
                Mage::getModel('itfan_realstores/realstore')->setId($id)->delete();
                Mage::getSingleton('adminhtml/session')->addSuccess($this->__('Successfully deleted!'));
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                $this->_redirect('*/*/edit', array('id' => $id));
            }
        }
        $this->_redirect('*/*/');
    }

}