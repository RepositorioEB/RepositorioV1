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
		    array('name' => 'ChatContactos', 'video' => 'help_1VideoChat.mp4', 'description' => '
Paso 1:
Seleccionar el botón chat.

Paso 2:
Seleccionar contacto.

Paso 3:
Ingresar comentario.

Paso 4:
Dar clic al botón enviar.', 'user_id' => '1','created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
		    array('name' => 'Modificar perfil', 'video' => 'help_2VideoModificarPerfil.mp4', 'description' => '
Paso 1:
Seleccionar el botón con el nombre de usuario.

Paso 2:
Seleccionar perfíl.

Paso 3:
Seleccionar el botón modificar datos.

Paso 4:
Dar clic al botón seleccionar archivo. 

Paso 5:
Seleccionar foto.

Paso 6:
Seleccionar botón abrir.

Paso 7:
Modificar los campos.

Paso 8:
Seleccionar botón guardar.', 'user_id' => '1','created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
		    array('name' => 'Descarga, Evaluación y comentar OVA', 'video' => 'help_3VideoDescargarEvaluarComentarOVA.mp4', 'description' => '
Paso 1:
Seleccionar el botón objetos.

Paso 2:
Seleccionar submenú listar.

Paso 3:
Seleccionar botón búsqueda general.

Paso 4:
Seleccionar tipo de búsqueda.

Paso 5:
Ingresar nombre OVA.

Paso 6:
Seleccionar OVA.

Paso 7:
Dar clic al botón descargar.

Paso 8:
Utilizar OVA.

Paso 9:
Seleccionar número de estrellas.

Paso 10:
Dar clic al botón evaluar.

Paso 11:
Seleccionar OVA.

Paso 12:
Ingresar comentario.

Paso 13:
Seleccionar el botón comentar.', 'user_id' => '1','created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
		    array('name' => 'SubirConsultarOVA', 'video' => 'help_4VideoSubirConsultarOVA.mp4', 'description' => '
Paso 1:
Seleccionar el botón objetos.

Paso 2:
Seleccionar submenú subir.

Paso 3:
Ingresar datos en los campos.

Paso 4:
Dar clic al botón seleccionar archivo.

Paso 5:
Seleccionar archivo .rar o .zip.

Paso 6:
Seleccionar el botón abrir.

Paso 7:
Seleccionar el botón guardar.

Paso 8:
Seleccionar OVA.

Paso 9:
Consultar OVA.', 'user_id' => '1','created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
		    array('name' => 'Problema', 'video' => 'help_5VideoProblema.mp4', 'description' => '
Paso 1:
Seleccionar el botón problemas.

Paso 2:
Seleccionar submenú nuevo.

Paso 3:
Ingresar datos en los campos.

Paso 4:
Seleccionar el botón registrar.

Paso 5:
Ingresar nombre.

Paso 6:
Buscar problema.

Paso 7:
Ver estado del problema.', 'user_id' => '1','created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('name' => 'ForoCrearComentar', 'video' => 'help_6VideoForoCrearComentar.mp4', 'description' => '
Paso 1:
Seleccionar el botón foros.

Paso 2:
Seleccionar submenú nuevo.

Paso 3:
Ingresar datos en los campos.

Paso 4:
Seleccionar el botón crear.

Paso 5:
Buscar foro.

Paso 6:
Seleccionar foro.

Paso 7:
Ingresar comentario.

Paso 8:
Seleccionar el botón enviar.', 'user_id' => '1','created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
        ));
    }
}
