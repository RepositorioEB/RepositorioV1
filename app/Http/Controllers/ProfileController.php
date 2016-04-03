<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;

use App\Profile;

use Laracasts\Flash\Flash;

use App\Http\Requests\ProfileRequest;

use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller
{
    public function index()
    {
        $profiles = Profile::orderBy('id','ASC')->paginate(10);
        return view('admin.profiles.index')->with('profiles', $profiles);
    }

    public function create()
    {
    	return view('admin.profiles.create');
    }

    public function store(ProfileRequest $request)
    {
        $profiles = new Profile($request->all());
        $profileslist = Profile::orderBy('id','ASC')->lists('name', 'id');
        foreach ($profileslist as $lista) {
            if (strtolower($lista) === strtolower($profiles->name)) {
                Flash::error("La categoria ya existe");
                return redirect()->route('admin.profiles.create');
            }
        }
        $profiles->save();
        Flash::success("Se ha registrado el perfil " .$profiles->name. " con exito!");
        return redirect()->route('admin.profiles.index');
    }
    
    public function show($id)
    {

    }

    public function edit($id)
    {
        $profiles = Profile::find($id);
        return view('admin.profiles.edit')->with('profiles', $profiles); 
    }

    public function update(ProfileRequest $request, $id)
    {
        $profiles = Profile::find($id);
        $profiles->fill($request->all());
        $profiles->save();
        Flash::warning("Se ha actualizado el perfil " .$profiles->name. " con exito!");
        return redirect()->route('admin.profiles.index');
    }

    public function destroy($id)
    {
        $profiles = Profile::find($id);
        $profiles->delete();
        Flash::error('El perfil ' .$profiles->name. ' ha sido borrado con exito!');
        return redirect()->route('admin.profiles.index');
    }

    public function lists()
    {
        $profiles = Profile::orderBy('id','ASC')->paginate(5);
        return view('member.profiles.lists')->with('profiles',$profiles);
    }
}
