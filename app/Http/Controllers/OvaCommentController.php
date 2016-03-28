<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Ova_Comment;
use Laracasts\Flash\Flash;

class OvaCommentController extends Controller
{
    public function store(Request $request){
    	$ova_comment = new Ova_Comment($request->all());
        $ova_comment->user_id = \Auth::user()->id;
        if($ova_comment->comment == null){
        	Flash::warning("No ha ingresado ningun comentario");
        }else{
        	$ova_comment->save();
        	Flash::success("Gracias por realizar el comentario del ova");
        }
        return redirect()->route('ovas.ova.show',$request->ova_id);
    }
}
