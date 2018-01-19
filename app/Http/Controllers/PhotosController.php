<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Photo;

use Image;

class PhotosController extends Controller
{
    // Photo information store
    public function store(Request $request)
    {

    	$this->validate($request,[
    	'photo' => 'required',
    	]);

        // Generate path, photo store
        $name = "photo".time();
        $src = "img/album/photos/". $name .".jpg";
        Image::make($request->photo)->save(public_path($src));

        // if you had add title, store it,else store default title
        if($request->has('name')){
        	$name = $request->name;
        }


       // Store data
        $photo = Photo::create([
    	    'album_id' => $request->album_id,
    	    'name' => $name,
    	    'intro' => $request->intro,
    	    'src' => "/".$src,
    	    ]);


        // Return
        session()->flash('success', 'Upload Successful');
        return back();
        }


        public function update(Request $request, $id)
        {
            // update
            $photo = Photo::findOrFail($id);
            $photo->update([
                'name' => $request->name,
                'intro' => $request->intro,
                ]);

            // Return
            session()->flash('success','Edit Successful');
            return back();
        }

        // delete photo
        public function destroy($id)
        {
            // delete
            $photo = Photo::findOrFail($id);
            $photo->delete();

            //Return
            session()->flash('success','Delete successful');
            return back();
        }

}
