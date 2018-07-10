<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToGroupsAssignmentDescriptionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('groups_assignment_descriptions', function(Blueprint $table)
		{
			$table->foreign('groups_id', 'fk_groups_has_assignment_descriptions_groups1')->references('id')->on('groups')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('assignment_descriptions_id', 'fk_groups_has_assignment_descriptions_assignment_descriptions1')->references('id')->on('assignment_descriptions')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('groups_assignment_descriptions', function(Blueprint $table)
		{
			$table->dropForeign('fk_groups_has_assignment_descriptions_groups1');
			$table->dropForeign('fk_groups_has_assignment_descriptions_assignment_descriptions1');
		});
	}

}
