<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Laracasts\Flash\Flash;

use App\User;

use App\Problem;

use Illuminate\Support\Facades\Redirect;

use App\Http\Requests\ProblemRequest;

class ProblemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $problems = Problem::SearchName($request->name)->orderBy('id','ASC')->paginate(10);
        $problems->each(function($problems){
            $problems->user;
        });
        if(\Auth::user()->role =="member")
        {
            return view('member.problems.index')->with('problems', $problems);
        }else{
            return view('admin.problems.index')->with('problems', $problems);
        }  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(\Auth::user()->role =="member")
        {
            return view('member.problems.create');      
        }else{
            return view('admin.problems.create');   
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProblemRequest $request)
    {
        $problems = new Problem($request->all());
        $problems->user_id = \Auth::user()->id;
        $problems->save();
        Flash::success("Se ha registrado el problema " .$problems->id. " con exito!");
        if(\Auth::user()->role =="member")
        {
            return redirect()->route('member.problems.index');      
        }else{
            return redirect()->route('admin.problems.index');   
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $problems = Problem::find($id);
        return view('admin.problems.edit')->with('problems', $problems); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProblemRequest $request, $id)
    {
        $problems = Problem::find($id);
        $problems->fill($request->all());
        $problems->save();
        Flash::warning("Se ha actualizado el problema " .$problems->id. " con exito!");
        return redirect()->route('admin.problems.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $problems = Problem::find($id);
        $problems->delete();
        if(\Auth::user()->role =="member")
        {
            Flash::error('El problema ha sido borrado con exito!');
            return redirect()->route('member.problems.index');      
        }else{
            Flash::error('El problema ' .$problems->id. ' ha sido borrado con exito!');
            return redirect()->route('admin.problems.index');  
        }
        
    }
}
