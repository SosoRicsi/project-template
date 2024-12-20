<?php

namespace App\Database\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
	use SoftDeletes;

	protected $table = "users";

	protected $fillable = [
		'username',
		'firstname',
		'lastname',
		'birthday',
		'email',
		'recovery_email',
		'password',
		'remember_token'
	];

	protected $attributes = [
		//
	];
}
