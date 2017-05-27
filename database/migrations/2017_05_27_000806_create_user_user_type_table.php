<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserUserTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('user_user_type', function (Blueprint $table) {
        $table->integer('user_id');
        $table->foreign('user_id')->references('id')->on('users');

        $table->integer('user_type_id');
        $table->foreign('user_type_id')->references('id')->on('user_types');

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
