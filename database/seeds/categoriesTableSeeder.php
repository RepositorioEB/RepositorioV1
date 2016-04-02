<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class categoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert(array(
			array('name' => 'Astronomia', 'description' => 'Es la ciencia que se ocupa del estudio de los cuerpos celestes del universo, incluidos los planetas y sus satélites, los cometas y meteoroides, las estrellas y la materia interestelar','created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
			array('name' => 'Ciencias de la tierra', 'description' => 'Son las disciplinas de las ciencias naturales que estudian la estructura, morfología, evolución y dinámica del planeta Tierra.','created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
			array('name' => 'Ciencias de la vida', 'description' => 'Comprenden todos los campos de la ciencia que se ocupan del estudio de los seres vivos, como las plantas, animales y seres humanos. Además de la biología abarca también otros campos relacionados como la medicina, biomedicina, bioquímica y biodiversidad.','created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
			array('name' => 'Quimica', 'description' => 'Es la ciencia que estudia tanto la composición, estructura y propiedades de la materia como los cambios que esta experimenta durante las reacciones químicas y su relación con la energía.','created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
			array('name' => 'Fisica', 'description' => 'Es la ciencia natural que estudia las propiedades, el comportamiento de la energía, la materia (como también cualquier cambio en ella que no altere la naturaleza de la misma), así como el tiempo, el espacio y las interacciones de estos cuatro conceptos entre sí.','created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
			array('name' => 'Matematicas', 'description' => 'Es una ciencia formal que, partiendo de axiomas y siguiendo el razonamiento lógico, estudia las propiedades y relaciones entre entidades abstractas como números, figuras geométricas o símbolos.','created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
			array('name' => 'Ciencias de la computacion', 'description' => 'Son aquellas ciencias que abarcan las bases teóricas de la información y la computación, así como su aplicación en sistemas computacionales.','created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
			array('name' => 'Antropología', 'description' => 'Es la ciencia que estudia al ser humano de una forma integral.','created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
			array('name' => 'Arqueología', 'description' => 'Es la ciencia que estudia los cambios físicos que se producen desde las sociedades antiguas hasta las actuales.','created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
			array('name' => 'Economía', 'description' => 'Es una ciencia social que estudia cómo los individuos o las sociedades usan o manejan los escasos recursos para satisfacer sus necesidades.','created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
			array('name' => 'Etnología', 'description' => 'Es la ciencia social que estudia y compara los diferentes pueblos y culturas del mundo antiguo y nuevo.','created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
			array('name' => 'Geografía', 'description' => 'Es la ciencia que trata de la descripción o de la representación gráfica de la Tierra.','created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
			array('name' => 'Historia', 'description' => 'Es la ciencia que tiene como objeto de estudio el pasado de la humanidad y como método, el propio de las ciencias sociales.','created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
		));
    }
}
