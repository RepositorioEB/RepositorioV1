<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\User_Chat;
use App\User;
use App\Http\Requests;
use Laracasts\Flash\Flash;

class User_ChatController extends Controller
{
    public function cargarMensajes(){
        $users_chats = DB::table('users_chats')->orderBy('created_at','DESC')->get();   
        $i=0;
        foreach($users_chats as $user_chat)
        {
            if(($user_chat->namedestino==\Auth::user()->username) AND ($i<10))
            {
                $i++;
                echo "<h4><a href='".route('chat.users_chats.conversationchat', ['nombredestino' => $user_chat->nameorigen])."' target='_blank'><div class='label label-danger' name='nombreusuario'>".$user_chat->nameorigen .": <span class='glyphicon glyphicon-arrow-right' aria-hidden='true'></span></div></a>";
                echo "&nbsp;&nbsp;".$user_chat->mensaje."</h4>";
                echo "&nbsp;&nbsp;<div class='label label-primary'>".$user_chat->created_at."</div>";     
            }
        }
    
    }

    public function index(Request $request)
    {   
        $users = User::SearchUsername($request->username)->orderBy('username','ASC')->paginate(30);
        return view('chat.users_chats.index')->with('users', $users);
    }
    public function create()
    {

    }
    public function store(Request $request)
    {
        $users_chats = new User_chat($request->all());
        if($users_chats->mensaje == null){
            Flash::warning("No ha ingresado ningun mensaje");
        }else{
            Flash::success("Mensaje enviado!");
            $users_chats->save();    
        }
        return redirect()->route('chat.users_chats.conversationchat',['nombredestino'=>$request->namedestino]);
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

    public function conversation()
    {
        $users_chats = DB::table('users_chats')->orderBy('created_at','DESC')->paginate(100);
        $users = DB::table('users')->get();
        return view('chat.users_chats.conversation')->with('users', $users)->with('users_chats', $users_chats);
    }

    public function conversationchat()
    {
        $users_chats = DB::table('users_chats')->orderBy('created_at','DESC')->paginate(100);
        $users = DB::table('users')->get();
        return view('chat.users_chats.conversationchat')->with('users', $users)->with('users_chats', $users_chats);    
    }
    public function escribir()
    {
        if($_GET['mensaje']!=''){
            $users_chats = new User_Chat();
            $users_chats->nameorigen =$_GET['nombreorigen'];
            $users_chats->namedestino=$_GET['nombredestino'];
            $users_chats->mensaje=$_GET['mensaje'];
            $users_chats->save();    
        }
    }
}
