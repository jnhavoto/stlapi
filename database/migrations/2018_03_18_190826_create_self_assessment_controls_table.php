<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSelfAssessmentControlsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('self_assessment_controls', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('self_assessment_number');
			$table->timestamps();
			$table->integer('students_id')->unsigned()->index('fk_self_assessment_controls_students1_idx');
			$table->integer('self_assessments_id')->unsigned()->index('fk_self_assessment_controls_self_assessments1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('self_assessment_controls');
	}

}
