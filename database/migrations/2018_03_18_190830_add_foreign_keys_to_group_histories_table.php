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
			$table->foreign('assignment_descriptions_id', 'fk_group_histories_assignment_descriptions1')->references('id')->on('assignment_descriptions')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('group_assignments_id', 'fk_group_histories_group_assignments1')->references('id')->on('group_assignments')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('students_id', 'fk_group_histories_students1')->references('id')->on('students')->onUpdate('NO ACTION')->onDelete('NO ACTION');
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
			$table->dropForeign('fk_group_histories_assignment_descriptions1');
			$table->dropForeign('fk_group_histories_group_assignments1');
			$table->dropForeign('fk_group_histories_students1');
		});
	}

}
