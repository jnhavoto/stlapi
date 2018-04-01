<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToGroupStudentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('group_students', function(Blueprint $table)
		{
			$table->foreign('groups_id', 'fk_group_students_groups')->references('id')->on('groups')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('students_id', 'fk_group_students_students1')->references('id')->on('students')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('group_students', function(Blueprint $table)
		{
			$table->dropForeign('fk_group_students_groups');
			$table->dropForeign('fk_group_students_students1');
		});
	}

}
