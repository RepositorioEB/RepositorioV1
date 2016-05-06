<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Laracasts\Flash\Flash;

use App\User;

use App\Url;

use App\Help;

use Illuminate\Support\Facades\Redirect;

use App\Http\Requests\HelpRequest;

class HelpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function own()
    {
        $helps = Help::orderBy('id','ASC')->paginate(10);
        $helps->each(function($helps){
            $helps->user;
        });
        return view('admin.helps.own.index')->with('helps', $helps);
    }

    public function index(Request $request)
    {
        $helps = Help::SearchName($request->name)->orderBy('id', 'ASC')->first();
        $helps = Help::SearchName($request->name)->orderBy('id', 'ASC')->paginate(10);
        
        $helps->each(function($helps){
            $helps->user;
        });
        return view('admin.helps.index')->with('helps', $helps);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.helps.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HelpRequest $request)
    {
        
        $help = new Help($request->all());
        $ayudas = Help::orderBy('id','ASC')->lists('name', 'id');
        foreach ($ayudas as $lista) {
            if (strtolower($lista) === strtolower($help->name)) {
                Flash::error("La ayuda ya existe");
                return redirect()->route('admin.helps.create');
            }
        }
        $file = $request->file('video2');
        $filesize =filesize($request->file('video2'))/1024/1024; 
        
        if($file==null){
            Flash::error("Debe ingresar el video.");
            return redirect()->route('admin.helps.create');
        }else
        {
            if($filesize>60){
                Flash::error("El tamaño del video debe ser menor a 60 MB");
                return redirect()->route('admin.helps.create');
            }else{
            $cont = substr_count($file->getClientOriginalName(), '.');
            $arrayNombre = explode(".", $file->getClientOriginalName(), ($cont+1));
            $tam=sizeof($arrayNombre);
            if($arrayNombre[$tam-1] == 'mp4'){
                $nombre = $file->getClientOriginalName();
                $help->name = $request->name;
                $help->description = $request->description;
                $help->user_id = \Auth::user()->id;
                $help->save();
                $nombre = "help_".$help->id.$nombre;
                $path = public_path().'/videos/';
                $file->move($path, $nombre);
                $help->video = $nombre;
                $help->save();
                Flash::success("Se ha registrado el video " .$help->name. " con exito!");
                return redirect()->route('admin.helps.index');
            }else{
                Flash::error("El archivo debe ser .wmv");
                return redirect()->route('admin.helps.create');
            }
            }
        }
        Flash::success("Se ha registrado la ayuda " .$help->name. " con exito!");
        return redirect()->route('admin.helps.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $help = Help::find($id);   
        return view('member.helps.show')->with('help',$help);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $helps = Help::find($id);
        return view('admin.helps.edit')->with('helps', $helps); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(HelpRequest $request, $id)
    {
        $helps = Help::find($id);
        $helps->fill($request->all());
        $file = $request->file('video2');
        if($file != null){
            $nombre = $file->getClientOriginalName();
            $path = public_path().'/videos/';
            \File::delete($path.$helps->video);
            $nombre = "help_".$helps->id.$nombre;
            $path = public_path().'/videos/';
            $file->move($path, $nombre);
            $helps->video = $nombre;
        }
        $helps->save();
        Flash::warning("Se ha actualizado la ayuda " .$helps->name. " con exito!");
        return redirect()->route('admin.helps.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $helps = Help::find($id);
        $path = public_path().'/videos/';
        \File::delete($path.$helps->video);
        $helps->delete();
        Flash::error('La ayuda ' .$helps->name. ' ha sido borrado con exito!');
        return redirect()->route('admin.helps.index');
    }

    public function listas(Request $request)
    {
        $helps = Help::SearchName($request->name)->orderBy('id', 'ASC')->first();
        $helps = Help::SearchName($request->name)->orderBy('id', 'ASC')->paginate(10);
        
        $helps->each(function($helps){
            $helps->user;
        });
        return view('member.helps.index')->with('helps', $helps);
    }
}
