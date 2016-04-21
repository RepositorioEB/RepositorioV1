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
		    array('name' => 'Chat', 'video' => 'https://www.youtube.com/watch?v=O1LgDTUHH7Q&nohtml5=False', 'description' => '
Paso 1:
Seleccionar el botón chat.

Paso 2:
Seleccionar contacto.

Paso 3:
Ingresar comentario.

Paso 4:
Dar clic al botón enviar.', 'user_id' => '1','created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
		    array('name' => 'Modificar perfil', 'video' => 'https://www.youtube.com/watch?v=bgbWxaf00lg&nohtml5=False', 'description' => '
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
		    array('name' => 'Descarga, Evaluación y comentar OVA', 'video' => 'https://www.youtube.com/watch?v=xzrwPvq8A7k&nohtml5=False', 'description' => '
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
		    array('name' => 'Subir y consultar OVA', 'video' => 'https://www.youtube.com/watch?v=mUapSIZddoc&nohtml5=False', 'description' => '
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
		    array('name' => 'Problema', 'video' => 'https://www.youtube.com/watch?v=14yZu7iJOGE&nohtml5=False', 'description' => '
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
		));
    }
}
