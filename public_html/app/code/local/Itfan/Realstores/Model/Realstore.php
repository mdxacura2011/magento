<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 19.11.15
 * Time: 19:58
 */
class Itfan_Realstores_Model_Realstore extends Mage_Core_Model_Abstract {
    protected $imagePath = 'itfan_realstores';
    protected function _construct() {
        $this->_init('itfan_realstores/realstore');
    }

   /* protected function _afterDelete()
    {
        $helper = Mage::helper('itfan_realstores');
        @unlink($helper->getImagePath($this->getId()));
        return parent::_afterDelete();
    }

    public function getImageUrl()
    {
        $helper = Mage::helper('itfan_realstores');
        if ($this->getId() && file_exists($helper->getImagePath($this->getId()))) {
            return $helper->getImageUrl($this->getId());
        }
        return null;
    }*/


    protected function _beforeSave()
    {
        if ($this->getData('image/delete')) {
            $this->unsImage();
        }
        try {
            $uploader = new Varien_File_Uploader('image');
            $uploader->setAllowedExtensions(array('jpg','jpeg','gif','png'));
            $uploader->setAllowRenameFiles(true);

            $this->setImage($uploader);
        } catch (Exception $e) {

        }

        return parent::_beforeSave();
    }

    public function getImagePath()
    {
        return Mage::getBaseDir('media') . DS . $this->imagePath . DS;
    }

    public function setImage($image)
    {
        if ($image instanceof Varien_File_Uploader) {
            $image->save($this->getImagePath());
            $image = $image->getUploadedFileName();
        }
        $this->setData('image', $image);
        return $this;
    }

    public function getImage()
    {
        if ($image = $this->getData('image')) {
            return Mage::getBaseUrl('media') . $this->imagePath . DS . $image;
        } else {
            return '';
        }
    }

    protected function prepareImageForDelete()
    {
        $image = $this->getData('image');
        return str_replace(Mage::getBaseUrl('media'), Mage::getBaseDir('media') . DS, $image['value']);
    }

    public function unsImage()
    {
        $image = $this->getData('image');
        if (is_array($image)) {
            $image = $this->prepareImageForDelete();
        } else {
            $image = $this->getImagePath() . $image;
        }

        if (file_exists($image)) {
            unlink($image);
        }
        $this->setData('image', '');
        return $this;
    }
}
