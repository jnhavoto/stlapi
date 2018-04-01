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
			$table->text('area', 65535);
			$table->integer('grade')->unsigned();
			$table->integer('number_of_students')->unsigned();
			$table->date('start_date_of_lecture');
			$table->date('end_date_of_lecture');
			$table->text('purpose', 65535);
			$table->text('curriculum_requirement', 65535);
			$table->text('preview_text', 65535);
			$table->string('preview_check', 20);
			$table->text('inspiration', 65535);
			$table->text('text_types', 65535);
			$table->text('task_formulation', 65535);
			$table->string('media_type', 20);
			$table->text('media_type_other', 65535);
			$table->string('feedback_check', 20);
			$table->text('feedback_text', 65535);
			$table->text('assessment', 65535);
			$table->string('analysis_measure', 20);
			$table->text('analysis_text', 65535);
			$table->text('good_experience', 65535);
			$table->text('bad_experience', 65535);
			$table->text('learned_consequence', 65535);
			$table->text('next_goal', 65535);
			$table->date('submission_date');
			$table->integer('courses_id')->unsigned()->index('fk_assignment_submissions_courses1_idx');
			$table->integer('teachers_id')->unsigned()->index('fk_assignment_submissions_teachers1_idx');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('group_assignments_id')->unsigned()->index('fk_assignment_submissions_group_assignments1_idx');
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
