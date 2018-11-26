<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\RegisterFormRequest;
use Carbon\Carbon;
use JWTAuth;
use Auth;
use App\Http\Resources\newMember as NewMemberResource;
<<<<<<< Updated upstream
=======
use App\Token;
use App\Mail\EmailVerification;
use Illuminate\Support\Facades\Mail;
>>>>>>> Stashed changes
class AuthController extends Controller
{
    //
    public function register(RegisterFormRequest $req){
        $u = new User;
        $u->email = $req->email;
        $u->name = $req->name;
        $u->password = bcrypt($req->password);
        $u->prody = $req->prody;
        
        $u->birthDay = date('Y-m-d', strtotime($req->birthDay));
        $u->bornPlace = $req->bornPlace;
        $u->npm  = $req->npm;
        $u->phone  = $req->phone;
        $u->save();
<<<<<<< Updated upstream
=======
        $t = new Token;
        
        do {
            $token = str_random(32);
        } while (Token::find($token) instanceof User);
        $t->token = $token;
        $this->sendEmailVerification($token, $req->email, $req->name);
        $t->user_id=$u->id;
        $t->save();
>>>>>>> Stashed changes
        return response([
            'status' => 'success',
            'data' => $u
        ], 200);
    }
    private function sendEmailVerification($token, $email, $name){
        $objDemo = new \stdClass();
        $objDemo->sender = 'Jo Vianto';
        $objDemo->receiver = $name;
        $objDemo->token = $token;
        Mail::to($email)->send(new EmailVerification($objDemo));
    }
    public function login(Request $request){
        $credentials = $request->only('email', 'password');

        if ( ! $token = JWTAuth::attempt($credentials)) {
                return response([
                    'status' => 'error',
                    'error' => 'invalid.credentials',
                    'msg' => 'Invalid Credentials.'
                ], 400);
        }

        return response([
                'status' => 'success'
        ], 200)
            ->header('Authorization', $token);
    }

    public function user(Request $request){
        $user = User::find(Auth::user()->id);

        return response([
                'status' => 'success',
                'data' => $user
            ]);
    }

    public function refresh(){
        return response([
                'status' => 'success'
            ]);
    }
    public function logout()
    {
        JWTAuth::invalidate();
        return response([
                'status' => 'success',
                'msg' => 'Logged out Successfully.'
            ], 200);
    }
    public function getNewMember(){
        return new NewMemberResource(User::where('role','anggota baru')->get());
    }
}
