<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Type;
use App\Category;
use App\User;
use App\Ova_Evaluation;
use App\Ova;
use App\Language;
use App\Ova_Comment;
use DB;
use Laracasts\Flash\Flash;
use App\Http\Requests\OvaRequest;

class OvaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ovas(Request $request)
    {
        $ovas = Ova::Search($request->name)->orderBy('id', 'ASC')->where('state','1')->paginate(10);
        $ovas_comments = Ova_Comment::orderBy('id', 'DESC')->get();
        $ovas->each(function($ovas){
            $ovas->type;
            $ovas->category;
            $ovas->user;    
        });
        $ovas_evaluations = Ova_Evaluation::get();  
        return view('ova.ova.index')->with("ovas",$ovas)->with("ovas_comments",$ovas_comments)->with("ovas_evaluations",$ovas_evaluations);
    }
    
    public function index(Request $request)
    {
        if($request->name){
            if(($request->select)=='Nombre'){
                $ovas = Ova::Search($request->name)->orderBy('id','ASC')->first();
                $ovas = Ova::Search($request->name)->orderBy('id','ASC')->paginate(20);
            }else{
                if(($request->select)=='Tipo'){
                    $type = Type::SearchType($request->name)->select('id')->orderBy('id','ASC')->get();
                    if($type){
                        $ovas = Ova::whereIn('type_id',$type)->orderBy('id','ASC')->paginate(20);  
                    }
                }else{
                    $category = Category::SearchCategory($request->name)->select('id')->orderBy('id','ASC')->get();
                    if($category){
                        $ovas = Ova::whereIn('category_id', $category)->orderBy('id','ASC')->paginate(20);
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
            $ova->punctuation = round($res,2);
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
        $language = Language::languageList();
        return view('admin.ovas.create')->with('types',$types)->with('categories',$categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OvaRequest $request)
    {
        $ovas = new Ova($request->all());
        $ovaslist = Ova::orderBy('id','ASC')->lists('name', 'id');
        foreach ($ovaslist as $lista) {
            if (strtolower($lista) === strtolower($ovas->name)) {
                Flash::error("El OVA ya existe");
                return redirect()->route('admin.ovas.create');
            }
        }
        $file = $request->file('archive2');
        if($file==null){
            Flash::error("Debe ingresar el archivo.");
            return redirect()->route('admin.ovas.create');
        }else
        {
            $cont = substr_count($file->getClientOriginalName(), '.');
            $arrayNombre = explode(".", $file->getClientOriginalName(), ($cont+1));
            $tam=sizeof($arrayNombre);
            if($arrayNombre[$tam-1] == 'zip' || $arrayNombre[$tam-1] == 'rar'){
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
                Flash::success("Se ha registrado el ova " .$ova->name. " con exito!");
                return redirect()->route('admin.ovas.index');
            }else{
                Flash::error("El archivo debe ser .rar ó .zip.");
                return redirect()->route('ovas.ovamember.create');
            }
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
        $ova = Ova::find($id);
        $language = Language::languageCode($ova->language);
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
        $language = Language::languageList();
        return view('admin.ovas.edit')->with('ovas', $ovas)->with('types', $types)->with('categories', $categories); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OvaRequest $request, $id)
    {
        $file = $request->file('archive2');
        $ova = Ova::find($id);
        $ovaslist = Ova::orderBy('id','ASC')->where('id','!=',$id)->lists('name', 'id');
        foreach ($ovaslist as $lista) {
            if (strtolower($lista) === strtolower($request->name)) {
                Flash::error("El OVA ya existe");
                return redirect()->route('admin.ovas.edit',$id);
            }
        }
        $ova->fill($request->all());
        if($file != null){
            $nombre = $file->getClientOriginalName();
            \Storage::delete($request->archive);    
            $nombre = $ova->id.$nombre;
            \Storage::disk('local')->put($nombre,  \File::get($file));
            $ova->archive = $nombre;
        }
        $arrayNombre = explode(" ", $request->name);
        $slug="";
        if(sizeof($arrayNombre)>1){
            for ($i=0; $i < sizeof($arrayNombre); $i++) { 
                if ($i==0) {
                    $slug= $arrayNombre[$i];
                }else{
                    $slug= $slug."-".$arrayNombre[$i];   
                }
            }     
        }
        $ova->slug =$slug;
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
        $nombre = $ova->archive;
        \Storage::delete($nombre);
        $ova->delete();
        Flash::error('El ova ' .$ova->id. ' ha sido borrado con exito!');
        return redirect()->route('admin.ovas.index');
    }
}
