<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Type;

use App\Http\Requests\TypeRequest;

use Illuminate\Support\Facades\Redirect;

use Laracasts\Flash\Flash;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::orderBy('id','ASC')->paginate(10);
        return view('admin.types.index')->with('types', $types);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TypeRequest $request)
    {
        $types = new Type($request->all());
        $typeslist = Type::orderBy('id','ASC')->lists('name', 'id');
        foreach ($typeslist as $lista) {
            if (strtolower($lista) === strtolower($types->name)) {
                Flash::error("El tipo ya existe");
                return redirect()->route('admin.types.create');
            }
        }
        $types->save();
        Flash::success("Se ha registrado el tipo " .$types->name. " de las ovas con exito!");
        return redirect()->route('admin.types.index');
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
        $types = Type::find($id);
        return view('admin.types.edit')->with('types', $types); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TypeRequest $request, $id)
    {
        $types = Type::find($id);
        $types->fill($request->all());
        $types->save();
        Flash::warning("Se ha actualizado el tipo " .$types->name. " de las ova con exito!");
        return redirect()->route('admin.types.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $types = Type::find($id);
        $types->delete();
        Flash::error('El tipo ' .$types->name. ' de las ovas ha sido borrado con exito!');
        return redirect()->route('admin.types.index');
    }
}
