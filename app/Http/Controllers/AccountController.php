<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

use App\Profile;

use App\Ova;

use Hash;
use DB;
use App\Type;
use App\Forum;
use App\Category;
use App\Country;
use App\Http\Requests\AccountRequest;
use Laracasts\Flash\Flash;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = User::find(\Auth::user()->id);
        $user->profile;
        if ($user->photo == null) {
            $user->photo = 'userdefect.png';
        }
        $profiles = Profile::orderBy('name', 'ASC')->lists('name', 'id');
        $ovas = Ova::orderBy('id','ASC')->paginate(10);
        $forums = Forum::orderBy('id','ASC')->get();
        
        if($request->name){
            if(($request->select)=='Nombre'){
                $ovas = Ova::Search($request->name)->orderBy('id','ASC')->first();
                if($ovas){
                    $ovas = Ova::Search($request->name)->orderBy('id','ASC')->paginate(20);
                }else{
                    $ovas = Ova::orderBy('id','ASC')->paginate(20);
                }
            }else{
                if(($request->select)=='Tipo'){
                    $type = Type::SearchType($request->name)->orderBy('id','ASC')->first();
                    if($type){
                        $ovas = Ova::where('type_id', $type->id)->orderBy('id','ASC')->paginate(20);
                    }else{
                        $ovas = Ova::orderBy('id','ASC')->paginate(20);
                    }
                }else{
                    $category = Category::SearchCategory($request->name)->orderBy('id','ASC')->first();
                    if($category){
                        $ovas = Ova::where('category_id', $category->id)->orderBy('id','ASC')->paginate(20);
                    }else{
                        $ovas = Ova::orderBy('id','ASC')->paginate(20);
                    }
                }

            }
        }else{
             $ovas = Ova::Search($request->nameOva)->orderBy('id','ASC')->paginate(20);
        }
        if($request->nameForo){
            $forums = Forum::SearchForum($request->nameForo)->orderBy('id','ASC')->get();
        }

        foreach($ovas as $ova){
            $ovas_evaluations = DB::table('ovas_evaluations')->where('ova_id',$ova->id)->get();
            //Ova_Evaluation::orderBy('ova_id','ASC')->paginate(10);
            $sum = 0;
            $cont =0;
            $res = 0;
            foreach($ovas_evaluations as $ova_evaluation){
                $cont = $cont +1;
                $sum = $sum + $ova_evaluation->punctuation;
            }
            if($cont==0){
                $cont=1;
            }
            $res =$sum / $cont; 
            $ova->punctuation =$res;
        }

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
        $j = false;
        foreach ($forums as $forum) {
            if ($forum->user_id == $user->id) {
                $j = true;
            }
        }
        
        return view('cuenta.index')->with('i', $i)->with('j', $j)->with('ovas', $ovas)->with('forums', $forums)->with('user', $user)->with('profiles', $profiles);
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
        $country = Country::countryList();
        return view('cuenta.edit')->with('country',$country)->with('user',$user)->with('profiles',$profiles);
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
    public function update(AccountRequest $request)
    {
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

    public function update2(Request $request)
    {
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
