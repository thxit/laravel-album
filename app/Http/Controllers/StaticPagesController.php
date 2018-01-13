<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Album; // pay attention on this! we must operate after import Model

class StaticPagesController extends Controller
{
    // Home
    public function home(){
    	// get all albums
    	$albums = Album::all();

    	// return
    	return view('home',compact('albums'));
    }

}
