<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToFeedbackTypeAssignmentSubmissionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('feedback_type_assignment_submissions', function(Blueprint $table)
		{
			$table->foreign('feedback_type_id', 'fk_feedback_type_has_assignment_submissions_feedback_type1')->references('id')->on('feedback_type')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('assignment_submissions_id', 'fk_feedback_type_has_assignment_submissions_assignment_submis1')->references('id')->on('assignment_submissions')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('feedback_type_assignment_submissions', function(Blueprint $table)
		{
			$table->dropForeign('fk_feedback_type_has_assignment_submissions_feedback_type1');
			$table->dropForeign('fk_feedback_type_has_assignment_submissions_assignment_submis1');
		});
	}

}
