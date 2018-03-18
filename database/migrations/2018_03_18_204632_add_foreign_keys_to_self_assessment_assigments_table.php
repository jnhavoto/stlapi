<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSelfAssessmentAssigmentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('self_assessment_assigments', function(Blueprint $table)
		{
			$table->foreign('self_assessments_id', 'fk_self_assessment_assigments_self_assessments1')->references('id')->on('self_assessments')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('teachers_id', 'fk_self_assessment_assigments_teachers1')->references('id')->on('teachers')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('self_assessment_assigments', function(Blueprint $table)
		{
			$table->dropForeign('fk_self_assessment_assigments_self_assessments1');
			$table->dropForeign('fk_self_assessment_assigments_teachers1');
		});
	}

}
