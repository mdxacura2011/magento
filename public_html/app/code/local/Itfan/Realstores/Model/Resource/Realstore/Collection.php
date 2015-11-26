<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 19.11.15
 * Time: 20:08
 */
class Itfan_Realstores_Model_Resource_Realstore_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract {
    protected function _construct() {
        $this->_init('itfan_realstores/realstore');
    }
}