<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTechUseHasStudentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('tech_use_has_students', function(Blueprint $table)
		{
			$table->foreign('tech_use_id', 'fk_tech_use_has_students_tech_use1')->references('id')->on('tech_use')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('students_id', 'fk_tech_use_has_students_students1')->references('id')->on('students')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('tech_use_has_students', function(Blueprint $table)
		{
			$table->dropForeign('fk_tech_use_has_students_tech_use1');
			$table->dropForeign('fk_tech_use_has_students_students1');
		});
	}

}
