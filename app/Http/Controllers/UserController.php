<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;
use Auth;
use App\User;
use App\Http\Resources\newMember as NewMemberResource;
use App\Token;
class UserController extends Controller
{
    //
    public function delete($id){
        
        try{
            if(Auth::user()->role != 'admin'){
            return response([
                'status' => 'error',
                'error' => 'invalid.credentials',
                'msg' => 'Forbidden.'
            ], 403);
            
            
        }
        }catch(Exception $e){
            return response($e->getMessage(), 500);
        }
        $user = User::findOrFail($id);

        $user->deleteMe();
        
        return response(['msg' => 'Sukses Menghapus'],200);
    }

    public function accept($id){
        try{
            if(Auth::user()->role != 'admin'){
            return response([
                'status' => 'error',
                'error' => 'invalid.credentials',
                'msg' => 'Forbidden.'
            ], 403);
            
            
        }
        }catch(Exception $e){
            return response($e->getMessage(), 500);
        }
        $user = User::findOrFail($id);

        $user->role = "anggota";
        $user->save();
        return response(['msg' => 'Sukses Menghapus'],200);
    }
    public function update(Request $request, $id)
    {
        $req = $request->only('name','birthDay','prody','npm','phone','facebook','twitter','instagram');
        $user = User::findOrFail($id);
        $request_data = $request->data['name'];
        
        $user->name = $request->data['name'];
        $user->birthDay = date('Y-m-d', strtotime($request->data['birthDay']));
        $user->prody = $request->data['prody'];
        $user->npm = $request->data['npm'];
        $user->phone = $request->data['phone'];
        $user->facebook = $request->data['facebook'];
        $user->twitter = $request->data['twitter'];
        $user->instagram = $request->data['instagram'];
        $user->save();
        return response($request->data, 200);
    }
    public function getMember(){
        return new NewMemberResource(User::where('role','!=','anggota baru')->paginate(1));
    }
}
