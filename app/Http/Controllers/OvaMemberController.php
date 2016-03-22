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
        $ova = new Ova($request->all());
        $ova->type_id = $request->type_id;
        $ova->category_id = $request->category_id;
        $ova->user_id = \Auth::user()->id;
        $ova->save();
        Flash::success("Se ha registrado el ova " .$ova->id. " con exito!");
        return redirect()->route('ovas.ova.index');
    }
    public function create()
    {
        $types = Type::orderBy('name', 'ASC')->lists('name', 'id');
        $categories = Category::orderBy('name', 'ASC')->lists('name', 'id');
        return view('ova.create')->with('types',$types)->with('categories',$categories);
    }
}