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
			$table->text('digital_tools', 65535);
			$table->string('workplace_tools', 20);
			$table->text('workplace_tools_othe', 65535);
			$table->integer('teaching_grade')->unsigned();
			$table->text('work_methods', 65535);
			$table->text('subjects', 65535);
			$table->integer('years_as_teacher')->unsigned();
			$table->boolean('technical_support');
			$table->boolean('student_to_student_feedback');
			$table->text('student_to_student_feedback_other', 65535);
			$table->text('technology_use_in_teaching', 65535);
			$table->integer('cities_id')->unsigned()->index('fk_students_cities1_idx');
			$table->integer('schools_id')->unsigned()->index('fk_students_schools1_idx');
			$table->integer('users_id')->unsigned()->index('fk_students_users1_idx');
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
		Schema::drop('students');
	}

}
