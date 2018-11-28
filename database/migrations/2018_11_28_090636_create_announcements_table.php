<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAnnouncementsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('announcements', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('courses_id')->unsigned()->index('fk_announcement_courses1_idx');
			$table->integer('assignment_description_id')->unsigned()->index('fk_announcement_assignment_description1_idx');
			$table->text('message', 65535)->nullable();
			$table->string('subject', 45)->nullable();
			$table->integer('status')->nullable();
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
		Schema::drop('announcements');
	}

}
