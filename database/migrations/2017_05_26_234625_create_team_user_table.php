<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('team_user', function (Blueprint $table) {
        $table->integer('team_id');
        $table->foreign('team_id')->references('id')->on('teams');

        $table->integer('user_id');
        $table->foreign('user_id')->references('id')->on('users');

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
      Schema::drop('team_user');
    }
}
