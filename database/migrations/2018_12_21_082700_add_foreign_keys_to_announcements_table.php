<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAnnouncementsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('announcements', function(Blueprint $table)
		{
			$table->foreign('assignment_description_id', 'fk_announcement_assignment_description1')->references('id')->on('assignment_description')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('courses_id', 'fk_announcement_courses1')->references('id')->on('courses')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('announcements', function(Blueprint $table)
		{
			$table->dropForeign('fk_announcement_assignment_description1');
			$table->dropForeign('fk_announcement_courses1');
		});
	}

}
