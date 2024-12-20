<?php

if (!function_exists("config")) {
	function config(string $file)
	{
		return __DIR__."/config/{$file}.conf.php";
	}
}

if (!function_exists("view")) {
	function view(string $view, array $variables)
	{
		require config("blade");

		return print $blade->make((string)$view, (array)$variables);
	}
}

if (!function_exists("dd")) {
	function dd(mixed $value)
	{
		die(var_dump($value));
	}
}