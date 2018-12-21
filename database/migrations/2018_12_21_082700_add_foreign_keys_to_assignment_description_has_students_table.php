<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAssignmentDescriptionHasStudentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('assignment_description_has_students', function(Blueprint $table)
		{
			$table->foreign('assignment_description_id', 'fk_assignment_description_has_students_assignment_description1')->references('id')->on('assignment_description')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('students_id', 'fk_assignment_description_has_students_students1')->references('id')->on('students')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('assignment_description_has_students', function(Blueprint $table)
		{
			$table->dropForeign('fk_assignment_description_has_students_assignment_description1');
			$table->dropForeign('fk_assignment_description_has_students_students1');
		});
	}

}
