<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToRatingFeedbacksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('rating_feedbacks', function(Blueprint $table)
		{
			$table->foreign('feedbacks_id', 'fk_rating_feedbacks_feedbacks1')->references('id')->on('feedbacks')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('rating_feedbacks', function(Blueprint $table)
		{
			$table->dropForeign('fk_rating_feedbacks_feedbacks1');
		});
	}

}
