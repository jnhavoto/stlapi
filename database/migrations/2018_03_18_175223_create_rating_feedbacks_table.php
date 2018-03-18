<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRatingFeedbacksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('rating_feedbacks', function(Blueprint $table)
		{
			$table->increments('id');
			$table->text('goal', 65535);
			$table->boolean('timing');
			$table->text('message', 65535);
			$table->text('advice', 65535);
			$table->text('comment', 65535);
			$table->date('feedback_rating_date');
			$table->integer('students_id')->unsigned()->index('fk_rating_feedbacks_students1_idx');
			$table->integer('feedback_students_id')->unsigned()->index('fk_rating_feedbacks_feedback_students1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('rating_feedbacks');
	}

}
