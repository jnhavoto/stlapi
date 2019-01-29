<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('first_name', 191);
			$table->string('last_name', 191);
			$table->string('telephone', 191)->nullable();
			$table->string('email', 191);
			$table->string('password', 191);
			$table->string('remember_token', 100)->nullable();
            $table->dateTime('last_login')->nullable();
            $table->integer('user_types_id')->unsigned()->index('fk_users_user_types1_idx');
            $table->integer('schools_id')->unsigned()->index('fk_users_schools1_idx')->nullable();
            $table->integer('cities_id')->unsigned()->index('fk_users_cities1_idx')->nullable();
			$table->timestamps();
			$table->softDeletes();
		});

//        Schema::table('users', function($table) {
//            $table->foreign('user_types_id')->references('id')->on('user_types');
////            $table->foreign('schools_id')->references('id')->on('schools')->nullable();
//////            $table->foreign('cities_id')->references('id')->on('cities')->nullable();
////
//        });
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
