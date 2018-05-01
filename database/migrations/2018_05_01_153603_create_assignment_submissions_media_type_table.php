<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAssignmentSubmissionsMediaTypeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('assignment_submissions_media_type', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('assignment_submissions_id')->unsigned()->index('fk_assignment_submissions_has_media_type_assignment_submiss_idx');
			$table->integer('media_type_id')->index('fk_assignment_submissions_has_media_type_media_type1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('assignment_submissions_media_type');
	}

}
