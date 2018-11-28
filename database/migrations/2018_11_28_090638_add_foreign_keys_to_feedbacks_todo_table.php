<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToFeedbacksTodoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('feedbacks_todo', function(Blueprint $table)
		{
			$table->foreign('assignment_submissions_id', 'fk_feedbacks_todo_assignment_submissions1')->references('id')->on('assignment_submissions')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('students_id', 'fk_feedbacks_todo_students1')->references('id')->on('students')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('feedbacks_todo', function(Blueprint $table)
		{
			$table->dropForeign('fk_feedbacks_todo_assignment_submissions1');
			$table->dropForeign('fk_feedbacks_todo_students1');
		});
	}

}
