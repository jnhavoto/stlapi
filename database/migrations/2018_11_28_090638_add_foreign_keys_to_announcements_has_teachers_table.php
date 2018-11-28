<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAnnouncementsHasTeachersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('announcements_has_teachers', function(Blueprint $table)
		{
			$table->foreign('announcements_idannouncement', 'fk_announcements_has_teachers_announcements1')->references('id')->on('announcements')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('teachers_id', 'fk_announcements_has_teachers_teachers1')->references('id')->on('teachers')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('announcements_has_teachers', function(Blueprint $table)
		{
			$table->dropForeign('fk_announcements_has_teachers_announcements1');
			$table->dropForeign('fk_announcements_has_teachers_teachers1');
		});
	}

}
