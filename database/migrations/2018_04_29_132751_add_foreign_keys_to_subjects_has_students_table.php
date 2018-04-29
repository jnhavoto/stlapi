<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSubjectsHasStudentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('subjects_has_students', function(Blueprint $table)
		{
			$table->foreign('students_id', 'fk_subjects_has_students_students1')->references('id')->on('students')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('subjects_id', 'fk_subjects_has_students_subjects1')->references('id')->on('subjects')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('subjects_has_students', function(Blueprint $table)
		{
			$table->dropForeign('fk_subjects_has_students_students1');
			$table->dropForeign('fk_subjects_has_students_subjects1');
		});
	}

}
