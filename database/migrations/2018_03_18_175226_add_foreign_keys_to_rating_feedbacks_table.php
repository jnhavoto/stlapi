<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToRatingFeedbacksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('rating_feedbacks', function(Blueprint $table)
		{
			$table->foreign('feedback_students_id', 'fk_rating_feedbacks_feedback_students1')->references('id')->on('feedback_students')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('students_id', 'fk_rating_feedbacks_students1')->references('id')->on('students')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('rating_feedbacks', function(Blueprint $table)
		{
			$table->dropForeign('fk_rating_feedbacks_feedback_students1');
			$table->dropForeign('fk_rating_feedbacks_students1');
		});
	}

}
