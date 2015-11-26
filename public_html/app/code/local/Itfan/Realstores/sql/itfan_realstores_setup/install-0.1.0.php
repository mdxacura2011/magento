<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 17.11.15
 * Time: 22:31
 */
$installer = $this;
$table2 = $installer->getTable('itfan_realstores/realstore');
$installer -> startSetup();
$table = $installer->getConnection()
    ->newTable($table2)
    ->addColumn('id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'identity'=>true,
        'autoinc'=>true,
        'nullable'=>false,
        'primary'=>true
    ))
    ->addColumn('foto', Varien_Db_Ddl_Table::TYPE_VARCHAR, 255, array(
        'nullable'=>false
    ))
    ->addColumn('name_store', Varien_Db_Ddl_Table::TYPE_VARCHAR, 255, array(
        'nullable'=>false
    ))
    ->addColumn('short_description', Varien_Db_Ddl_Table::TYPE_VARCHAR, 255, array(
        'nullable'=>false
    ))
    ->addColumn('full_description', Varien_Db_Ddl_Table::TYPE_TEXT, 400, array(
        'nullable'=>false
    ))
    ->addColumn('address', Varien_Db_Ddl_Table::TYPE_VARCHAR, 255, array(
        'nullable'=>false
    ));
$installer->getConnection()->createTable($table);
$installer->endSetup();