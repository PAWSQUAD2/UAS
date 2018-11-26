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
        return News::all();
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
<<<<<<< HEAD
        $news = new News;
        $news->judul = $request->judul;
        $news->isi = $request->isi;
        $news->photoUrl = $request->photoUrl;
        $news->kategori = $request->kategori;
        $success = $news->save();

        if(!$success){
            return response()->json('Error Saving',500);
        }else
        return response()->json('success',201);
=======
        return News::create($request->all());
>>>>>>> parent of 422042b... Member
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return News::find($id);
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
<<<<<<< HEAD
        $news = News::find($id);

        if(!is_null($request->judul)){
            $news->judul = $request->judul;
        }
        if(!is_null($request->isi)){
            $news->isi = $request->isi;
        }
        if(!is_null($request->photoUrl)){
            $news->photoUrl = $request->photoUrl;
        }
        if(!is_null($request->kategori)){
            $news->kategori = $request->kategori;
        }
        $success = $news->save();

        if(!$success){
            return response()->json('Error Updating',500);
        }
        else    
            return response()->json('Success',200);
=======
        $news = News::findOrFail($id);
        $news->update($request->all());

        return $news;
>>>>>>> parent of 422042b... Member
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
