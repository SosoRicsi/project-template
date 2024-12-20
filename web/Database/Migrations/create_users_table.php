<?php

use Illuminate\Database\Capsule\Manager;

class create_users_table
{
	public function up()
	{
		Manager::schema()->create('users', function ($table) {
			$table->id();
			$table->string('username', 100)->unique();
			$table->string('firstname', 100);
			$table->string('lastname', 100);
			$table->timestamp('birthday');
			$table->string('email')->unique();
			$table->string('backup_email')->unique();
			$table->string('password');
			$table->string('remember_token')->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Manager::schema()->dropIfExists('users');
	}
}
