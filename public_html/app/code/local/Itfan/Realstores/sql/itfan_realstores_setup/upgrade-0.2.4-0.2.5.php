<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 29.11.15
 * Time: 12:47
 */
$installer = $this;
$installer->startSetup();
//$installer->removeAttribute('catalog_product', 'realstores'); //удалить атрибут
$installer->addAttribute('catalog_product', 'realstores', array(
    'label' => 'Realstores',
    'type' => 'varchar', //тип данных(varchar, text)
    'input' => 'text', // способ вода данных (text, textarea)
    'global' => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE, //где будет видно (SCOPE_STORE, SCOPE_GLOBAL, website)
    'required' => 0,
    'visible' => 0,
));

$installer->endSetup();