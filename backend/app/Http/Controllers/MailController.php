<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Mail;
use App\Mail\InviteMail;
use App\Mail\SignUpMail;


class MailController extends Controller
{
    
public function invitemail(Request $request){
   Mail::to($request['email'])->send(new InviteMail);
    return(" e-mail sent");
}

private function signupmail(Request $request){
   Mail::to($request['email'])->send(new SignUpMail);
   return(" e-mail sent");
}
}
