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
use App\Http\Requests\UserRequest;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*
        Esta funcion nos sirver para listar los datos de la cuenta, esto es para la vistar perfil.
    */
    public function index(Request $request)
    {
        $user = User::find(\Auth::user()->id);
        $user->profile;
        /*Cargar imagen por defecto*/
        if ($user->photo == null) {
            $user->photo = 'userdefect.png';
        }
        /*Cargar la lista de perfiles, ovas y foros*/
        $profiles = Profile::orderBy('name', 'ASC')->lists('name', 'id');
        $ovas = Ova::orderBy('id','ASC')->paginate(10);
        $forums = Forum::orderBy('id','ASC')->get();
        /* Esta parte nos permite realizar busquedas tanto por el nombre, como por el tipo y la categoria */
        if($request->name){
            if(($request->select)=='Nombre'){
                /*La funcion Search nos permite buscar en la lista ova, el nombre que le pasamos desde el campo busqueda*/
                $ovas = Ova::Search($request->name)->orderBy('id','ASC')->first();
                if($ovas){
                    $ovas = Ova::Search($request->name)->orderBy('id','ASC')->paginate(20);
                }else{
                    $ovas = Ova::orderBy('id','ASC')->paginate(20);
                }
            }else{
                if(($request->select)=='Tipo'){
                    $type = Type::SearchType($request->name)->select('id')->orderBy('id','ASC')->get();
                    if($type){
                        $ovas = Ova::whereIn('type_id',$type)->orderBy('id','ASC')->paginate(20);  
                    }else{
                        $ovas = Ova::orderBy('id','ASC')->paginate(20);
                    }
                }else{
                    $category = Category::SearchCategory($request->name)->select('id')->orderBy('id','ASC')->get();
                    if($category){
                        $ovas = Ova::whereIn('category_id', $category)->orderBy('id','ASC')->paginate(20);
                    }else{
                        $ovas = Ova::orderBy('id','ASC')->paginate(20);
                    }
                }

            }
        }else{
             $ovas = Ova::Search($request->nameOva)->orderBy('id','ASC')->paginate(20);
        }
        /* Este ciclo nos permite asignar los valores correspondientes para realizar la evaluacion
         del ova. Se busca en la tabla ovas_evaluations cuando sea ova_id*/
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
        /* En este ciclo asignamos los campos correspondientes
        utilizando las relaciones dadas en las funciones del archivo model ova */
        $ovas->each(function($ovas){
            $ovas->type;
            $ovas->category;
            $ovas->user;
        });
        $i = false;
        /* Nos permite validar que ovas fueron creadas o subidos por el usuario actual */
        foreach ($ovas as &$ova) {
            if ($ova->user_id == $user->id) {
                $i = true;
            }
        }
        $j = false;
        /* Nos permite validar que foros fueron creados o subidos por el usuario actual */
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
    public function update(UserRequest $request)
    {
        /*Esta funcion nos permite validar si el usuario modifico la imagen,
        Si el usuario modifico la imagen, se verifica que la imagen actual no sea
        la imagen por defecto, por que si es la imagen por defecto se actualiza la imagen
        pero no se elimina la anterior, si no es la imagen por defecto la elimina del sistema*/
        $s = \Auth::user()->photo;
        if ($s != 'userdefect.png') {
            if ($s != null) {
                if ($request->file('photo')){
                    $path = public_path().'/images/users/';
                    \File::delete($path.$s);
                }
            }
        }
        /*Si el usuario modifco la foto se crea el nombre correspondiente para ser identificado en el
        sistema y se guarda en el sistema*/
        if ($request->file('photo')) {
            $file = $request->file('photo');
            $name = 'roa_'.time().'.'. $file->getClientOriginalExtension();/*Convinar nombre de roa mas la fecha actual*/
            $path = public_path().'/images/users/';//Guardar la imagen en la carpeta images/users/
            $file->move($path, $name);
        }
        $user = User::find(\Auth::user()->id);
        $user->fill($request->all());
        //Asignar el nombre de la foto al usuario.
        if ($request->file('photo')) {
            $user->photo = $name;
        }
        $user->save();
        Flash::warning("Se ha actualizado el usuario " .$user->name. " con exito!");
        return redirect()->route('cuenta.user.index');
    }

    public function update2(Request $request)
    {
        //Esta funcion nos permite modificar el password
        //Aca se valida con la funcion strlen que la longitud del valor de password sea igual o mayor a 8.
        if (strlen($request->password) >= 8 AND strlen($request->newpassword) >= 8 AND strlen($request->newpassword) >= 8) {
            //Se compara la contraseña encriptada en la base de datos con la que le manda el usuario.
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
