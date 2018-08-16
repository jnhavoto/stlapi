<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQuestionsSelfAssessmentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('questions_self_assessments', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('questions_id')->index('fk_questions_has_self_assessments_questions1_idx');
			$table->integer('self_assessments_id')->index('fk_questions_has_self_assessments_self_assessments1_idx');
			$table->boolean('response')->nullable();
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
		Schema::drop('questions_self_assessments');
	}

}
