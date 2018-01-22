<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use DB;
use Lcobucci\JWT\Parser;
class UsersController extends Controller
{
    use AuthenticatesUsers;

    // Create a new user taking as input e-mail and password 
    public function create(Request $request)
    {    
        // role is maker by default

        //validate email and password from the input request
     $v = validator($request->only('first_name','last_name','email', 'password'), [
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:6',
    ]);

     if ($v->fails()) {
        return response()->json($v->errors()->all(), 400);
    }
    $data = request()->only('first_name','last_name','email','password');

    $input = ([
        'role' => "maker",
        'first_name' => $data['first_name'],
        'last_name' => $data['last_name'],
        'email' => $data['email'],
        'password' => bcrypt($data['password']),
    ]);

    $user = User::create($input);

    return ('user created');

}


// Helper function to check if the user is authenticated
// get an AccessToken use the Middleware Auth to receive the User Info 
public function checkUser (String $token){

       $client = new Client(); //GuzzleHttp\Client
       $user_auth = $client->get('http://bootcamp.mv/api/user', [
        'headers' => [
            'Authorization' => 'Bearer '.$token,],]);
       $user = json_decode((string) $user_auth->getBody(), true);
       if ($user == NULL) 
       { 
        return("NOT ALLOWED");
        }
    else{    
        return $user;
        }
}

    // Read and show the information of an User
public function show(Request $request)
{
 $user = $this->checkUser($request->token);
 return $user;
}


public function update(Request $request){    
        //validate the request
    $v = validator($request->only('first_name','last_name','email'), [
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255',
    ]);

    if ($v->fails()) {
        return response()->json($v->errors()->all(), 400);
    }

    $user_auth=$this->CheckUser($request->token);
    $user= User::find($user_auth['id']);

    $user->first_name = $request->first_name;
    $user->last_name = $request->last_name;
    $user->email = $request->email;
    $user->save();

    return ('user updated');
}

public function destroy(Request $request)
{
    $user_auth=$this->CheckUser($request->token);
    $user= User::find($user_auth['id']);
    $user->delete();
    return ('user deleted');
}

public function login(Request $request){     

    $http = new Client(); //GuzzleHttp\Client

      //validate the request
    $v = validator($request->only('email','password'), [
        'email' => 'required',
        'password' => 'required',
    ]);

    if ($v->fails()) {
        return response()->json($v->errors()->all(), 400);
    }

    $user = User::where("email",$request->email)->get()->first(); 

    if ($user== NULL) 
    { 
        return(" e-mail not registered");
    }

    $response = $http->post('http://bootcamp.mv/oauth/token', [
        'form_params' => [
            'grant_type' => 'password',
            'client_id' => '1',
            'client_secret' => 'FZERayp9GckJlkNk7pWX8etDMvyexSLAH2cGn0sF',
            'username' => $request['email'],
            'password' => $request['password'],
            'scope' => '*',
        ],
    ]);

    $token= json_decode((string) $response->getBody(), true); 
    return array($token, $user);
}

public function logout(Request $request){

    $id = (new Parser())->parse($request->token)->getHeader('jti');
    $revoked = DB::table('oauth_access_tokens')->where('id', '=', $id)->update(['revoked' => 1]);
    Auth::logout();

    $json = [
        'success' => true,
        'code' => 200,
        'message' => 'Logged Out',
    ];
    return response()->json($json, '200');
}

protected function guard()
{
    return Auth::guard('api');
}

public function TestEmail(Request $request){
   $data = ['message' => 'This is a test!'];
   Mail::to('mykooll.ohaegbu@gmail.com')->send(new \App\Mail\TestEmail($data));
}

}