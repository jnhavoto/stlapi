<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToStudentsCoursesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('students_courses', function(Blueprint $table)
		{
			$table->foreign('students_id', 'fk_students_has_courses_students1')->references('id')->on('students')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('courses_id', 'fk_students_has_courses_courses1')->references('id')->on('courses')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('students_courses', function(Blueprint $table)
		{
			$table->dropForeign('fk_students_has_courses_students1');
			$table->dropForeign('fk_students_has_courses_courses1');
		});
	}

}
