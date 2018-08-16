<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAssignmentMaterialTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('assignment_material', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->text('description')->nullable();
			$table->string('file_name', 90)->nullable();
			$table->text('path')->nullable();
			$table->integer('assignment_description_id')->unsigned()->index('fk_assignment_material_assignment_description1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('assignment_material');
	}

}
