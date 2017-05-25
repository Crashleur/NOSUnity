<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('messages', function (Blueprint $table) {
        $table->increments('id');
        $table->('decription');

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
      Schema::drop('messages');
    }
}
