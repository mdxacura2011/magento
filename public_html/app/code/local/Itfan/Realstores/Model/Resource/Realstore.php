<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 19.11.15
 * Time: 20:02
 */
class Itfan_Realstores_Model_Resource_Realstore extends Mage_Core_Model_Resource_Db_Abstract {
    protected function _construct() {
        $this->_init('itfan_realstores/realstore', 'id');
    }
}