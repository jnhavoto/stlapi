<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToDigitalToolsHasStudentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('digital_tools_has_students', function(Blueprint $table)
		{
			$table->foreign('students_id', 'fk_digital_tools_has_students_students1')->references('id')->on('students')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('digital_tools_id', 'fk_digital_tools_has_students_digital_tools1')->references('id')->on('digital_tools')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('digital_tools_has_students', function(Blueprint $table)
		{
			$table->dropForeign('fk_digital_tools_has_students_students1');
			$table->dropForeign('fk_digital_tools_has_students_digital_tools1');
		});
	}

}
