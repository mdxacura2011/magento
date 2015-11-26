<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 19.11.15
 * Time: 22:17
 */
class Itfan_Realstores_Block_Adminhtml_Realstore_Edit_Form extends Mage_Adminhtml_Block_Widget_Form {

    protected function _prepareForm()
    {
        $helper = Mage::helper('itfan_realstores');
        $model = Mage::registry('curent_realstore');

        $form = new Varien_Data_Form(array(
            'id' => 'edit_form',
            'action' => $this->getUrl('*/*/save', array(
                'id' => $this->getRequest()->getParam('id')
            )),
            'method' => 'post',
            'enctype' => 'multipart/form-data',
            'class' => 'validate-no-html-tags'
        ));

        $fieldset = $form->addFieldset('news_form', array('legend' => $helper->__('New information')));

        $fieldset->addField('name_store', 'text', array(
            'label' => $helper->__('Name store'),
            'required' => true,
            'name' => 'name_store',
        ));
        $fieldset->addField('short_description', 'text', array(
            'label' => $helper->__('Short description'),
            'required' => true,
            'name' => 'short_description',
        ));
        $fieldset->addField('full_description', 'textarea', array(
            'label' => $helper->__('Full description'),
            'required' => true,
            'name' => 'full_description',
            'style' => 'width: 150px; height: 200px;',
        ));
        $fieldset->addField('address', 'text', array(
            'label' => $helper->__('Address'),
            'required' => true,
            'name' => 'address',
        ));
        $fieldset->addField('image', 'image', array(
            'label'=>$helper->__('Image'),
            'name'=>'image'

        ));

        $form->setUseContainer(true);

        $data = $model->getData();
        $data['image'] = $model->getImage();

        $form->setValues($data);
        $this->setForm($form);

        return parent::_prepareForm();

    }
}