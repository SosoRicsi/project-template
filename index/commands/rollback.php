<?php

require __DIR__ . '/../../vendor/autoload.php';

use Illuminate\Database\Capsule\Manager;

require config('db');

$lastBatch = Manager::table('migrations')->max('batch');

$migrations = Manager::table('migrations')
	->where('batch', $lastBatch)
	->orderBy('id', 'desc')
	->get();

foreach ($migrations as $migrationRecord) {
	$className = $migrationRecord->migration;
	require_once __DIR__ . "/../../web/Database/Migrations/$className.php";

	$migration = new $className();
	echo "Rolling back migration: $className\n";
	$migration->down();

	Manager::table('migrations')->where('id', $migrationRecord->id)->delete();
}
