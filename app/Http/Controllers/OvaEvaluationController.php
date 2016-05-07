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
use App\Ova_Comment;

class OvaEvaluationController extends Controller
{
    public function slug($slug){
        $ovas = DB::table('ovas')->where('slug', $slug)->first();
        $ova = Ova::find($ovas->id);
        if($ova->state ==true){
            $ovas_comments = Ova_comment::orderBy('id','DES')->where('ova_id',$ova->id)->get();
            $ovas_comments->each(function($ovas_comments){
                $ovas_comments->user;    
            });
            $ovas_evaluations = Ova_Evaluation::get();  
            return view('ova.show')->with('ova', $ova)->with('ovas_comments', $ovas_comments)->with('ovas_evaluations',$ovas_evaluations);
        }
    }
    public function own()
    {   
        $ovas = Ova::orderBy('id','ASC')->paginate(20);
                     
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

        return view('ova.own.index')->with('ovas', $ovas);
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
            $ova->punctuation = round($res,2);
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
        $ova = DB::table('ovas')->where('id', $request->id)->first();
        $ovas_evaluations = Ova_Evaluation::where([['ova_id',$request->id],['user_id',\Auth::user()->id]])->first();
        if($request->estrellas){
            if($ovas_evaluations == null){
            $ova_evaluation = new Ova_Evaluation($request->all());
            $ova_evaluation->ova_id = $request->id;
            $ova_evaluation->user_id = \Auth::user()->id;
            $ova_evaluation->punctuation = $request->estrellas;
            $ova_evaluation->save();
            Flash::success("Gracias por realizar la evaluacion del ova");
            return redirect()->route('ovas.ova.show',$ova->slug);
            }else{
            $ovas_evaluations = Ova_Evaluation::get();  
            return redirect()->route('ovas.ova.show',$ova->slug)->with('ovas_evaluations',$ovas_evaluations);
            }
        }else{
            Flash::warning("No ha seleccionado ninguna estrella.");
            return redirect()->route('ovas.ova.show',$ova->slug);
        }
        
    }
    /**
     * Display the specified resource.::
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {    
    }
}
