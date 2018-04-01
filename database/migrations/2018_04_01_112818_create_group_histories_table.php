<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGroupHistoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('group_histories', function(Blueprint $table)
		{
			$table->increments('id');
			$table->date('deadline');
			$table->integer('group_assignments_id')->unsigned()->index('fk_group_histories_group_assignments1_idx');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('groups_id')->index('fk_group_histories_groups1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('group_histories');
	}

}
