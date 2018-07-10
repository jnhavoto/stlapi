<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTeacherMembersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('teacher_members', function(Blueprint $table)
		{
			$table->foreign('group_teachers_id', 'fk_group_teachers_has_teachers_group_teachers1')->references('id')->on('group_teachers')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('teachers_id', 'fk_group_teachers_has_teachers_teachers1')->references('id')->on('teachers')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('teacher_members', function(Blueprint $table)
		{
			$table->dropForeign('fk_group_teachers_has_teachers_group_teachers1');
			$table->dropForeign('fk_group_teachers_has_teachers_teachers1');
		});
	}

}
