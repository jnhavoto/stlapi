<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFeedbackMessagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('feedback_messages', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->text('message', 65535);
			$table->boolean('status');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('feedbacks_id')->unsigned()->index('fk_feedback_messages_feedbacks1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('feedback_messages');
	}

}
