<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGroupMessagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('group_messages', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('member_id')->index('fk_member_has_groups_assignment_descriptions_member1_idx');
			$table->integer('groups_assignment_descriptions_id')->index('fk_member_has_groups_assignment_descriptions_groups_assignm_idx');
			$table->text('mensagem', 65535)->nullable();
			$table->boolean('status')->nullable();
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
		Schema::drop('group_messages');
	}

}
