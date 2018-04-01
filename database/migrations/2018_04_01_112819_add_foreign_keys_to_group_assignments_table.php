<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToGroupAssignmentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('group_assignments', function(Blueprint $table)
		{
			$table->foreign('assignment_descriptions_id', 'fk_group_assignments_assignment_descriptions1')->references('id')->on('assignment_descriptions')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('group_assignments', function(Blueprint $table)
		{
			$table->dropForeign('fk_group_assignments_assignment_descriptions1');
		});
	}

}
