<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

use App\Profile;

use App\Ova;

use Hash;

use Laracasts\Flash\Flash;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(\Auth::user()->id);
        $user->profile;
        $profiles = Profile::orderBy('name', 'ASC')->lists('name', 'id');
        $ovas = Ova::orderBy('id','ASC')->paginate(10);
        $ovas->each(function($ovas){
            $ovas->type;
            $ovas->category;
            $ovas->user;
        });
        $i = false;
        foreach ($ovas as &$ova) {
            if ($ova->user_id == $user->id) {
                $i = true;
            }
        }
        return view('cuenta.index')->with('i', $i)->with('ovas', $ovas)->with('user', $user)->with('profiles', $profiles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function edit($id)
    {
        $user = User::find($id);
        if ($user->photo == null) {
            $user->photo = 'userdefect.png';
        }
        $profiles = Profile::orderBy('name', 'ASC')->lists('name', 'id');
        return view('cuenta.edit')->with('user',$user)->with('profiles',$profiles);
    }

    public function password($id){
        $user = User::find(\Auth::user()->id);
        return view('cuenta.modificatepassword')->with('user',$user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if($request->section == "passwordnew"){
            if (strlen($request->password) >= 8 AND strlen($request->newpassword) >= 8 AND strlen($request->newpassword) >= 8) {                
                if (Hash::check($request->password, \Auth::user()->password)){
                    if ($request->newpassword == $request->newpassword2) {
                        if ($request->password == $request->newpassword) {
                            $user = User::find(\Auth::user()->id);
                            Flash::warning("La contraseña actual es la misma que la nueva");
                            return view('cuenta.modificatepassword')->with('user',$user);
                        }else{
                            $user = User::find(\Auth::user()->id);
                            $user->password = bcrypt($request->newpassword);
                            $user->save();
                            Flash::warning("Se ha actualizado la contraseña de " .$user->name. " con exito!");
                            return redirect()->route('cuenta.user.index');
                        }
                    }else{
                        $user = User::find(\Auth::user()->id);
                        Flash::warning("La contraseña nueva no coincide con su confirmacion");
                        return view('cuenta.modificatepassword')->with('user',$user);
                    }
                }else{
                    $user = User::find(\Auth::user()->id);
                    Flash::warning("La contraseña actual es erronea");
                    return view('cuenta.modificatepassword')->with('user',$user);
                }
            }else{
                $user = User::find(\Auth::user()->id);
                Flash::warning("Las contraseñas deben ser de minimo 8 caracteres");
                return view('cuenta.modificatepassword')->with('user',$user);
            }
        }else{
            $s = \Auth::user()->photo;
            if ($s != 'userdefect.png') {
                if ($s != null) {
                    if ($request->file('photo')){
                        $path = public_path().'/images/users/';
                        \File::delete($path.$s);
                    }
                }
            }
            if ($request->file('photo')) {
                $file = $request->file('photo');
                $name = 'roa_'.time().'.'. $file->getClientOriginalExtension();
                $path = public_path().'/images/users/';
                $file->move($path, $name);
            }
            $user = User::find(\Auth::user()->id);
            $user->fill($request->all());
            if ($request->file('photo')) {
                $user->photo = $name;
            }
            $user->save();
            Flash::warning("Se ha actualizado el usuario " .$user->name. " con exito!");
            return redirect()->route('cuenta.user.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
