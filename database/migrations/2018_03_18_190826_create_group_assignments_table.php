<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGroupAssignmentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('group_assignments', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('group_cod')->unsigned();
			$table->integer('presence')->unsigned();
			$table->integer('activity_date')->unsigned();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('group_assignments');
	}

}
