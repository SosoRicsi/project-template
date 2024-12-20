<?php

use SosoRicsi\Http\Router;
use SosoRicsi\Services\Service;

Service::bind("router", function () use ($router) {
	return $router;
});

Service::bind("dotenv", function () use ($dotenv) {
	return $dotenv;
});

Service::bind("blade.compiler", function () {
	return config("blade");
});

Service::bind("db", function () use ($dotenv) {
	return config('db');
});