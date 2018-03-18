<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFeedbackStudentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('feedback_students', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('assignment_submissions_id')->unsigned()->index('fk_feedback_students_assignment_submissions1_idx');
			$table->integer('students_id')->unsigned()->index('fk_feedback_students_students1_idx');
			$table->integer('feedbacks_id')->unsigned()->index('fk_feedback_students_feedbacks1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('feedback_students');
	}

}
