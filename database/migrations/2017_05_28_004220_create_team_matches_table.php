<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team_matches', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('number')->nullable();

            $table->integer('step_id');
            $table->foreign('step_id')->references('id')->on('steps');

            $table->integer('team1_id')->nullable();
            $table->foreign('team1_id')->references('id')->on('teams');

            $table->integer('team2_id')->nullable();
            $table->foreign('team2_id')->references('id')->on('teams');

            $table->integer('winner_id')->nullable();
            $table->foreign('winner_id')->references('id')->on('teams');


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
        Schema::drop('team_matches');
    }
}
