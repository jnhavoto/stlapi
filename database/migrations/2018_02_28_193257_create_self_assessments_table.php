<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSelfAssessmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('self_assessments', function (Blueprint $table) {
            $table->increments('self_assessment_id');
            $table->integer('student_id')->unsigned();
            $table->tinyInteger('level1_1');
            $table->tinyInteger('level2_1');
            $table->tinyInteger('level3_1');
            $table->tinyInteger('level1_2');
            $table->tinyInteger('level2_2');
            $table->tinyInteger('level3_2');
            $table->tinyInteger('level1_3');
            $table->tinyInteger('level2_3');
            $table->tinyInteger('level3_3');
            $table->tinyInteger('level1_4');
            $table->tinyInteger('level2_4');
            $table->tinyInteger('level3_4');
            $table->tinyInteger('level1_5');
            $table->tinyInteger('level2_5');
            $table->tinyInteger('level3_5');
            $table->tinyInteger('level1_6');
            $table->tinyInteger('level2_6');
            $table->tinyInteger('level3_6');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('self_assessments');
    }
}
