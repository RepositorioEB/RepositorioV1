<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Help;

class HelpRecentArchiveController extends Controller
{
    public function index(){
    	$helps = Help::orderBy('id', 'DES')->paginate(10);
        return view('member.helps.recentarchive.index')->with("helps",$helps);
    }
}
