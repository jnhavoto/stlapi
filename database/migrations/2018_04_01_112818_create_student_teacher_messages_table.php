<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStudentTeacherMessagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('student_teacher_messages', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->text('message', 65535);
			$table->boolean('status');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('students_id')->unsigned()->index('fk_student_teacher_messages_students1_idx');
			$table->integer('teachers_id')->unsigned()->index('fk_student_teacher_messages_teachers1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('student_teacher_messages');
	}

}
