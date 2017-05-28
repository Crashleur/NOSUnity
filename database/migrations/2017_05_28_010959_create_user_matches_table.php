<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_matches', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('number')->nullable();

            $table->integer('step_id');
            $table->foreign('step_id')->references('id')->on('steps');

            $table->integer('user1_id')->nullable();
            $table->foreign('user1_id')->references('id')->on('users');

            $table->integer('user2_id')->nullable();
            $table->foreign('user2_id')->references('id')->on('users');

            $table->integer('winner_id')->nullable();
            $table->foreign('winner_id')->references('id')->on('users');


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
        Schema::drop('user_matches');
    }
}
