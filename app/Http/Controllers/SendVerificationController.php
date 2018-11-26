<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\EmailVerification;
use Illuminate\Support\Facades\Mail;
class SendVerificationController extends Controller
{
    public function send(Request $req, $id)
    {
        $objDemo = new \stdClass();
        $objDemo->demo_one = 'Demo One Value';
        $objDemo->demo_two = 'Demo Two Value';
        $objDemo->sender = 'SenderUserName';
        $objDemo->receiver = 'ReceiverUserName';
 
        Mail::to("sjovianto@gmail.com")->send(new EmailVerification($objDemo));
    }
}