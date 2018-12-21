<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAssignmentDescriptionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('assignment_description', function(Blueprint $table)
		{
			$table->increments('id');
			$table->text('case', 65535)->nullable();
			$table->integer('number')->nullable();
			$table->text('instructions', 65535)->nullable();
			$table->date('startdate');
			$table->date('deadline');
			$table->date('available_date')->nullable();
			$table->integer('status')->default(0)->comment('0=active
1=disactive');
			$table->integer('courses_id')->unsigned()->index('fk_assignment_description_courses1_idx');
			$table->integer('group_teachers_id')->index('fk_assignment_descriptions_group_teachers1_idx');
			$table->timestamps();
			$table->softDeletes();
			//$table->integer('students_id')->unsigned()->index('fk_assignment_description_students1_idx');
			//$table->integer('students_id1')->unsigned()->index('fk_assignment_description_students2_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('assignment_description');
	}

}
