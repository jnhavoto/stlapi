<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAssignmentAnnouncementTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('assignment_announcement', function(Blueprint $table)
		{
			$table->foreign('assignment_descriptions_id', 'fk_assignment_descriptions_has_teacher_members_assignment_des1')->references('id')->on('assignment_description')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('teacher_members_id', 'fk_assignment_descriptions_has_teacher_members_teacher_members1')->references('id')->on('teacher_members')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('teachers_id', 'fk_assignment_announcement_teachers1')->references('id')->on('teachers')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('assignment_announcement', function(Blueprint $table)
		{
			$table->dropForeign('fk_assignment_descriptions_has_teacher_members_assignment_des1');
			$table->dropForeign('fk_assignment_descriptions_has_teacher_members_teacher_members1');
			$table->dropForeign('fk_assignment_announcement_teachers1');
		});
	}

}
