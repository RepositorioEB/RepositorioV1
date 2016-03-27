<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use App\forum_user;
use App\user;
use App\Forum;
use Laracasts\Flash\Flash;

class Forum_UserController extends Controller
{
    public function message(Request $request)
    {
    	$foros_usuarios = forum_user::orderBy('created_at','ASC')->paginate(100);
    	$foros = DB::table('forums')->where('id', $request->forum_id)->first();
        $users = user::orderBy('created_at','ASC')->get();
        return view('foro.forums_users.message')->with('foros_usuarios', $foros_usuarios)->with("foros",$foros)->with("users",$users);
    }

    public function index(){
        $forums = DB::table('forums')->paginate(30);
        $users = DB::table('users')->get();
        return view('foro.forums_users.index')->with('forums', $forums)->with("users",$users);
    }

    public function create()
    {
    
    }
    public function store(Request $request)
    {
    	    $foros_usuarios = new forum_user($request->all());
            $foros_usuarios->message = $request->message;
            if($foros_usuarios->message == null){
                Flash::warning("No ha ingresado ningun comentario");
            }else{
                Flash::success("Comentario registrado!");
                $foros_usuarios->save();    
            }
            $foros_usuarios = forum_user::orderBy('created_at','DESC')->paginate(100);
            $foros = DB::table('forums')->where('id', $request->forum_id)->first();
            $users = user::orderBy('created_at','ASC')->get();
            return view('foro.forums_users.message')->with('foros_usuarios', $foros_usuarios)->with("foros",$foros)->with("users",$users);
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
