<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToStudentTeacherMessagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('student_teacher_messages', function(Blueprint $table)
		{
			$table->foreign('students_id', 'fk_student_teacher_messages_students1')->references('id')->on('students')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('teachers_id', 'fk_student_teacher_messages_teachers1')->references('id')->on('teachers')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('student_teacher_messages', function(Blueprint $table)
		{
			$table->dropForeign('fk_student_teacher_messages_students1');
			$table->dropForeign('fk_student_teacher_messages_teachers1');
		});
	}

}
