<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToWorkplaceToolsHasStudentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('workplace_tools_has_students', function(Blueprint $table)
		{
			$table->foreign('workplace_tools_id', 'fk_workplace_tools_has_students_workplace_tools1')->references('id')->on('workplace_tools')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('students_id', 'fk_workplace_tools_has_students_students1')->references('id')->on('students')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('workplace_tools_has_students', function(Blueprint $table)
		{
			$table->dropForeign('fk_workplace_tools_has_students_workplace_tools1');
			$table->dropForeign('fk_workplace_tools_has_students_students1');
		});
	}

}
