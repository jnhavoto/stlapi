<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAssignmentNotificationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('assignment_notifications', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->text('message');
			$table->boolean('status');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('assignment_descriptions_id')->unsigned()->index('fk_assignment_notifications_assignment_descriptions1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('assignment_notifications');
	}

}
