<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('links', function (Blueprint $table) {
          $table->increments('id');
          $table->string('destination');

          $table->integer('message_id')->nullable();
          $table->foreign('message_id')->references('id')->on('messages');

          $table->integer('topic_id')->nullable();
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
      Schema::drop('links');
    }
}
