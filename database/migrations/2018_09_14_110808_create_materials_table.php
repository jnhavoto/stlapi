<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMaterialsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('materials', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('file_name', 90)->nullable();
			$table->text('path')->nullable();
			$table->integer('courses_id')->unsigned()->nullable()->index('fk_course_material_courses1_idx');
			$table->integer('course_announcements_id')->nullable()->index('fk_materials_course_announcements1_idx');
			$table->integer('assignment_announcement_id')->nullable()->index('fk_materials_assignment_announcement1_idx');
			$table->integer('assignment_description_id')->unsigned()->nullable()->index('fk_materials_assignment_description1_idx');
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
		Schema::drop('materials');
	}

}
