<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class typesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->insert(array(
		    array('name' => 'Simulación Juego de Roles', 'description' => 'Este tipo de objetos habilita al estudiante a construir y probar su propio conocimiento y habilidades interactuando con la simulación de una situación real.','created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
			array('name' => 'Simulación de Software', 'description' => 'Los objetos de simulación de software son diseñados para permitir a los estudiantes practicar tareas complejas asociadas a productos específicos de software.','created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
			array('name' => 'Simulación de Hardware', 'description' => 'Permiten a los estudiantes a adquirir cocimiento respecto a determinadas tareas asociadas al desarrollo de hardware.','created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
			array('name' => 'Simulación de Código', 'description' => 'Este tipo de objetos, permiten a los estudiantes practicar y aprender sobre técnicas complejas en la codificación de un software.','created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
			array('name' => 'Simulación Conceptual', 'description' => 'Este tipo de objetos (también conocido como de ejercicios interactivos) ayudan a los estudiantes a relacionar conceptos a través de ejercicios prácticos.','created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
			array('name' => 'Simulaciones de Modelo de Negocios', 'description' => 'También conocidos como Simulaciones Cuantitativas, Son objetos que le permiten al estudiante controlar y manipular un rango de variables en una compañía virtual en orden a aprender como administrar una situación real y las implicaciones de sus decisiones.','created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
			array('name' => 'Laboratorios On-Line', 'description' => 'Son practicas interactivas que se enfocan en el conocimiento de las ciencias basicas','created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
			array('name' => 'Proyectos de Investigación', 'description' => 'Son objetos relativos asociados a actividades complejas que impulsen a los estudiantes a comprometerse a través de ejercicios con áreas bien específicas.','created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
		));
    }
}
