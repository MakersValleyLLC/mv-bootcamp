<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Mail\TestEmail;


class MailController extends Controller
{
    
public function invitemail(Request $request){
   $data = ['message' => 'This is a test!'];
   Mail::to($request['email'])->send(new App\Mail\TestEmail($data));
    return(" e-mail sent");
}

private function signupmail(Request $request){
   $data = ['message' => 'This is a test!'];
   Mail::to($request['email'])->send(new TestEmail($data));
}
}
