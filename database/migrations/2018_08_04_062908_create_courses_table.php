<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCoursesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('courses', function(Blueprint $table)
		{
			$table->increments('id');
			$table->text('name', 65535)->nullable();
			$table->text('course_content', 65535)->nullable();
			$table->date('startdate');
			$table->date('available_date')->nullable();
			$table->integer('status')->nullable()->default(0)->comment('0=active
1=disactive');
			$table->integer('departments_id')->unsigned()->index('fk_courses_departments1_idx');
			$table->timestamps();
			$table->softDeletes();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('courses');
	}

}
