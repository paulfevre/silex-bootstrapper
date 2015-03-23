<?php

$schema = new \Doctrine\DBAL\Schema\Schema();

$table = $schema->createTable('myTable');
$table->addColumn('id', 'integer', array('unsigned' => true, 'autoincrement' => true));
$table->addColumn('title', 'string', array('length' => 255));
$table->setPrimaryKey(array('id'));

return $schema;
