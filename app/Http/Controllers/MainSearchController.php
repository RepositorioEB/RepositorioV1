<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;
use App\Ova;
use App\Category;
use App\Type;
use App\Forum;
use App\Help;

class MainSearchController extends Controller
{
    public function index(Request $request)
    {
    	$search=$request->search;
    	if($request->search){
            $ovasname = Ova::Search($request->search)->orderBy('id','ASC')->paginate(20);
            $ovasdescription = Ova::SearchDescription($request->search)->orderBy('id','ASC')->paginate(20);
            $ovasarchive = Ova::SearchArchive($request->search)->orderBy('id','ASC')->paginate(20);
            $ovascategory = Category::SearchCategory($request->search)->orderBy('id','ASC')->paginate(20);        
            $ovastype = Type::SearchType($request->search)->orderBy('id','ASC')->paginate(20);
            $categoriesdescription = Category::SearchCategoryDescription($request->search)->orderBy('id','ASC')->paginate(20);        
            $typesdescription = Type::SearchTypeDescription($request->search)->orderBy('id','ASC')->paginate(20);
            $forumsname = Forum::SearchForum($request->search)->orderBy('id','ASC')->paginate(20);
            $forumscharacteristic = Forum::SearchForumCharacteristic($request->search)->orderBy('id','ASC')->paginate(20);        
            $helpsname = Help::SearchName($request->search)->orderBy('id','ASC')->paginate(20);
            $helpsvideo = Help::SearchVideo($request->search)->orderBy('id','ASC')->paginate(20);   
            $helpsdescription = Help::SearchDescription($request->search)->orderBy('id','ASC')->paginate(20);               
            return view('mainsearch.index') ->with("ovasname",$ovasname)
                                        ->with("ovasarchive",$ovasarchive)
                                        ->with("ovascategory",$ovascategory)
                                        ->with("ovastype",$ovastype)
                                        ->with("categoriesdescription",$categoriesdescription)
                                        ->with("typesdescription",$typesdescription)
                                        ->with("forumsname",$forumsname)
                                        ->with("helpsname",$helpsname)
                                        ->with("helpsvideo",$helpsvideo)
                                        ->with("helpsdescription",$helpsdescription)
                                        ->with("forumscharacteristic",$forumscharacteristic)
                                        ->with("ovasdescription",$ovasdescription);
        }else{
        	Flash::error("No has ingresado ningún caracter!");        	
        }
        
    }

    public function create()
    {
    
    }
    public function store(Request $request)
    {
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }

}
