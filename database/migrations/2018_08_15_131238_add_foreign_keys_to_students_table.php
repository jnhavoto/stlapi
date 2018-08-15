<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToStudentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('students', function(Blueprint $table)
		{
			$table->foreign('users_id', 'fk_students_users1')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('schools_id', 'fk_students_schools1')->references('id')->on('schools')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('cities_id', 'fk_students_cities1')->references('id')->on('cities')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('students', function(Blueprint $table)
		{
			$table->dropForeign('fk_students_users1');
			$table->dropForeign('fk_students_schools1');
			$table->dropForeign('fk_students_cities1');
		});
	}

}
