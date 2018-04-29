<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToStudentNotificationStatusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('student_notification_status', function(Blueprint $table)
		{
			$table->foreign('students_id', 'fk_students_has_assignment_notifications_students1')->references('id')->on('students')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('assignment_notifications_id', 'fk_students_has_assignment_notifications_assignment_notificat1')->references('id')->on('assignment_announcement')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('student_notification_status', function(Blueprint $table)
		{
			$table->dropForeign('fk_students_has_assignment_notifications_students1');
			$table->dropForeign('fk_students_has_assignment_notifications_assignment_notificat1');
		});
	}

}
