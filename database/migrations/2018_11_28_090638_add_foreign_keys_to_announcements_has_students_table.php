<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAnnouncementsHasStudentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('announcements_has_students', function(Blueprint $table)
		{
			$table->foreign('announcements_id', 'fk_announcements_has_students_announcements1')->references('id')->on('announcements')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('students_id', 'fk_announcements_has_students_students1')->references('id')->on('students')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('announcements_has_students', function(Blueprint $table)
		{
			$table->dropForeign('fk_announcements_has_students_announcements1');
			$table->dropForeign('fk_announcements_has_students_students1');
		});
	}

}
