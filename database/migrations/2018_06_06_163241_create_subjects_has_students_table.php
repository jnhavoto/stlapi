<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSubjectsHasStudentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('subjects_has_students', function(Blueprint $table)
		{
			$table->integer('subjects_id')->index('fk_subjects_has_students_subjects1_idx');
			$table->integer('students_id')->unsigned()->index('fk_subjects_has_students_students1_idx');
			$table->integer('id', true);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('subjects_has_students');
	}

}
