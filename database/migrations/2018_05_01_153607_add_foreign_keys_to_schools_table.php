<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSchoolsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('schools', function(Blueprint $table)
		{
			$table->foreign('cities_id', 'fk_schools_cities1')->references('id')->on('cities')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('schools', function(Blueprint $table)
		{
			$table->dropForeign('fk_schools_cities1');
		});
	}

}
