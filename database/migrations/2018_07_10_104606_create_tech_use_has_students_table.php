<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTechUseHasStudentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tech_use_has_students', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('tech_use_id')->index('fk_tech_use_has_students_tech_use1_idx');
			$table->integer('students_id')->unsigned()->index('fk_tech_use_has_students_students1_idx');
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
		Schema::drop('tech_use_has_students');
	}

}
