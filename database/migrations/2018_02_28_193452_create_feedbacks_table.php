<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeedbacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedbacks', function (Blueprint $table) {
            $table->increments('feedback_id');
            $table->text('goal');
            $table->text('message');
            $table->text('advice');
            $table->text('comment');
            $table->date('feedback_date');
            $table->integer('assignment_submission_id')->unsigned();
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
        Schema::dropIfExists('feedbacks');
    }
}
