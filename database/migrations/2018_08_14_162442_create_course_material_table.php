<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCourseMaterialTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('course_material', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->text('description', 65535)->nullable();
			$table->string('file_name', 90)->nullable();
			$table->text('path', 65535)->nullable();
			$table->integer('courses_id')->unsigned()->index('fk_course_material_courses1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('course_material');
	}

}
