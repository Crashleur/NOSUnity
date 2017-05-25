<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('topics', function (Blueprint $table) {
          $table->increments('id');
          $table->string('title');
          $table->text('description');
          $table->boolean('open');

          $table->integer('user_id');
          $table->foreign('user_id')->references('id')->on('users');

          $table->integer('topic_type_id');
          $table->foreign('topic_type_id')->references('id')->on('topic_types');

          $table->integer('tournament_id')->nullable();
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
      Schema::drop('topics');
    }
}
