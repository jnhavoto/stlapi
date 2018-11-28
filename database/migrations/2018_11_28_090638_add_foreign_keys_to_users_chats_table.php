<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToUsersChatsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users_chats', function(Blueprint $table)
		{
			$table->foreign('assignment_description_id', 'fk_users_chats_assignment_description1')->references('id')->on('assignment_description')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('courses_id', 'fk_users_chats_courses1')->references('id')->on('courses')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('sender_id', 'fk_users_chats_users1')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('receiver_id', 'fk_users_chats_users2')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users_chats', function(Blueprint $table)
		{
			$table->dropForeign('fk_users_chats_assignment_description1');
			$table->dropForeign('fk_users_chats_courses1');
			$table->dropForeign('fk_users_chats_users1');
			$table->dropForeign('fk_users_chats_users2');
		});
	}

}
