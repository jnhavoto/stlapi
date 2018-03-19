<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToGroupHistoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('group_histories', function(Blueprint $table)
		{
			$table->foreign('group_assignments_id', 'fk_group_histories_group_assignments1')->references('id')->on('group_assignments')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('groups_id', 'fk_group_histories_groups1')->references('id')->on('groups')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('group_histories', function(Blueprint $table)
		{
			$table->dropForeign('fk_group_histories_group_assignments1');
			$table->dropForeign('fk_group_histories_groups1');
		});
	}

}
