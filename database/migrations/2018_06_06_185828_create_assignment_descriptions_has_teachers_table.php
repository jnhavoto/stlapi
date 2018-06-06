<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAssignmentDescriptionsHasTeachersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('assignment_descriptions_has_teachers', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('assignment_descriptions_id')->unsigned()->index('fk_assignment_descriptions_has_teachers_assignment_descript_idx');
			$table->integer('teachers_id')->unsigned()->index('fk_assignment_descriptions_has_teachers_teachers1_idx');
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
		Schema::drop('assignment_descriptions_has_teachers');
	}

}
