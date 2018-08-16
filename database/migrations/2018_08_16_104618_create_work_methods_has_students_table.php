<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWorkMethodsHasStudentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('work_methods_has_students', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('work_methods_id')->index('fk_work_methods_has_students_work_methods1_idx');
			$table->integer('students_id')->unsigned()->index('fk_work_methods_has_students_students1_idx');
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
		Schema::drop('work_methods_has_students');
	}

}
