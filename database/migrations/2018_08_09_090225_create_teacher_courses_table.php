<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTeacherCoursesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('teacher_courses', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('teachers_id')->unsigned()->index('fk_teacher_courses_teachers1_idx');
			$table->integer('courses_id')->unsigned()->index('fk_teacher_courses_courses1_idx');
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
		Schema::drop('teacher_courses');
	}

}
