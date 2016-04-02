<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Forum;

class ForumRecentArchiveController extends Controller
{
    public function index(){
    	$forums = Forum::orderBy('id', 'DES')->paginate(10);
        return view('member.forums.recentarchive.index')->with("forums",$forums);
    }
}