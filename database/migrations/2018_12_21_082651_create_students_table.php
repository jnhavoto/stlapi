<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStudentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('students', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('teaching_grade')->unsigned()->nullable();
			$table->integer('years_as_teacher')->unsigned()->nullable();
			$table->boolean('technical_support')->nullable();
			$table->boolean('student_to_student_feedback')->nullable();
			$table->text('student_to_student_feedback_other', 65535)->nullable();
			$table->timestamps();
			$table->softDeletes();
			$table->integer('users_id')->unsigned()->index('fk_students_users1_idx');
//			$table->integer('schools_id')->unsigned()->index('fk_students_schools1_idx');
//			$table->integer('cities_id')->unsigned()->index('fk_students_cities1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('students');
	}

}
