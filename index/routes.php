<?php

use App\Database\Models\User;
use SosoRicsi\Services\Service;
use SosoRicsi\Superglobals\Session;

$router->get("/", function () {
	/* User::create([
		'username' => "JRicsi",
		'firstname' => "Jarkó",
		'lastname' => "Ricsi",
		'birthday' => date(("Y-m-d H:i:s")),
		'email' => "jarkoricsi16@gmail.com",
		'backup_email' => "jarkoricsi16@gmail.com",
		'password' => "123",
		'remember_token' => '123'
	]); */

	/* User::where('ID', 4)->delete(); */

	$users = User::withTrashed()->get();

	dd($users);

	view('home', [
		'name' => "Jarkó Ricsi",
		'users' => $users
	]);
});

$router->errors([
	[
		"error" => 404,
		"handler" => function () {
			print "Oops! The page you are looking for does not exist.";
		}
	]
]);
