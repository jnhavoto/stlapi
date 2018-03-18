<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssignmentSubmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignment_submissions', function (Blueprint $table) {
            $table->increments('assignment_submission_id');
            $table->text('area');
            $table->integer('grade')->unsigned();
            $table->integer('number_of_students')->unsigned();
            $table->date('start_date_of_lecture');
            $table->date('end_date_of_lecture');
            $table->text('purpose');
            $table->text('curriculum_requirement');
            $table->text('preview_text');
            $table->binary('preview_check');
            $table->text('inspiration');
            $table->text('text_types');
            $table->text('task_formulation');
            $table->binary('media_type');
            $table->text('media_type_other');
            $table->binary('feedback_check');
            $table->text('feedback_text');
            $table->text('assessment');
            $table->binary('analysis_measure');
            $table->text('analysis_text');
            $table->text('good_experience');
            $table->text('bad_experience');
            $table->text('learned_consequence');
            $table->text('next_goal');
            $table->date('submission_date');
            $table->integer('group_id')->unsigned();
            $table->integer('student_id')->unsigned();
            $table->integer('assignment_id')->unsigned();
            $table->integer('teacher_id')->unsigned();
            $table->integer('course_id')->unsigned();
            $table->foreign('student_id')->references('student_id')->on('students') ->onDelete('cascade'); 
            $table->foreign('group_id')->references('group_id')->on('group_assignments') ->onDelete('cascade'); 
            $table->foreign('assignment_id')->references('assignment_id')->on('assignment_descriptions') ->onDelete('cascade'); 
            $table->foreign('teacher_id')->references('teacher_id')->on('teachers') ->onDelete('cascade'); 
            $table->foreign('course_id')->references('course_id')->on('courses') ->onDelete('cascade'); 

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assignment_submissions');
    }
}
