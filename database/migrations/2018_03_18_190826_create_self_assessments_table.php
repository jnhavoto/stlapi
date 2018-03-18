<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSelfAssessmentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('self_assessments', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('student_id')->unsigned();
			$table->boolean('level1_1');
			$table->boolean('level2_1');
			$table->boolean('level3_1');
			$table->boolean('level1_2');
			$table->boolean('level2_2');
			$table->boolean('level3_2');
			$table->boolean('level1_3');
			$table->boolean('level2_3');
			$table->boolean('level3_3');
			$table->boolean('level1_4');
			$table->boolean('level2_4');
			$table->boolean('level3_4');
			$table->boolean('level1_5');
			$table->boolean('level2_5');
			$table->boolean('level3_5');
			$table->boolean('level1_6');
			$table->boolean('level2_6');
			$table->boolean('level3_6');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('self_assessments');
	}

}
