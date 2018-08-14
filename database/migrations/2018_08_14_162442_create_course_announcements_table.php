<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCourseAnnouncementsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('course_announcements', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('courses_id')->unsigned()->index('fk_course_announcements_courses1_idx');
			$table->integer('teacher_members_id')->index('fk_course_announcements_teacher_members1_idx');
			$table->text('message', 65535)->nullable();
			$table->string('subject', 45)->nullable();
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
		Schema::drop('course_announcements');
	}

}
