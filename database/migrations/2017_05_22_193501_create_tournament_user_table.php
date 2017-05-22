<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTournamentUserTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('tournament_user', function (Blueprint $table) {
      $table->integer('tournament_id');
      $table->foreign('tournament_id')->references('id')->on('tournaments');

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
    Schema::drop('tournament_user');
  }
}
