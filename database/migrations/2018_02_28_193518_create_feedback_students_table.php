<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeedbackStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedback_students', function (Blueprint $table) {
            $table->increments('feedback_student_id');
            $table->integer('student_id')->unsigned();
            $table->integer('feedback_id')->unsigned();
            $table->integer('assignment_submission_id')->unsigned();
            $table->foreign('student_id')->references('student_id')->on('students') ->onDelete('cascade'); 
            $table->foreign('feedback_id')->references('feedback_id')->on('feedbacks') ->onDelete('cascade'); 
            $table->foreign('assignment_submission_id')->references('assignment_submission_id')->on('assignment_submissions') ->onDelete('cascade');
            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('feedback_students');
    }
}
