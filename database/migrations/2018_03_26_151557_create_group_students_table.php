<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGroupStudentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('group_students', function(Blueprint $table)
		{
			$table->integer('id');
			$table->integer('groups_id')->index('fk_group_students_groups_idx');
			$table->integer('students_id')->unsigned()->index('fk_group_students_students1_idx');
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
		Schema::drop('group_students');
	}

}
