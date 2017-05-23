<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinkTopicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('link_topic', function (Blueprint $table) {
        $table->integer('link_id');
        $table->foreign('link_id')->references('id')->on('links');

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
      Schema::drop('link_topic');
    }
}
