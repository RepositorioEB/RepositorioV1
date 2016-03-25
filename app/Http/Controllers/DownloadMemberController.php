<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Ova;

use App\User;

use App\Download;

use Laracasts\Flash\Flash;

class DownloadMemberController extends Controller
{
    public function index(Request $request)
    {
    }
    
    public function store(Request $request)
    {
    	$download = new Download($request->all());
        $download->user_id = \Auth::user()->id;
        $download->ova_id = $request->ova_id;
        $download->save();
    
	$public_path = public_path();
     $url = $public_path.'/storage/'.$request->archive;
     //verificamos si el archivo existe y lo retornamos
     if (\Storage::exists($request->archive))
     {
       return response()->download($url);
     }
     //si no se encuentra lanzamos un error 404.
     abort(404);
    
     	    Flash::success("Se ha registrado la descarga " .$download->id. " con exito!");
        return redirect()->route('admin.users.index');
    }

    
}
