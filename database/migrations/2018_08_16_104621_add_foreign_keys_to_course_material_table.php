<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCourseMaterialTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('course_material', function(Blueprint $table)
		{
			$table->foreign('courses_id', 'fk_course_material_courses1')->references('id')->on('courses')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('course_material', function(Blueprint $table)
		{
			$table->dropForeign('fk_course_material_courses1');
		});
	}

}
