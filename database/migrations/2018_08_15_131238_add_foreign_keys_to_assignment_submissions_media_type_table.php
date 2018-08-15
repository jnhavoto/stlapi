<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAssignmentSubmissionsMediaTypeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('assignment_submissions_media_type', function(Blueprint $table)
		{
			$table->foreign('assignment_submissions_id', 'fk_assignment_submissions_has_media_type_assignment_submissio1')->references('id')->on('assignment_submissions')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('media_type_id', 'fk_assignment_submissions_has_media_type_media_type1')->references('id')->on('media_type')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('assignment_submissions_media_type', function(Blueprint $table)
		{
			$table->dropForeign('fk_assignment_submissions_has_media_type_assignment_submissio1');
			$table->dropForeign('fk_assignment_submissions_has_media_type_media_type1');
		});
	}

}
