<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAssignmentDescriptionsHasCoursesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('assignment_descriptions_has_courses', function(Blueprint $table)
		{
			$table->foreign('assignment_descriptions_id', 'fk_assignment_descriptions_has_courses_assignment_descriptions1')->references('id')->on('assignment_description')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('courses_id', 'fk_assignment_descriptions_has_courses_courses1')->references('id')->on('courses')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('assignment_descriptions_has_courses', function(Blueprint $table)
		{
			$table->dropForeign('fk_assignment_descriptions_has_courses_assignment_descriptions1');
			$table->dropForeign('fk_assignment_descriptions_has_courses_courses1');
		});
	}

}
