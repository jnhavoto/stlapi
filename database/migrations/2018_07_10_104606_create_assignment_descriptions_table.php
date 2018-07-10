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
			$table->date('available_date')->nullable();
			$table->integer('status')->default(0);
			$table->integer('group_teachers_id')->index('fk_assignment_descriptions_group_teachers1_idx');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('courses_id')->unsigned()->index('fk_assignment_descriptions_courses1_idx');
			$table->primary(['id','courses_id']);
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
