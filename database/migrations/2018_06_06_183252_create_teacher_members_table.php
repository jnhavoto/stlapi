<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTeacherMembersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('teacher_members', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('group_teachers_id')->index('fk_group_teachers_has_teachers_group_teachers1_idx');
			$table->integer('teachers_id')->unsigned()->index('fk_group_teachers_has_teachers_teachers1_idx');
			$table->timestamps();
			$table->softDeletes();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('teacher_members');
	}

}
