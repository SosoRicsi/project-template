<?php

require __DIR__ . '/../../vendor/autoload.php';

use Illuminate\Database\Capsule\Manager;

require config('db');

$migrationFiles = glob(__DIR__ . '/../../web/Database/Migrations/*.php');

foreach ($migrationFiles as $file) {
	require_once $file;

	$className = basename($file, '.php');
	$migration = new $className();

	$alreadyRan = Manager::table('migrations')->where('migration', $className)->exists();

	if (!$alreadyRan) {
		echo "Running migration: $className\n";
		$migration->up();

		Manager::table('migrations')->insert([
			'migration' => $className,
			'batch' => 1 // Később dinamikusan növelhető
		]);
	} else {
		echo "Migration already run: $className\n";
	}
}
