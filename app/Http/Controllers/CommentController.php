<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($news_id)
    {
        $comments = Comment::all();

        return response()->json($comments,200);
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
        $comment = new Comment;
        $comment->id_user = $request->id_user;
        $comment->id_berita = $request->id_berita;
        $comment->isi = $request->isi;
        $user = \App\User::find($comment->id_user);
        
        $success = $comment->save();
        $comment->user = [
            'id' => $user->id,
            'name' => $user->name,
            'photoUrl' => $user->photoUrl
        ];
        
        if(!$success){
            return response()->json('Error Saving',500);
        }else
        return response()->json($comment, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comment = Comment::where('id_berita','=',$id)->orderBy('created_at','DESC')->get()->each(function ($item, $key) {
            $user = \App\User::find($item->id_user);
            $item->user = [
                'id' => $user->id,
                'name' => $user->name,
                'photoUrl' => $user->photoUrl
            ];
        });

        if(is_null($comment)){
            return response()->json('Not Found',404);
        }
        else
            return response()->json($comment,200);
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
        $comment = Comment::find($id);

        if(!is_null($request->id_user)){
            $comment->id_user = $request->id_user;
        }
        if(!is_null($request->id_berita)){
            $comment->id_berita = $request->id_berita;
        }
        if(!is_null($request->isi)){
            $comment->isi = $request->isi;
        }
        $success = $comment->save();

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
        $comment = Comment::find($id);
        
        if(is_null($comment)){
            return response()->json('Not Found',404);
        }
        $success = $comment->delete();

        if(!$success){
            return response()->json('Error Deleting',500);
        }
        else
            return response()->json('Success',200);
    }
}
