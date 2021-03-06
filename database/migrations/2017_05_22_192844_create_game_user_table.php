<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGameUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('game_user', function (Blueprint $table) {
        $table->integer('game_id');
        $table->foreign('game_id')->references('id')->on('games');

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
      Schema::drop('game_user');
    }
}
