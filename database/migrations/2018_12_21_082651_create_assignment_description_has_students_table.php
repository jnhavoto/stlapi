<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAssignmentDescriptionHasStudentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('assignment_description_has_students', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('assignment_description_id')->unsigned()->index('fk_assignment_description_has_students_assignment_descripti_idx');
			$table->integer('students_id')->unsigned()->index('fk_assignment_description_has_students_students1_idx');
			$table->integer('status')->nullable()->default(0)->comment('0=fault
1=read');
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
		Schema::drop('assignment_description_has_students');
	}

}
