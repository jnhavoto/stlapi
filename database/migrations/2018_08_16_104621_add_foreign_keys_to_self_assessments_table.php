<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSelfAssessmentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('self_assessments', function(Blueprint $table)
		{
			$table->foreign('students_courses_id', 'fk_self_assessments_students_courses1')->references('id')->on('students_courses')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('self_assessments', function(Blueprint $table)
		{
			$table->dropForeign('fk_self_assessments_students_courses1');
		});
	}

}
