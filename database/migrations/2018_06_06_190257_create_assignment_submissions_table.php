<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAssignmentSubmissionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('assignment_submissions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->text('area', 65535)->nullable();
			$table->integer('grade')->unsigned()->nullable();
			$table->integer('number_of_students')->unsigned()->nullable();
			$table->date('start_date_of_lecture')->nullable();
			$table->date('end_date_of_lecture')->nullable();
			$table->text('purpose', 65535)->nullable();
			$table->text('curriculum_requirement', 65535)->nullable();
			$table->text('preview_text', 65535)->nullable();
			$table->string('preview_check', 20)->nullable();
			$table->boolean('inspiration_choiche')->nullable();
			$table->string('inspiration_text', 145)->nullable();
			$table->text('text_types', 65535)->nullable();
			$table->text('task_formulation', 65535)->nullable();
			$table->text('feedback_text', 65535)->nullable();
			$table->text('assessment', 65535)->nullable();
			$table->integer('analysis_measure')->nullable();
			$table->text('analysis_text', 65535)->nullable();
			$table->text('good_experience', 65535)->nullable();
			$table->text('bad_experience', 65535)->nullable();
			$table->text('learned_consequence', 65535)->nullable();
			$table->text('next_goal', 65535)->nullable();
			$table->integer('status')->nullable();
			$table->date('submission_date')->nullable();
			$table->integer('students_id')->unsigned()->index('fk_assignment_submissions_students1_idx');
			$table->integer('assignment_descriptions_id')->unsigned()->index('fk_assignment_submissions_assignment_descriptions1_idx');
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
		Schema::drop('assignment_submissions');
	}

}
