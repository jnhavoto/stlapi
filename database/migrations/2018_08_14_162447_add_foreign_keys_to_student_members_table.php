<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToStudentMembersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('student_members', function(Blueprint $table)
		{
			$table->foreign('students_id', 'fk_groups_has_students_students1')->references('id')->on('students')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('groups_id', 'fk_groups_has_students_groups1')->references('id')->on('groups')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('student_members', function(Blueprint $table)
		{
			$table->dropForeign('fk_groups_has_students_students1');
			$table->dropForeign('fk_groups_has_students_groups1');
		});
	}

}
