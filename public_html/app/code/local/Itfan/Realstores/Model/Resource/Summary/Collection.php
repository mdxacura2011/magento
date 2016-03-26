<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 24.03.16
 * Time: 22:32
 */
class Itfan_Realstores_Model_Resource_Summary_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract {
    protected function _construct() {
        $this->_init('itfan_realstores/summary');
    }
}