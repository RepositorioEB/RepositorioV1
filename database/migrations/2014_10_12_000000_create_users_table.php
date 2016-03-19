<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
   /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',30);
            $table->string('last_name',30)->nullable();
            $table->string('username',10)->unique();
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->enum('gender', ['man','woman']);
            $table->date('date');
            $table->string('photo')->nullable();
            $table->string('studies')->nullable();
            $table->boolean('state')->default(false);
            $table->enum('role', ['member','admin'])->default('member');
            $table->integer('profile_id')->unsigned()->nullable();
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
        Schema::drop('users');
    }
}
