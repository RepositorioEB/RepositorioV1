<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(array(
		    array('name' => 'Edison', 'username' => 'eaq19', 'email' => 'eandres@gmail.com', 'password' => bcrypt('12345678'), 'gender' => 'man', 'date' => '1995-03-09','photo' => 'userdefect.png','studies' => 'Tecnologo en sistematizacion de datos de la Universidad Distrital', 'country' => 'CO', 'role' => 'admin', 'profile_id' => '11','created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
		    array('name' => 'Braian', 'username' => 'braianr', 'email' => 'braian@gmail.com', 'password' => bcrypt('123456789'), 'gender' => 'man', 'date' => '1995-09-12','photo' => 'userdefect.png', 'studies' => 'Tecnologo en sistematizacion de datos de la Universidad Distrital', 'country' => 'CO', 'role' => 'member', 'profile_id' => '11','created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
		));
    }
}