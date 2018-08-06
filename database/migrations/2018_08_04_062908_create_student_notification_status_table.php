<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStudentNotificationStatusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('student_notification_status', function(Blueprint $table)
		{
			$table->integer('students_id')->unsigned()->index('fk_students_has_assignment_notifications_students1_idx');
			$table->integer('assignment_notifications_id')->index('fk_students_has_assignment_notifications_assignment_notific_idx');
			$table->integer('id', true);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('student_notification_status');
	}

}
