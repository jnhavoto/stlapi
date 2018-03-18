<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssignmentDescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignment_descriptions', function (Blueprint $table) {
            $table->increments('assignment_id');
            $table->text('case');
            $table->text('instructions');
            $table->date('startdate');
            $table->date('deadline');
            $table->date('available_date');
            $table->integer('teacher_course_id')->unsigned();
            $table->foreign('teacher_course_id')->references('teacher_course_id')->on('teacher_courses') ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assignment_descriptions');
    }
}
