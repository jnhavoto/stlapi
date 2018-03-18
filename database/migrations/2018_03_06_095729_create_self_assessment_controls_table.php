<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSelfAssessmentControlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('self_assessment_controls', function (Blueprint $table) {
            $table->increments('self_assessment_control_id');
            $table->integer('self_assessment_number');
            $table->integer('student_id')->unsigned();
            $table->integer('self_assessment_id')->unsigned();
            $table->foreign('student_id')->references('student_id')->on('students') ->onDelete('cascade');
            $table->foreign('self_assessment_id')->references('self_assessment_id')->on('self_assessments') ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('self_assessment_controls');
    }
}
