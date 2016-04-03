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
    public function index()
    {
        $helps = Help::orderBy('id','ASC')->paginate(10);
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
        $helps = new Help($request->all());
        $ayudas = Help::orderBy('id','ASC')->lists('name', 'id');
        foreach ($ayudas as $lista) {
            if (strtolower($lista) === strtolower($helps->name)) {
                Flash::error("La ayuda ya existe");
                return redirect()->route('admin.helps.create');
            }
        }
        $validacion = strpos($helps->video, "www.youtube.com");
        if ($validacion === false ) {
                Flash::error("El enlace no existe y/o no es valido");
                return redirect()->route('admin.helps.create');
        }else{
            $link = explode("//", $helps->video);
            if (isset($link[1])) {
                $url = Url::url_exists($link[1]);
                if ($url) {
                    $helps->user_id = \Auth::user()->id;
                    $helps->save();
                    Flash::success("Se ha registrado la ayuda " .$helps->name. " con exito!");
                    return redirect()->route('admin.helps.index');
                }else{
                    Flash::error("El enlace no existe y/o no es valido");
                    return redirect()->route('admin.helps.create');
                }
            }else{
                $url = Url::url_exists($helps->video);
                if ($url) {
                    $helps->user_id = \Auth::user()->id;
                    $helps->save();
                    Flash::success("Se ha registrado la ayuda " .$helps->name. " con exito!");
                    return redirect()->route('admin.helps.index');
                }else{
                    Flash::error("El enlace no existe y/o no es valido");
                    return redirect()->route('admin.helps.create');
                }
            }
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
        $help = Help::find($id);   
        $help->user;
        $url = $help->video;
        $query_string = array();
        parse_str(parse_url($url, PHP_URL_QUERY), $query_string);
        $youtube_id = $query_string["v"];
        $urls = "https://www.youtube.com/embed/".$youtube_id;
        return view('member.helps.show')->with('help',$help)->with('urls',$urls);
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
        $helps->delete();
        Flash::error('La ayuda ' .$helps->name. ' ha sido borrado con exito!');
        return redirect()->route('admin.helps.index');
    }

    public function listas()
    {
        $helps = Help::orderBy('id','ASC')->paginate(10);
        $helps->each(function($helps){
            $helps->user;
        });
        return view('member.helps.index')->with('helps', $helps);
    }
}
