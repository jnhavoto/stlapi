<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAssignmentAnnouncementTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('assignment_announcement', function(Blueprint $table)
		{
			$table->integer('assignment_descriptions_id')->unsigned()->index('fk_assignment_descriptions_has_teacher_members_assignment_d_idx');
			$table->integer('teacher_members_id')->index('fk_assignment_descriptions_has_teacher_members_teacher_memb_idx');
			$table->integer('id', true);
			$table->text('message', 65535)->nullable();
			$table->string('subject', 45)->nullable();
			$table->timestamps();
			$table->softDeletes();
			$table->integer('status')->nullable()->comment('0=saved
1=sent
');
			$table->date('date');
			$table->primary(['id','date']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('assignment_announcement');
	}

}
