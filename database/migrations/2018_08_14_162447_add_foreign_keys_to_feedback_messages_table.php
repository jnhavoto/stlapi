<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToFeedbackMessagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('feedback_messages', function(Blueprint $table)
		{
			$table->foreign('students_reciever', 'fk_students_has_students_students2')->references('id')->on('students')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('students_sender', 'fk_students_has_students_students1')->references('id')->on('students')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('feedback_messages', function(Blueprint $table)
		{
			$table->dropForeign('fk_students_has_students_students2');
			$table->dropForeign('fk_students_has_students_students1');
		});
	}

}
