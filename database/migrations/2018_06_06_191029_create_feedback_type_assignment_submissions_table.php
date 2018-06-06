<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFeedbackTypeAssignmentSubmissionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('feedback_type_assignment_submissions', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('feedback_type_id')->index('fk_feedback_type_has_assignment_submissions_feedback_type1_idx');
			$table->integer('assignment_submissions_id')->unsigned()->index('fk_feedback_type_has_assignment_submissions_assignment_subm_idx');
			$table->timestamps();
			$table->softDeletes();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('feedback_type_assignment_submissions');
	}

}
