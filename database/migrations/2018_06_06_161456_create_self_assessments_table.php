<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSelfAssessmentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('self_assessments', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('questions_id')->index('fk_students_has_questions_questions1_idx');
			$table->boolean('response')->nullable();
			$table->timestamps();
			$table->softDeletes();
			$table->integer('students_courses_id')->index('fk_self_assessments_students_courses1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('self_assessments');
	}

}
