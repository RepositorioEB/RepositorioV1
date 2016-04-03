<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    public static function url_exists( $url = NULL ) {

	    if( empty( $url ) ){
	        return false;
	    }

	    $ch = curl_init( $url );
	 
	    //Establecer un tiempo de espera
	    curl_setopt( $ch, CURLOPT_TIMEOUT, 5 );
	    curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT, 5 );

	    //establecer NOBODY en true para hacer una solicitud tipo HEAD
	    curl_setopt( $ch, CURLOPT_NOBODY, true );
	    //Permitir seguir redireccionamientos
	    curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, true );
	    //recibir la respuesta como string, no output
	    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );

	    $data = curl_exec( $ch );

	    //Obtener el código de respuesta
	    $httpcode = curl_getinfo( $ch, CURLINFO_HTTP_CODE );
	    //cerrar conexión
	    curl_close( $ch );

	    //Aceptar solo respuesta 200 (Ok), 301 (redirección permanente) o 302 (redirección temporal)
	    $accepted_response = array( 200, 301, 302 );
	    if( in_array( $httpcode, $accepted_response ) ) {
	        return true;
	    } else {
	        return false;
	    }

	}
}
