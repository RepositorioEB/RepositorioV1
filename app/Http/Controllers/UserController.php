<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Requests\UserRequest;

use Laracasts\Flash\Flash;

use App\User;

use App\Profile;

use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::Search($request->name)->orderBy('id','ASC')->paginate(10);
        $users->each(function($users){
            $users->profile;
        });
        return view('admin.users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $profiles = Profile::orderBy('name', 'ASC')->lists('name', 'id');
        return view('admin.users.create')->with('profiles',$profiles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        if ($request->file('photo')) {
            $file = $request->file('photo');
            $name = 'roa_'.time().'.'. $file->getClientOriginalExtension();
            $path = public_path().'/images/users/';
            $file->move($path, $name);
        }
        $user = new User($request->all());
        $user->profile_id = $request->profile_id;
        $user->password = bcrypt($request->password);
        $user->save();
        Flash::success("Se ha registrado el usuario " .$user->name. " con exito!");
        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('admin.users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::find($id);
        $profiles = Profile::orderBy('name', 'ASC')->lists('name', 'id');
        return view('admin.users.edit')->with('users', $users)->with('profiles', $profiles); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->fill($request->all());
        $user->save();
        Flash::warning("Se ha actualizado el usuario " .$user->name. " con exito!");
        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        Flash::error('El usuario ' .$user->name. ' ha sido borrado con exito!');
        return redirect()->route('admin.users.index');
    }
}
