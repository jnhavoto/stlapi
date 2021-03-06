<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStudentAnnouncementsStatusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('student_announcements_status', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('students_id')->unsigned()->index('fk_students_has_assignment_notifications_students1_idx');
			$table->integer('assignment_notifications_id')->index('fk_students_has_assignment_notifications_assignment_notific_idx');
			$table->integer('status')->nullable()->comment('0=fault
1=read');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('student_announcements_status');
	}

}
