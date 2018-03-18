<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFeedbacksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('feedbacks', function(Blueprint $table)
		{
			$table->increments('id');
			$table->text('goal', 65535);
			$table->text('message', 65535);
			$table->text('advice', 65535);
			$table->text('comment', 65535);
			$table->date('feedback_date');
			$table->integer('assignment_submissions_id')->unsigned()->index('fk_feedbacks_assignment_submissions1_idx');
			$table->integer('students_id')->unsigned()->index('fk_feedbacks_students1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('feedbacks');
	}

}
