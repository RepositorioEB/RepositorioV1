<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use App\Type;

use App\Category;

use App\User;

use App\Ova_Evaluation;
use App\Ova;
use DB;
use Laracasts\Flash\Flash;


class OvaMemberController extends Controller
{
    public function store(Request $request)
    {
        $file = $request->file('archive2');
        if($file==null){
            Flash::error("Debe ingresar el archivo.");
            return redirect()->route('ovas.ovamember.create');
        }else
        {
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
            Flash::success("Se ha realizado la solicitud del ova " .$ova->name. " con exito!");
            return redirect()->route('ovas.ova.index');
        }
    }
    public function create()
    {
        $types = Type::orderBy('name', 'ASC')->lists('name', 'id');
        $categories = Category::orderBy('name', 'ASC')->lists('name', 'id');
        return view('ova.create')->with('types',$types)->with('categories',$categories);
    }
}