<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use App\forum_user;
use App\user;
use App\Forum;
use Laracasts\Flash\Flash;
use Redirect;

class Forum_UserController extends Controller
{
    public function message(Request $request)
    {
    	$foros_usuarios = forum_user::orderBy('created_at','DESC')->paginate(10);
    	$foros = DB::table('forums')->where('id', $request->forum_id)->first();
        $users = user::orderBy('created_at','ASC')->get();
        return view('foro.forums_users.message')->with('foros_usuarios', $foros_usuarios)->with("foros",$foros)->with("users",$users);
    }

    public function index(Request $request){
        $forums = Forum::SearchForum($request->name)->orderBy('id', 'ASC')->first();
        if($forums){
            $forums = Forum::SearchForum($request->name)->orderBy('id', 'ASC')->paginate(30);
        }else{
            $forums = Forum::orderBy('id','ASC')->paginate(30);
        }
        $users = User::orderBy('id','ASC')->get();
        
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
        $foros_usuarios = forum_user::orderBy('created_at','DESC')->paginate(10);
        $foros = DB::table('forums')->where('id', $request->forum_id)->first();
        $users = user::orderBy('created_at','ASC')->get();
        return Redirect::to('/foro/comentar?forum_id='.$request->forum_id.'&user_id='.$request->user_id);
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
