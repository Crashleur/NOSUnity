<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('teams', function (Blueprint $table) {
        $table->increments('id');
        $table->string('name');

        $table->integer('user_id');
        $table->foreign('user_id')->references('id')->on('users');

        $table->integer('link_id')->nullable();
        $table->foreign('link_id')->references('id')->on('links');

        $table->integer('game_id');
        $table->foreign('game_id')->references('id')->on('games');

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
      Schema::drop('teams');
    }
}
