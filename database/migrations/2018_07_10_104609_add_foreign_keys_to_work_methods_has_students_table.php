<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToWorkMethodsHasStudentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('work_methods_has_students', function(Blueprint $table)
		{
			$table->foreign('work_methods_id', 'fk_work_methods_has_students_work_methods1')->references('id')->on('work_methods')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('students_id', 'fk_work_methods_has_students_students1')->references('id')->on('students')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('work_methods_has_students', function(Blueprint $table)
		{
			$table->dropForeign('fk_work_methods_has_students_work_methods1');
			$table->dropForeign('fk_work_methods_has_students_students1');
		});
	}

}
