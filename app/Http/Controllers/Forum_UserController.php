<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;
use App\forum_user;
use App\user;
use App\Forum;

class Forum_UserController extends Controller
{
    public function index(Request $request)
    {
    	$foros_usuarios = forum_user::orderBy('created_at','DESC')->paginate(10);
    	$foros = DB::table('forums')->where('id', $request->forum_id)->first();
        $users = user::orderBy('created_at','ASC')->paginate(10);
        return view('member.forums_users.index')->with('foros_usuarios', $foros_usuarios)->with("foros",$foros)->with("users",$users);
    }

    public function create()
    {
    
    }
    public function store(Request $request)
    {
    	    $foros_usuarios = new forum_user($request->all());
            $foros_usuarios->message = $request->message;
            $foros_usuarios->save();
            $foros_usuarios = forum_user::orderBy('created_at','ASC')->paginate(10);           
            $users = DB::table('users');
            return redirect()->route('member.foros_usuarios.index',['forum_id'=>$request->forum_id,'user_id'=>$request->user_id])->with('foros_usuarios', $foros_usuarios)->with('users',$users);  
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
