<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCourseAnnouncementsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('course_announcements', function(Blueprint $table)
		{
			$table->foreign('courses_id', 'fk_course_announcements_courses1')->references('id')->on('courses')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('teacher_members_id', 'fk_course_announcements_teacher_members1')->references('id')->on('teacher_members')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('course_announcements', function(Blueprint $table)
		{
			$table->dropForeign('fk_course_announcements_courses1');
			$table->dropForeign('fk_course_announcements_teacher_members1');
		});
	}

}
