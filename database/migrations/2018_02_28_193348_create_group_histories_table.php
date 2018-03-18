<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_histories', function (Blueprint $table) {
            $table->increments('history_id');
            $table->integer('student_id')->unsigned();
            $table->integer('group_id')->unsigned();
            $table->integer('assignment_id')->unsigned();
            $table->date('deadline');
            $table->foreign('student_id')->references('student_id')->on('students') ->onDelete('cascade'); 
            $table->foreign('group_id')->references('group_id')->on('group_assignments') ->onDelete('cascade'); 
            $table->foreign('assignment_id')->references('assignment_id')->on('assignment_descriptions') ->onDelete('cascade'); 
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('group_histories');
    }
}
