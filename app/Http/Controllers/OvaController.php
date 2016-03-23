<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Type;
use App\Category;
use App\User;
use App\Ova_Evaluation;
use App\Ova;
use DB;
use Laracasts\Flash\Flash;

class OvaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
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
                     
        foreach($ovas as $ova){
            $ovas_evaluations = DB::table('ovas_evaluations')->where('ova_id',$ova->id)->get();
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
        return view('admin.ovas.index')->with('ovas', $ovas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::orderBy('name', 'ASC')->lists('name', 'id');
        $categories = Category::orderBy('name', 'ASC')->lists('name', 'id');
        return view('admin.ovas.create')->with('types',$types)->with('categories',$categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('archive2');
        //obtenemos el nombre del archivo
        $nombre = $file->getClientOriginalName();
        
        $ova = new Ova($request->all());
        $ova->archive = $nombre;
        $ova->type_id = $request->type_id;
        $ova->category_id = $request->category_id;
        $ova->user_id = \Auth::user()->id;
        $ova->save();
        $nombre = $ova->id.$nombre;
        \Storage::disk('local')->put($nombre,  \File::get($file));
        $ova->archive = $nombre;
        $ova->save();
        Flash::success("Se ha registrado el ova " .$ova->id. " con exito!");
        return redirect()->route('admin.ovas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ova = Ova::find($id);
        return view('admin.ovas.show')->with('ova', $ova);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ovas = Ova::find($id);
        $types = Type::orderBy('name', 'ASC')->lists('name', 'id');
        $categories = Category::orderBy('name', 'ASC')->lists('name', 'id');
        return view('admin.ovas.edit')->with('ovas', $ovas)->with('types', $types)->with('categories', $categories); 
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
        $file = $request->file('archive2');
        //obtenemos el nombre del archivo
        $nombre = $file->getClientOriginalName();
        //indicamos que queremos guardar un nuevo archivo en el disco local
        \Storage::delete($request->archive);
        $ova = Ova::find($id);
        $ova->fill($request->all());
        $nombre = $ova->id.$nombre;
        \Storage::disk('local')->put($nombre,  \File::get($file));
        $ova->archive = $nombre;
        $ova->save();

        Flash::warning("Se ha actualizado el ova " .$ova->id. " con exito!");
        return redirect()->route('admin.ovas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ova = Ova::find($id);
        $ova->delete();
        Flash::error('El ova ' .$ova->id. ' ha sido borrado con exito!');
        return redirect()->route('admin.ovas.index');
    }
}
