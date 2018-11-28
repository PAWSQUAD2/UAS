<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    //
    public function store(Request $request){
        if($request->get('image')){
            $image = $request->get('image');
            $name = time().'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
            \Image::make($request->get('image'))->save(public_path('images/').$name);
        }

        // $image= new FileUpload();
        // $image->image_name = $name;
        // $image->save();

        return response()->json('/images/'.$name, 200);
    }
    public function destroy( $url){
        //unlink(public_path().$request->url);
        $path = \App\News::find($url)->photoUrl;

        if (file_exists(public_path().$path))unlink(public_path().$path);
        return response()->json($path, 201);
    }
}
