<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamTournamentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('team_tournament', function (Blueprint $table) {
        $table->integer('team_id');
        $table->foreign('team_id')->references('id')->on('teams');

        $table->integer('tournament_id');
        $table->foreign('tournament_id')->references('id')->on('tournaments');

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
      Schema::drop('team_tournament');
    }
}
