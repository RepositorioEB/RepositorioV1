<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Ova;

use App\Type;

use App\Category;

use App\User;

class OvaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $ovas = Ova::Search($request->name)->orderBy('id','ASC')->paginate(10);
        $ovas->each(function($ovas){
            $ovas->type;
            $ovas->category;
            $ovas->user;
        });       
        return view('admin.ovas.index')->with('ovas', $ovas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::orderBy('name', 'ASC')->lists('name', 'id');
        $categories = Category::orderBy('name', 'ASC')->lists('name', 'id');
        return view('admin.ovas.create')->with('types',$types)->with('categories',$categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ova = new Ova($request->all());
        $ova->type_id = $request->type_id;
        $ova->category_id = $request->category_id;
        $ova->user_id = \Auth::user();
        $ova->save();
        Flash::success("Se ha registrado el ova " .$ova->id. " con exito!");
        return redirect()->route('admin.ovas.index');
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
        return view('admin.ovas.show')->with('ova', $ova);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ovas = Ova::find($id);
        $types = Type::orderBy('name', 'ASC')->lists('name', 'id');
        $categories = Category::orderBy('name', 'ASC')->lists('name', 'id');
        return view('admin.ovas.edit')->with('ovas', $ovas)->with('types', $types)->with('categories', $categories); 
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
        $ova = Ova::find($id);
        $ova->fill($request->all());
        $ova->save();
        Flash::warning("Se ha actualizado el ova " .$ova->id. " con exito!");
        return redirect()->route('admin.ovas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ova = Ova::find($id);
        $ova->delete();
        Flash::error('El ova ' .$ova->id. ' ha sido borrado con exito!');
        return redirect()->route('admin.ovas.index');
    }
}
