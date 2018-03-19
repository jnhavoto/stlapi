<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAssignmentSubmissionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('assignment_submissions', function(Blueprint $table)
		{
			$table->foreign('courses_id', 'fk_assignment_submissions_courses1')->references('id')->on('courses')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('group_assignments_id', 'fk_assignment_submissions_group_assignments1')->references('id')->on('group_assignments')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('teachers_id', 'fk_assignment_submissions_teachers1')->references('id')->on('teachers')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('assignment_submissions', function(Blueprint $table)
		{
			$table->dropForeign('fk_assignment_submissions_courses1');
			$table->dropForeign('fk_assignment_submissions_group_assignments1');
			$table->dropForeign('fk_assignment_submissions_teachers1');
		});
	}

}
