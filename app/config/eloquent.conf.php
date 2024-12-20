<?php

use Illuminate\Database\Capsule\Manager;
use SosoRicsi\Services\Service;

$dotenv = Service::container("dotenv");

$dotenv->required([
	'DB_DRIVER',
	'DB_HOST',
	'DB_NAME',
	'DB_USER',
	'DB_PASSWORD',
	'DB_CHARSET',
	'DB_PREFIX'
]);

$config = [
	'driver' 		=> env('DB_DRIVER', "mysql"),
	'host' 		=> env('DB_HOST', "localhost"),
	'database' 	=> env('DB_NAME', ""),
	'username' 	=> env('DB_USER', "root"),
	'password' 	=> env('DB_PASSWORD'),
	'charset' 	=> env('DB_CHARSET', "utf8"),
	'collation' 	=> env('DB_COLLATION', "utf8_unicode_ci"),
	'prefix' 		=> env('DB_PREFIX', "")
];

$manager = new Manager();

$manager->addConnection($config, 'mysql');

$manager->bootEloquent();

$manager->getDatabaseManager()->setDefaultConnection('mysql');
