<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToMaterialsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('materials', function(Blueprint $table)
		{
			$table->foreign('courses_id', 'fk_course_material_courses1')->references('id')->on('courses')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('assignment_announcement_id', 'fk_materials_assignment_announcement1')->references('id')->on('assignment_announcement')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('assignment_description_id', 'fk_materials_assignment_description1')->references('id')->on('assignment_description')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('course_announcements_id', 'fk_materials_course_announcements1')->references('id')->on('course_announcements')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('materials', function(Blueprint $table)
		{
			$table->dropForeign('fk_course_material_courses1');
			$table->dropForeign('fk_materials_assignment_announcement1');
			$table->dropForeign('fk_materials_assignment_description1');
			$table->dropForeign('fk_materials_course_announcements1');
		});
	}

}
