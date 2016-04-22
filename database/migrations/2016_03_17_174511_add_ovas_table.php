<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOvasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ovas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('language',2)->default('es')->nullable();
            $table->text('description')->nullable();
            $table->string('archive');
            $table->integer('punctuation')->nullable();
            $table->boolean('state')->default(false);
            $table->integer('type_id')->unsigned()->nullable();
            $table->integer('category_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('type_id')->references('id')->on('types')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
        Schema::create('ovas_comments',function(Blueprint $table){
            $table->increments('id');
            $table->integer('ova_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('comment');
            $table->foreign('ova_id')->references('id')->on('ovas')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::drop('ovas');
    }
}
