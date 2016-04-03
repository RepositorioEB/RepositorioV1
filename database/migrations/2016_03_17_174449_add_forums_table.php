<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forums', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',30)->unique();
            $table->text('characteristic')->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
        Schema::create('forum_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('forum_id')->unsigned()->nullable();
            $table->string('message');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('forum_id')->references('id')->on('forums')->onDelete('cascade');
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
        Schema::drop('forum_user');
        Schema::drop('forums');
    }
}
