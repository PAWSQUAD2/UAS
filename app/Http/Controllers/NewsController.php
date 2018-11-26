<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newss = News::all();

        return response()->json($newss,200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $news = new News;
        $news->author = $request->author;
        $news->text = $request->text;
        $success = $news->save();

        if(!$success){
            return response()->json('Error Saving',500);
        }else
        return response()->json('success',201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = News::find($id);

        if(is_null($news)){
            return response()->json('Not Found',404);
        }
        else
            return response()->json($news,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $news = News::find($id);

        if(!is_null($request->author)){
            $news->author = $request->author;
        }
        if(!is_null($request->text)){
            $news->text = $request->text;
        }

        $success = $news->save();

        if(!$success){
            return response()->json('Error Updating',500);
        }
        else    
            return response()->json('Success',200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = News::find($id);
        
        if(is_null($news)){
            return response()->json('Not Found',404);
        }
        $success = $news->delete();

        if(!$success){
            return response()->json('Error Deleting',500);
        }
        else
            return response()->json('Success',200);
    }
}
