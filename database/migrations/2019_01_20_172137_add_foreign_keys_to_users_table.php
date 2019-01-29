<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('cities_id', 'fk_users_cities1')->references('id')->on('cities')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('schools_id', 'fk_users_schools1')->references('id')->on('schools')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('user_types_id', 'fk_users_user_types1')->references('id')->on('user_types')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('fk_users_cities1');
            $table->dropForeign('fk_users_schools1');
            $table->dropForeign('fk_users_user_types1');
        });
    }
}
