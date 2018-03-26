<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToFeedbackMessagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('feedback_messages', function(Blueprint $table)
		{
			$table->foreign('feedbacks_id', 'fk_feedback_messages_feedbacks1')->references('id')->on('feedbacks')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('feedback_messages', function(Blueprint $table)
		{
			$table->dropForeign('fk_feedback_messages_feedbacks1');
		});
	}

}
