<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Token;
class EmailVerificationController extends Controller
{
    //
    public function index($token){
        $tokeN = Token::findOrFail($token);
        $user = $this->verify($tokeN->user_id);
        $tokeN->delete();
        return response([
            'email'=>$user->email,
            'status'=>202,
        ],202);
    }
    public function verify($id){
        $u = User::find($id);
        $u->email_verified_at = new \Carbon\Carbon();
        $u->save();
        return $u;
    }
}
