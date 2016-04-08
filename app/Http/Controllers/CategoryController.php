<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Category;

use App\Http\Requests\CategoryRequest;

use Laracasts\Flash\Flash;

use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('id','ASC')->paginate(10);
        return view('admin.categories.index')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $categories = new Category($request->all());
        $categorieslist = Category::orderBy('id','ASC')->lists('name', 'id');
        foreach ($categorieslist as $lista) {
            //En este ciclo se evalua si la categoria que se va ingresar ya existe en el sistema o no.
            //Con la funcion strlower nos permite converitir el parametro enviado a minuscula
            if (strtolower($lista) === strtolower($categories->name)) {
                Flash::error("La categoria ya existe");
                return redirect()->route('admin.categories.create');
            }
        }
        $categories->save();
        Flash::success("Se ha registrado la categoria " .$categories->name. " de las ovas con exito!");
        return redirect()->route('admin.categories.index');
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
        $categories = Category::find($id);
        return view('admin.categories.edit')->with('categories', $categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $categories = Category::find($id);
        $categories->fill($request->all());
        $categories->save();
        Flash::warning("Se ha actualizado la categoria " .$categories->name. " de las ovas con exito!");
        return redirect()->route('admin.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categories = Category::find($id);
        $categories->delete();
        Flash::error('La categoria ' .$categories->name. ' de las ovas ha sido borrado con exito!');
        return redirect()->route('admin.categories.index');
    }
}
