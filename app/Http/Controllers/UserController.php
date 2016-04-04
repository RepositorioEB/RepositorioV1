<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Requests\UserRequest;
use App\Http\Requests\User1Request;
use Laracasts\Flash\Flash;

use App\User;

use App\Profile;

use App\Country;

use Carbon\Carbon;

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
        $country = Country::countryList();
        return view('admin.users.create')->with('profiles',$profiles)->with('country',$country);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $dates = explode("-", $request->date);
        $date = Carbon::createFromDate($dates[0],$dates[1],$dates[2])->age;
        if ($date > 15 AND $date < 90) {
            if ($request->file('photo')) {
                $file = $request->file('photo');
                $name = 'roa_'.time().'.'. $file->getClientOriginalExtension();
                $path = public_path().'/images/users/';
                $file->move($path, $name);
            }
            $user = new User($request->all());
            $user->profile_id = $request->profile_id;
            $user->password = bcrypt($request->password);
            if ($user->photo == null) {
                $user->photo = 'userdefect.png';
            }
            $user->save();
            Flash::success("Se ha registrado el usuario " .$user->name. " con exito!");
            return redirect()->route('admin.users.index');   
        }else{
            $profiles = Profile::orderBy('name', 'ASC')->lists('name', 'id');
            $country = Country::countryList();
            Flash::error("La edad no es aceptada, los rangos permitidos son de 15 a 90");
            return view('admin.users.create')->with('profiles',$profiles)->with('country',$country);
        }        
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
        $country = Country::countryCode($user->country);
        return view('admin.users.show')->with('country', $country)->with('user', $user);
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
        $country = Country::countryList();
        return view('admin.users.edit')->with('country', $country)->with('users', $users)->with('profiles', $profiles); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(User1Request $request, $id)
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
        $s = $user->photo;
        if ($s != 'userdefect.png') {
            if ($s != null) {
                $path = public_path().'/images/users/';
                \File::delete($path.$s);
            }
        }
        $user->delete();
        Flash::error('El usuario ' .$user->name. ' ha sido borrado con exito!');
        return redirect()->route('admin.users.index');
    }
}
