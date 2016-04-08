<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Ova;

use App\User;

use App\Download;

use Laracasts\Flash\Flash;

class DownloadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $downloads = Download::orderBy('id','ASC')->paginate(10);
        //Utilizar las relaciones hechas en las funciones del modelo de dwonloads
        $downloads->each(function($downloads){
            $downloads->user;
            $downloads->ova;
        });       
        return view('admin.downloads.index')->with('downloads', $downloads);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ovas = Ova::orderBy('name', 'ASC')->lists('name', 'id');
        return view('admin.downloads.create')->with('ovas',$ovas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $download = new Download($request->all());
        $download->user_id = \Auth::user()->id;
        $download->ova_id = $request->ova_id;
        $download->save();
        Flash::success("Se ha registrado la descarga " .$download->id. " con exito!");
        return redirect()->route('admin.users.index');
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
        $downloads = Download::find($id);
        $ovas = Ova::orderBy('name', 'ASC')->lists('name', 'id');
        return view('admin.downloads.edit')->with('downloads', $downloads)->with('ovas', $ovas); 
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $download = Download::find($id);
        $download->fill($request->all());
        $download->save();
        Flash::warning("Se ha actualizado la descarga " .$download->id. " con exito!");
        return redirect()->route('admin.downloads.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $download = Download::find($id);
        $download->delete();
        Flash::error('La descarga ' .$download->id. ' ha sido borrado con exito!');
        return redirect()->route('admin.downloads.index');
    }
}
