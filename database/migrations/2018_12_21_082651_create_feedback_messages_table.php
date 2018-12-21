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
			$table->integer('students_sender')->unsigned()->index('fk_students_has_students_students1_idx');
			$table->integer('students_reciever')->unsigned()->index('fk_students_has_students_students2_idx');
			$table->integer('id', true);
			$table->text('mensagem', 65535)->nullable();
			$table->boolean('status')->nullable();
			$table->timestamps();
			$table->softDeletes();
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
