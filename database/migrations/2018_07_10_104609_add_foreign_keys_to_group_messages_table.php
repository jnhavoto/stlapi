<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToGroupMessagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('group_messages', function(Blueprint $table)
		{
			$table->foreign('member_id', 'fk_member_has_groups_assignment_descriptions_member1')->references('id')->on('student_members')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('groups_assignment_descriptions_id', 'fk_member_has_groups_assignment_descriptions_groups_assignmen1')->references('id')->on('groups_assignment_descriptions')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('group_messages', function(Blueprint $table)
		{
			$table->dropForeign('fk_member_has_groups_assignment_descriptions_member1');
			$table->dropForeign('fk_member_has_groups_assignment_descriptions_groups_assignmen1');
		});
	}

}
