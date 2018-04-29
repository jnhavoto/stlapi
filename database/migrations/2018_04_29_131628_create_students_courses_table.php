<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStudentsCoursesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('students_courses', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('students_id')->unsigned()->index('fk_students_has_courses_students1_idx');
			$table->integer('courses_id')->unsigned()->index('fk_students_has_courses_courses1_idx');
			$table->date('start_date')->nullable();
			$table->date('end_date')->nullable();
			$table->integer('status');
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
		Schema::drop('students_courses');
	}

}
