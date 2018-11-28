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
			$table->text('goal', 65535)->nullable();
			$table->text('message', 65535)->nullable();
			$table->text('advice', 65535)->nullable();
			$table->text('comment', 65535)->nullable();
			$table->date('feedback_date')->nullable();
			$table->timestamps();
			$table->softDeletes();
			$table->integer('students_id')->unsigned()->index('fk_feedbacks_students1_idx');
			$table->integer('assignment_submissions_id')->unsigned()->index('fk_feedbacks_assignment_submissions1_idx');
			$table->integer('status')->nullable();
			$table->integer('feedbacks_todo_idfeedbacks_todo')->index('fk_feedbacks_feedbacks_todo1_idx');
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
