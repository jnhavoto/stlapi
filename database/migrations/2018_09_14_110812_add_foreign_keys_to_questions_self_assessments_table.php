<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToQuestionsSelfAssessmentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('questions_self_assessments', function(Blueprint $table)
		{
			$table->foreign('questions_id', 'fk_questions_has_self_assessments_questions1')->references('id')->on('questions')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('self_assessments_id', 'fk_questions_has_self_assessments_self_assessments1')->references('id')->on('self_assessments')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('questions_self_assessments', function(Blueprint $table)
		{
			$table->dropForeign('fk_questions_has_self_assessments_questions1');
			$table->dropForeign('fk_questions_has_self_assessments_self_assessments1');
		});
	}

}
