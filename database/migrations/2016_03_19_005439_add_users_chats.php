<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUsersChats extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_chats', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nameorigen')->unsigned()->nullable();
            $table->string('namedestino')->unsigned()->nullable();
            $table->string('mensaje');
            $table->foreign('nameorigen')->references('username')->on('users');
            $table->foreign('namedestino')->references('username')->on('users');
            $table->rememberToken();
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
        Schema::drop('users_chats');
    }
}