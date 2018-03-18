<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('student_id');
            $table->integer('city_id')->unsigned();
            $table->integer('school_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->text('digital_tools');
            $table->binary('workplace_tools');
            $table->text('workplace_tools_othe');
            $table->integer('teaching_grade')->unsigned();
            $table->text('work_methods');
            $table->text('subjects');
            $table->integer('years_as_teacher')->unsigned();
            $table->tinyInteger('technical_support');
            $table->tinyInteger('student_to_student_feedback');
            $table->text('student_to_student_feedback_other');
            $table->text('technology_use_in_teaching');
            $table->foreign('city_id')->references('city_id')->on('cities') ->onDelete('cascade'); 
            $table->foreign('school_id')->references('school_id')->on('schools') ->onDelete('cascade');
            $table->foreign('user_id')->references('user_id')->on('users') ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
