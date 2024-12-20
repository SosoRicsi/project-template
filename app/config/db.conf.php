<?php

use Illuminate\Database\Capsule\Manager;

$config = [
	'driver' 		=> "mysql",
	'host' 		=> "localhost",
	'database' 	=> "forum",
	'username' 	=> "root",
	'password' 	=> "root",
	'charset' 	=> "utf8",
	'collation' 	=> "utf8_unicode_ci",
	'prefix' 		=> ""
];

$manager = new Manager();

$manager->addConnection($config, 'mysql');

$manager->setAsGlobal();
$manager->bootEloquent();

$manager->getDatabaseManager()->setDefaultConnection('mysql');