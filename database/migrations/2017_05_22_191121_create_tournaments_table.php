<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTournamentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('tournaments', function (Blueprint $table) {
          $table->increments('id');

          $table->datetime('start_date')->nullable();
          $table->integer('team_requirement_number')->nullable();
          $table->integer('max_participate_team')->nullable();

          $table->integer('game_id');
          $table->foreign('game_id')->references('id')->on('games');

          $table->integer('user_id');
          $table->foreign('user_id')->references('id')->on('users');

          $table->integer('topic_id');
          $table->foreign('topic_id')->references('id')->on('topics');

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
      Schema::drop('tournaments');
    }
}
