<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Ova_Evaluation;
use App\Ova;
use DB;
use Laracasts\Flash\Flash;
use App\Type;
use App\Category;
use App\User;

class OvaEvaluationController extends Controller
{
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
        return view('ova.index')->with('ovas', $ovas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ova_evaluation = new Ova_Evaluation($request->all());
        $ova_evaluation->ova_id = $request->id;
        $ova_evaluation->user_id = \Auth::user()->id;
        $ova_evaluation->punctuation = $request->estrellas;
        $ova_evaluation->save();
        Flash::success("Gracias por realizar la evaluacion del ova");
        return redirect()->route('ovas.ova.index');
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
        return view('ova.show')->with('ova', $ova);
    }
}