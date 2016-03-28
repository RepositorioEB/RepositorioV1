<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Ova;

class RecentArchiveController extends Controller
{
    public function index(){
    	$ovas = Ova::orderBy('id', 'DES')->where('state','1')->paginate(10);
        return view('ova.recentarchive.index')->with("ovas",$ovas);
    }
}