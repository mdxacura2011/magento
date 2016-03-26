<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 29.11.15
 * Time: 12:47
 */
$installer = $this;

$installer->startSetup();

$table = $installer->getConnection()
    ->newTable($installer->getTable('itfan_realstores/summary_table123'))
    ->addColumn('id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'identity'  => true,
        'unsigned'  => true,
        'nullable'  => false,
        'primary'   => true,
    ), 'id');
$installer->getConnection()->createTable($table);

$installer->endSetup();
/*$installer = $this;

$table2 = $installer->getTable('itfan_realstores/summary_table');
$installer->startSetup();
$table = $installer->getConnection()
    ->newTable($table2)
    ->addColumn('id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'identity'=>true,
        'autoinc'=>true,
        'nullable'=>false,
        'primary'=>true
    ));
$installer->getConnection()->createTable($table);
$installer->endSetup();