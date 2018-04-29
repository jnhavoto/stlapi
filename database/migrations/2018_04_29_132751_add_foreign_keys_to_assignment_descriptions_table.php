<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAssignmentDescriptionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('assignment_descriptions', function(Blueprint $table)
		{
			$table->foreign('group_teachers_id', 'fk_assignment_descriptions_group_teachers1')->references('id')->on('group_teachers')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('assignment_descriptions', function(Blueprint $table)
		{
			$table->dropForeign('fk_assignment_descriptions_group_teachers1');
		});
	}

}
