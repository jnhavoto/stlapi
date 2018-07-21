<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAssignmentDescriptionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('assignment_description', function(Blueprint $table)
		{
			$table->foreign('group_teachers_id', 'fk_ad_group_teachers1')->references('id')->on('group_teachers')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('courses_id', 'fk_ad_courses')->references('id')->on('courses')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('assignment_template_id', 'fk_ad_a_template')->references('id')->on('assignment_template')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('assignment_description', function(Blueprint $table)
		{
			$table->dropForeign('fk_ad_group_teachers1');
			$table->dropForeign('fk_ad_courses');
			$table->dropForeign('fk_ad_a_template');
		});
	}

}
