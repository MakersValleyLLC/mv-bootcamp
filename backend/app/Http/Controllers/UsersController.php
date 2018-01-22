<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
class UsersController extends Controller
{
	use AuthenticatesUsers;

   /* public function __invoke()
    {
        return Users::all();
    }
    */

    public function index()
    {
        return User::all();
    }



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



    // Read and show the information of an User
public function show($id)
{
      // get the user
    $user = User::find($id);
    if ($user== NULL) 
    { 
        return(" ID not found");
    }

     // show the view and pass the user to it
    return $user; 
}


public function update(Request $request, $id)

{    
    $user= User::find($id);
    if ($user== NULL) 
    { 
        return(" ID not found");
    }
        //validate the request
     $v = validator($request->only('first_name','last_name','email'), [
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255',
    ]);

     if ($v->fails()) {
        return response()->json($v->errors()->all(), 400);
    }

    $user->first_name = $request->first_name;
    $user->last_name = $request->last_name;
    $user->email = $request->email;
    $user->save();

    return ('user updated');
}

public function destroy($id)

{
     $user= User::find($id);
    if ($user== NULL) 
    { 
        return(" ID not found");
    }
    else{
    $user->delete();
    return ('user deleted');
    }
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

$response = $http->post('bootcamp.mv/oauth/token', [
    'form_params' => [
        'grant_type' => 'password',
        'client_id' => 1,
        'client_secret' => 'Xezd0i9SS9Vitl9d5vDnopsfLQkb1KQYCRNerJiq',
        'username' => $request->mail,
        'password' => $request->password,
        'scope' => '*',
    ],
]);

    $token= json_decode((string) $response->getBody(), true); 



                return array($response, $user);
                 // send the token back and test the token
                // I should give user information to FE user information first name , last name, id, and e-mail



            }

            protected function guard()
            {
                return Auth::guard('api');
            }


      //I can receive the token from the FE and destroy it.
            public function logout(Request $request){      
                $request->user()->token()->revoke();

     // destroy the token received and send a message.
            }

        }
