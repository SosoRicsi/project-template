<?php

require 'vendor/autoload.php';

use Jenssegers\Blade\Blade;

$viewPaths = env('VIEW_FOLDER');
$cachePath = env('CACHE_FOLDER');

if (!is_dir($viewPaths)) {
    die("A nézetek könyvtára nem található: " . $viewPaths);
}

if (!is_dir($cachePath)) {
    mkdir($cachePath, 0777, true);
}

try {
    $blade = new Blade($viewPaths, $cachePath);
} catch (\Exception $e) {
    echo "<pre>";
    echo "Error: " . $e->getMessage() . "\n";
    echo "File: " . $e->getFile() . "\n";
    echo "Line: " . $e->getLine() . "\n";
    echo "Trace:\n" . $e->getTraceAsString();
    echo "</pre>";
}
