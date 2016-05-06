<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use App\Forum_User;
use App\user;
use App\Forum;
use Laracasts\Flash\Flash;
use Redirect;

class Forum_UserController extends Controller
{
    public function message(Request $request)
    {
    	$foros_usuarios = forum_user::orderBy('created_at','DESC')->paginate(10);
        //Asignamos los datos de una consulta a una variable.
    	$foros = DB::table('forums')->where('id', $request->forum_id)->first();
        $users = user::orderBy('created_at','ASC')->get();
        return view('foro.forums_users.message')->with('foros_usuarios', $foros_usuarios)->with("foros",$foros)->with("users",$users);
    }

    public function index(Request $request){
        //La funcion search nos permite realizar las busquedas de los foros
        $forums = Forum::SearchForum($request->name)->orderBy('id', 'ASC')->first();
        $forums = Forum::SearchForum($request->name)->orderBy('id', 'ASC')->paginate(30);
        
        $users = User::orderBy('id','ASC')->get();
        
        return view('foro.forums_users.index')->with('forums', $forums)->with("users",$users);
    }

    public function create()
    {
    
    }
    public function store(Request $request)
    {
	    $foros_usuarios = new forum_user($request->all());
        //Aqui se guardan los comentarios de los foros en el sistema
        $foros_usuarios->message = $request->message;
        if($foros_usuarios->message == null){
            Flash::warning("No ha ingresado ningun comentario");
        }else{
            Flash::success("Comentario registrado!");
            $foros_usuarios->save();    
        }
        $foros_usuarios = forum_user::orderBy('created_at','DESC')->paginate(10);
        $foros = DB::table('forums')->where('id', $request->forum_id)->first();
        $users = user::orderBy('created_at','ASC')->get();
        //Redireccionamos la ventana al foro en el que estamos ubicados pero cargadon los comentarios realizados
        return Redirect::to('/foro/comentar?forum_id='.$request->forum_id);
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }
}
