<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\User_chat;
use App\Http\Requests;
use Laracasts\Flash\Flash;

class User_ChatController extends Controller
{
    public function index(Request $request)
    {   
        $users = DB::table('users')->paginate(30);
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
        $users_chats = DB::table('users_chats')->orderBy('created_at','DESC')->paginate(1000);
        $users = DB::table('users')->get();
        return view('chat.users_chats.conversation')->with('users', $users)->with('users_chats', $users_chats);
    }

    public function conversationchat()
    {
        $users_chats = DB::table('users_chats')->orderBy('created_at','DESC')->paginate(1000);
        $users = DB::table('users')->get();
        return view('chat.users_chats.conversationchat')->with('users', $users)->with('users_chats', $users_chats);    
    }

}
