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
            $table->text('content');

            $table->integer('from')->unsigned();
            $table->integer('to')->unsigned()->nullable();
            $table->integer('room')->unsigned()->nullable();

            $table->foreign('room')->references('id')->on('rooms');
            $table->foreign('from')->references('id')->on('users');
            $table->foreign('to')->references('id')->on('users');

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
        //
    }
}
