<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatingFeedbacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rating_feedbacks', function (Blueprint $table) {
            $table->increments('rating_id');
            $table->text('goal');
            $table->tinyInteger('timing');
            $table->text('message');
            $table->text('advice');
            $table->text('comment');
            $table->date('feedback_rating_date');
            $table->integer('feedback_student_id')->unsigned();
            $table->integer('student_id')->unsigned();
            $table->foreign('student_id')->references('student_id')->on('students') ->onDelete('cascade'); 
            $table->foreign('feedback_student_id')->references('feedback_student_id')->on('feedback_students') ->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rating_feedbacks');
    }
}
