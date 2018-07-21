<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTeacherCoursesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('teacher_courses', function(Blueprint $table)
		{
			$table->foreign('teachers_id', 'fk_teacher_courses_teachers1')->references('id')->on('teachers')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('courses_id', 'fk_teacher_courses_courses1')->references('id')->on('courses')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('teacher_courses', function(Blueprint $table)
		{
			$table->dropForeign('fk_teacher_courses_teachers1');
			$table->dropForeign('fk_teacher_courses_courses1');
		});
	}

}
