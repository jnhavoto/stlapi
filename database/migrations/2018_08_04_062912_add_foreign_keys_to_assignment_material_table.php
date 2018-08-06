<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAssignmentMaterialTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('assignment_material', function(Blueprint $table)
		{
			$table->foreign('assignment_description_id', 'fk_assignment_material_assignment_description1')->references('id')->on('assignment_description')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('assignment_material', function(Blueprint $table)
		{
			$table->dropForeign('fk_assignment_material_assignment_description1');
		});
	}

}
