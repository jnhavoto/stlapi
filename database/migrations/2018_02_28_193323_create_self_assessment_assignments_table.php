<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSelfAssessmentAssignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('self_assessment_assignments', function (Blueprint $table) {
            $table->increments('ss_assignment_id');
            $table->integer('teacher_id')->unsigned();
            $table->integer('self_assessment_id')->unsigned();
            $table->date('deadline');
            $table->foreign('teacher_id')->references('teacher_id')->on('teachers') ->onDelete('cascade');
            $table->foreign('self_assessment_id')->references('self_assessment_id')->on('self_assessments') ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('self_assessment_assignments');
    }
}
