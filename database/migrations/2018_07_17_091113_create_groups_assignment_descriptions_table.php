<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGroupsAssignmentDescriptionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('groups_assignment_descriptions', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('groups_id')->index('fk_groups_has_assignment_descriptions_groups1_idx');
			$table->integer('assignment_descriptions_id')->unsigned()->index('fk_groups_has_assignment_descriptions_assignment_descriptio_idx');
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
		Schema::drop('groups_assignment_descriptions');
	}

}
