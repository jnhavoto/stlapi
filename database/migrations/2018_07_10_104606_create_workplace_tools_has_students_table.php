<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWorkplaceToolsHasStudentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('workplace_tools_has_students', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('workplace_tools_id')->index('fk_workplace_tools_has_students_workplace_tools1_idx');
			$table->integer('students_id')->unsigned()->index('fk_workplace_tools_has_students_students1_idx');
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
		Schema::drop('workplace_tools_has_students');
	}

}
