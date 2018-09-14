<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAssignmentDescriptionsHasCoursesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('assignment_descriptions_has_courses', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('assignment_descriptions_id')->unsigned()->index('fk_assignment_descriptions_has_courses_assignment_descripti_idx');
			$table->integer('courses_id')->unsigned()->index('fk_assignment_descriptions_has_courses_courses1_idx');
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
		Schema::drop('assignment_descriptions_has_courses');
	}

}
