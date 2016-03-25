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
class OvaTypeController extends Controller
{
    public function index(Request $request)
    {
        $types = Type::orderBy('id','ASC')->get();
        return view('ova.type.index')->with('types', $types);
    }

    public function show(Request $request,$id)
    {
        $ovas = Ova::Search($request->name)->orderBy('id', 'ASC')->where('type_id',$id)->paginate(10);
        return view('ova.type.show')->with('ovas', $ovas);
    }
}
