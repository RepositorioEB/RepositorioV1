<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('profiles')->insert(array(
    		array('name' => 'Ninguna', 'characteristic' => 'No se tiene una discapacidad y/o no esta al tanto de la misma','created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
		    array('name' => 'Autismo', 'characteristic' => 'El autismo es una discapacidad con características que varían en un amplio espectro. Si bien no se puede identificar a las personas autistas por su apariencia física, por lo general tienen dificultades con el lenguaje o la comunicación, las relaciones interpersonales y la conducta, las cuales a menudo se deben a dificultades sensoriales.','created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
			array('name' => 'Enfermedades cronicas', 'characteristic' => 'Las enfermedades crónicas varían en sus síntomas, tratamientos y evolución. Entre algunas enfermedades crónicas podrían mencionarse afecciones tan diversas como la parálisis cerebral, el asma, la esclerosis múltiple, la epilepsia, el cáncer, la diabetes, las enfermedades del corazón y el síndrome de fatiga crónica.','created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
			array('name' => 'Daltonismo', 'characteristic' => 'Es defecto de la vista que consiste en no distinguir ciertos colores o confundirlos con otros.','created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
			array('name' => 'Deficienci auditiva y sordera', 'characteristic' => 'La deficiencia auditiva puede variar desde una ligera disminución del sentido del oído hasta la sordera total. Hay personas con deficiencia auditiva que se valen del lenguaje de señas para comunicarse, otras leen los labios y pueden hablar, y otras utilizan una combinación de ambos métodos.','created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
			array('name' => 'Discapacidad intelectual', 'characteristic' => 'El término discapacidad intelectual se refiere a limitaciones significativas para aprender, razonar, resolver problemas, percibir el mundo circundante y desarrollar las habilidades necesarias para desenvolverse en la vida cotidiana.','created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
			array('name' => 'Dificultades del aprendizaje', 'characteristic' => 'Las personas con dificultades de aprendizaje pueden tener una diversidad de problemas, entre ellos, problemas de lecto-escritura, problemas de comunicación verbal o dificultades para razonar. Podrían estar relacionadas con las dificultades de aprendizaje, la coordinación, la conducta y la interacción con los demás.','created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
			array('name' => 'Perdida de la memoria', 'characteristic' => 'En ocasiones, aparte de ser una consecuencia del proceso normal de envejecimiento, la pérdida de la memoria puede sobrevenir como resultado de enfermedades o lesiones cerebrales. Las afecciones cerebrales como la enfermedad de Alzheimer pueden provocar un aumento de la pérdida de la memoria.','created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
			array('name' => 'Enfermedades mentales', 'characteristic' => 'Hay muchos tipos de enfermedades mentales que afectan el funcionamiento del cerebro; pueden afectar los pensamientos, la conducta, las emociones y la capacidad de comprender la información recibida.','created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
			array('name' => 'Discapacidad fisica', 'characteristic' => 'Existen muchas causas y afecciones que pueden provocar deficiencias motrices y para desplazarse. La incapacidad de usar eficazmente las piernas, los brazos o el tronco debido a parálisis, rigidez, dolor u otras deficiencias es común. Podría deberse a defectos congénitos, enfermedades, envejecimiento o accidentes.','created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
			array('name' => 'Trastornos del habla y del lenguaje', 'characteristic' => 'Los trastornos del habla y del lenguaje son diversos y pueden aparecer a cualquier edad. Independientemente de la gravedad de los trastornos del habla y del lenguaje, la capacidad de la persona para relacionarse y comunicarse con los demás se verá afectada.','created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
			array('name' => 'Deficiencia Visual y ceguera', 'characteristic' => 'Los problemas de la vista varían desde la visión nublada o borrosa hasta la ceguera total. Las personas con problemas de la vista difieren mucho en sus necesidades, aptitudes, personalidades y actitudes.','created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
			array('name' => 'Otra', 'characteristic' => 'No se encuentra en el sistema','created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
		));
    }
}
