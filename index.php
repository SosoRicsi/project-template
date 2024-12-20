<?php

use Dotenv\Dotenv;
use SosoRicsi\Http\Router;

require __DIR__."/vendor/autoload.php";

use SosoRicsi\Services\Service;
use SosoRicsi\Services\Container;
use SosoRicsi\Superglobals\Session;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

Session::init();

$app = Service::setContainer(new Container);

$router = new Router;

require __DIR__."/index/bootstrap.php";

require config("blade");
require config("eloquent");

require __DIR__."/index/routes.php";

$router->run();