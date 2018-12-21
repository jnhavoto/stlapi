<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFeedbacksTodoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('feedbacks_todo', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('status')->nullable()->default(0)->comment('0 = undone
1 = done');
			$table->integer('students_id')->unsigned()->index('fk_feedbacks_todo_students1_idx');
			$table->integer('assignment_submissions_id')->unsigned()->index('fk_feedbacks_todo_assignment_submissions1_idx');
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
		Schema::drop('feedbacks_todo');
	}

}
