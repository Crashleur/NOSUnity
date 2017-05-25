<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopicTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('topic_types', function (Blueprint $table) {
          $table->increments('id');
          $table->string('slug');
          $table->text('name');

          $table->integer('link_id')->nullable();
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
      Schema::drop('topic_types');
    }
}
