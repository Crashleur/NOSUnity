<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('user_types', function (Blueprint $table) {
          $table->increments('id');
          $table->string('slug');
          $table->string('rôle_admin')->nullable();

          $table->integer('game_id')->nullable();
          $table->foreign('game_id')->references('id')->on('games');

          $table->integer('link_id');
          $table->foreign('link_id')->references('id')->on('link');

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
      Schema::drop('user_types');
    }
}
