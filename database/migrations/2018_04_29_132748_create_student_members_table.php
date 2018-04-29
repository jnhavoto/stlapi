<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStudentMembersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('student_members', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('groups_id')->index('fk_groups_has_students_groups1_idx');
			$table->integer('students_id')->unsigned()->index('fk_groups_has_students_students1_idx');
			$table->boolean('status')->nullable();
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
		Schema::drop('student_members');
	}

}
