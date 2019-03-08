<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAnnouncementsHasTeachersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('announcements_has_teachers', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('announcements_idannouncement')->index('fk_announcements_has_teachers_announcements1_idx');
			$table->integer('teachers_id')->unsigned()->index('fk_announcements_has_teachers_teachers1_idx');
			$table->integer('status')->nullable()->comment('0=unread, 1=read');
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
		Schema::drop('announcements_has_teachers');
	}

}
