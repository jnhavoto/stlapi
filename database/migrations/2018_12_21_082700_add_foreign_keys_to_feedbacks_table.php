<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToFeedbacksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('feedbacks', function(Blueprint $table)
		{
			$table->foreign('assignment_submissions_id', 'fk_feedbacks_assignment_submissions1')->references('id')->on('assignment_submissions')->onUpdate('NO ACTION')->onDelete('NO ACTION');
//			$table->foreign('feedbacks_todo_idfeedbacks_todo', 'fk_feedbacks_feedbacks_todo1')->references('id')->on('feedbacks_todo')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('students_id', 'fk_feedbacks_students1')->references('id')->on('students')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('feedbacks', function(Blueprint $table)
		{
			$table->dropForeign('fk_feedbacks_assignment_submissions1');
//			$table->dropForeign('fk_feedbacks_feedbacks_todo1');
			$table->dropForeign('fk_feedbacks_students1');
		});
	}

}
