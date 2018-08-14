<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAssignmentDescriptionsHasTeachersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('assignment_descriptions_has_teachers', function(Blueprint $table)
		{
			$table->foreign('teachers_id', 'fk_assignment_descriptions_has_teachers_teachers1')->references('id')->on('teachers')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('assignment_descriptions_id', 'fk_assignment_descriptions_has_teachers_assignment_descriptio1')->references('id')->on('assignment_description')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('assignment_descriptions_has_teachers', function(Blueprint $table)
		{
			$table->dropForeign('fk_assignment_descriptions_has_teachers_teachers1');
			$table->dropForeign('fk_assignment_descriptions_has_teachers_assignment_descriptio1');
		});
	}

}
