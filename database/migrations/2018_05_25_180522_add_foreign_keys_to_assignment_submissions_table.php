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
			$table->foreign('assignment_descriptions_id', 'fk_assignment_submissions_assignment_descriptions1')->references('id')->on('assignment_descriptions')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('students_id', 'fk_assignment_submissions_students1')->references('id')->on('students')->onUpdate('NO ACTION')->onDelete('NO ACTION');
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
			$table->dropForeign('fk_assignment_submissions_assignment_descriptions1');
			$table->dropForeign('fk_assignment_submissions_students1');
		});
	}

}
