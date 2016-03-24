<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Category;
use App\User;
use App\Ova_Evaluation;
use App\Ova;
use DB;
use Laracasts\Flash\Flash;

class OvaCategoryController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::orderBy('id','ASC')->get();
        return view('ova.category.index')->with('categories', $categories);
    }

    public function show($id)
    {
    	$ovas = Ova::orderBy('id', 'ASC')->where('category_id',$id)->get();
        return view('ova.category.show')->with('ovas', $ovas);
    }
}
