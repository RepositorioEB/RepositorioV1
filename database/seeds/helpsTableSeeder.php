<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class helpsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('helps')->insert(array(
		    array('name' => 'Chat', 'video' => 'https://www.youtube.com/watch?v=O1LgDTUHH7Q&nohtml5=False', 'description' => '', 'user_id' => '1','created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
		    array('name' => 'Moficiar perfil', 'video' => 'https://www.youtube.com/watch?v=bgbWxaf00lg&nohtml5=False', 'description' => '', 'user_id' => '1','created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
		    array('name' => 'Descarga, Evaluacion y comentar OVA', 'video' => 'https://www.youtube.com/watch?v=xzrwPvq8A7k&nohtml5=False', 'description' => '', 'user_id' => '1','created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
		    array('name' => 'Subir y consultar OVA', 'video' => 'https://www.youtube.com/watch?v=mUapSIZddoc&nohtml5=False', 'description' => '', 'user_id' => '1','created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
		    array('name' => 'Problema', 'video' => 'https://www.youtube.com/watch?v=14yZu7iJOGE&nohtml5=False', 'description' => '', 'user_id' => '1','created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
		));
    }
}
