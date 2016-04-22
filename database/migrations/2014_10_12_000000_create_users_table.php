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
            $table->string('username',15)->unique();
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->enum('gender', ['man','woman']);
            $table->date('date');
            $table->string('photo')->default('userdefect.png');
            $table->text('studies')->nullable();
            $table->string('country')->default('CO')->nullable();
            $table->enum('role', ['member','admin'])->default('member');
            $table->integer('profile_id')->default(1)->unsigned()->nullable();
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
