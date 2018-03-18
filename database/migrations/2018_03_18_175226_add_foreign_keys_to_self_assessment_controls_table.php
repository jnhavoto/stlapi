<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSelfAssessmentControlsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('self_assessment_controls', function(Blueprint $table)
		{
			$table->foreign('self_assessments_id', 'fk_self_assessment_controls_self_assessments1')->references('id')->on('self_assessments')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('students_id', 'fk_self_assessment_controls_students1')->references('id')->on('students')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('self_assessment_controls', function(Blueprint $table)
		{
			$table->dropForeign('fk_self_assessment_controls_self_assessments1');
			$table->dropForeign('fk_self_assessment_controls_students1');
		});
	}

}
