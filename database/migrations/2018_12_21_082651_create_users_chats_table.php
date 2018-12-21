<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersChatsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users_chats', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->text('message', 65535)->nullable();
			$table->string('subject', 45)->nullable();
			$table->integer('status')->nullable();
			$table->timestamps();
			$table->softDeletes();
			$table->integer('sender_id')->unsigned()->index('fk_users_chats_users1_idx');
			$table->integer('receiver_id')->unsigned()->index('fk_users_chats_users2_idx');
			$table->integer('courses_id')->unsigned()->nullable()->index('fk_users_chats_courses1_idx');
			$table->integer('assignment_description_id')->unsigned()->nullable()->index('fk_users_chats_assignment_description1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users_chats');
	}

}
