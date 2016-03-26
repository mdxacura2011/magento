<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 24.03.16
 * Time: 22:29
 */
class Itfan_Realstores_Model_Resource_Summary extends Mage_Core_Model_Resource_Db_Abstract {

    protected function _construct() {
        $this->_init('itfan_realstores/summary', 'id');
    }
}