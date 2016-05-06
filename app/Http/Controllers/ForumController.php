<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Forum;
use Laracasts\Flash\Flash;
use App\Http\Requests\ForumRequest;

class ForumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function own()
    {
        $forums = Forum::orderBy('id','ASC')->paginate(20);
        $forums->each(function($forums){
            $forums->user;
        });
        if (\Auth::user()->role == 'admin') {
            return view('admin.forums.own.index')->with('forums', $forums);
        }else{
            return view('member.forums.own.index')->with('forums', $forums);
        }   
    }
    public function index(Request $request)
    {
        $forums = Forum::SearchForum($request->name)->orderBy('id', 'ASC')->first();
        $forums = Forum::SearchForum($request->name)->orderBy('id', 'ASC')->paginate(10);
        
        $forums->each(function($forums){
            $forums->user;
        });
        return view('admin.forums.index')->with('forums', $forums);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (\Auth::user()->role == 'admin') {
            return view('admin.forums.create');
        }else{
            return view('member.forums.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ForumRequest $request)
    {
        $forums = new Forum($request->all());
        $forumslist = Forum::orderBy('id','ASC')->lists('name', 'id');
        foreach ($forumslist as $lista) {
            if (strtolower($lista) === strtolower($forums->name)) {
                Flash::error("El foro ya existe");
                if (\Auth::user()->role == 'admin') {
                    return redirect()->route('admin.forums.create');
                }else{
                    return redirect()->route('member.forums.create');
                }
            }
        }
        
        if (\Auth::user()->role == 'admin') {
                $forums = new Forum($request->all());
                $forums->user_id = \Auth::user()->id;
                $forums->save();
                Flash::success("Se ha creado el foro " .$forums->name. " con exito!");
                return redirect()->route('admin.forums.index');
        }else{
            $forums = new Forum($request->all());
            $forums->user_id = \Auth::user()->id;
            $forums->save();
            Flash::success("Se ha creado el foro " .$forums->name. " con exito!");
            return redirect()->route('foro.foros_usuarios.index');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $forums = Forum::find($id);
        return view('admin.forums.edit')->with('forums', $forums); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ForumRequest $request, $id)
    {
        $forums = Forum::find($id);
        $forums->fill($request->all());
        $forums->save();
        Flash::warning("Se ha actualizado el foro " .$forums->name. " con exito!");
        return redirect()->route('admin.forums.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $forums = Forum::find($id);
        $forums->delete();
        Flash::error('El foro' .$forums->name. ' ha sido borrado con exito!');
        return redirect()->route('admin.forums.index');
    }
}
