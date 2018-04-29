<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDigitalToolsHasStudentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('digital_tools_has_students', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('digital_tools_id')->index('fk_digital_tools_has_students_digital_tools1_idx');
			$table->integer('students_id')->unsigned()->index('fk_digital_tools_has_students_students1_idx');
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
		Schema::drop('digital_tools_has_students');
	}

}
