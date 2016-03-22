<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOvasEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('ovas_evaluations', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('ova_id')->unsigned();
            $table->integer('punctuation')->unsigned();
            $table->primary(array('user_id', 'ova_id'));
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('ova_id')->references('id')->on('ovas')->onDelete('cascade');
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
        Schema::drop('ovas_evaluations');
    }
}
