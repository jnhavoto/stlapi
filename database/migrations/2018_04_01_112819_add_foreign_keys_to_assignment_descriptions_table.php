<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAssignmentDescriptionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('assignment_descriptions', function(Blueprint $table)
		{
			$table->foreign('teacher_courses_id', 'fk_assignment_descriptions_teacher_courses1')->references('id')->on('teacher_courses')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('assignment_descriptions', function(Blueprint $table)
		{
			$table->dropForeign('fk_assignment_descriptions_teacher_courses1');
		});
	}

}
