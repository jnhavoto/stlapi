<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSelfAssessmentAssigmentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('self_assessment_assigments', function(Blueprint $table)
		{
			$table->increments('id');
			$table->date('deadline');
			$table->integer('self_assessments_id')->unsigned()->index('fk_self_assessment_assigments_self_assessments1_idx');
			$table->integer('teachers_id')->unsigned()->index('fk_self_assessment_assigments_teachers1_idx');
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
		Schema::drop('self_assessment_assigments');
	}

}
