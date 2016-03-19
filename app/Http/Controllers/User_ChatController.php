<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\User_chat;
use App\Http\Requests;

class User_ChatController extends Controller
{
    public function index(Request $request)
    {   	
        $users_chats = DB::table('users_chats')->orderBy('created_at','DESC')->paginate(1000);
    	return view('member.users_chats.index')->with('users_chats', $users_chats);
    }
    public function create()
    {

    }
    public function store(Request $request)
    {
            $users_chats = new User_chat($request->all());
            $users_chats->save();
            return redirect()->route('member.users_chats.index',['nombredestino'=>$request->namedestino]);
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
