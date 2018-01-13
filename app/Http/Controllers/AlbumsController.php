<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Album;

use Image;

class AlbumsController extends Controller
{
    // album information store
    public function store(Request $request)
    {
    	// data verification
    	$this->validate($request, [
    		'name' => 'required|max:50',]);

    	// data store
    	$album = Album::create([
    		'name' => $request->name,
    		'intro' => $request->intro,
    		'password' => $request->password,]);

    	// return
    	session()->flash('success', 'create successful');
    	return back();
    }

    // Album detail page
    public function show($id)
    {
        // get album data
        $album = Album::findOrFail($id);

        // get photo data
        // ..

        // return
        return view('albums.show', compact('album'));
    }

    // albums information update
    public function update(Request $request, $id)
    {
        // data verification
        $this->validate($request,[
            'name' => 'required|max:50',
        ]);

        // update data
        $album =Album::findOrFail($id);
        $album->update([
            'name' => $request->name,
            'intro' => $request->intro,
        ]);

        // storge cover if up;oad cover
        if($request->hasFile('cover')){
            // zip and store cover picture then generate path
            $cover_path = "img/album/covers/" . time() . ".jpeg";
            Image::make($request->cover)->resize(355,200)->save(public_path($cover_path));
            // update cover
            $album->update([
                'cover'=> "/" . $cover_path,
                ]);
        }

        // return
        session()->flash('success', 'Edit successful');
        return back();
    }

    // delete albums
    public function destroy($id)
    {
        // delete
        $album = Album::findOrFail($id);
        $album->delete();

        // return
        session()->flash('success','Delete Successful');
        return redirect()->route('home');

    }
}
