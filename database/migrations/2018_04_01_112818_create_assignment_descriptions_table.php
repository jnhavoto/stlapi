<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAssignmentDescriptionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('assignment_descriptions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->text('case', 65535);
			$table->text('instructions', 65535);
			$table->date('startdate');
			$table->date('deadline');
			$table->date('available_date');
			$table->integer('teacher_courses_id')->unsigned()->index('fk_assignment_descriptions_teacher_courses1_idx');
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
		Schema::drop('assignment_descriptions');
	}

}
