<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionUserTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('permission_user_type', function (Blueprint $table) {
        $table->integer('user_type_id');
        $table->foreign('user_type_id')->references('id')->on('user_types');

        $table->integer('permission_id');
        $table->foreign('permission_id')->references('id')->on('permissions');

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
      Schema::drop('permission_user_types');
    }
}
