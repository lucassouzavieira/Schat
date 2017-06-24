<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomHasUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_has_users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('room')->unsigned();
            $table->integer('user')->unsigned();

            $table->foreign('room')->references('id')->on('rooms');
            $table->foreign('user')->references('id')->on('users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('room_has_users');
    }
}
