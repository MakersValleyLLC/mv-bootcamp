<?php

namespace App\Http\Controllers;

use App\Users;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
<<<<<<< HEAD
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use DB;
use Lcobucci\JWT\Parser;
||||||| merged common ancestors
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
=======
>>>>>>> d322ab0378fdd7f7aea76843382e2b024b24f71e
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
        return Users::all();
    }



    // Create a new user taking as input e-mail and password
        public function create(Request $request)
    {
        // role is maker by default

        //validate email and password from the input request
<<<<<<< HEAD
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
||||||| merged common ancestors
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
=======
     $v = validator($request->only('email', 'password'), [
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);
>>>>>>> d322ab0378fdd7f7aea76843382e2b024b24f71e

      if ($v->fails()) {
            return response()->json($v->errors()->all(), 400);
        }
        $data = request()->only('email','password');

        $input([
            'role' => "maker",
            'first_name' => null,
            'last_name' => null,
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        $user = Usesr::create($input);

        return ('user created');

    }


// Helper function to check if the user is authenticated
// get an AccessToken use the Middleware Auth to receive the User Info 
public function checkUser (String $token){

       $client = new Client(); //GuzzleHttp\Client

       $user_auth = $client->get('http://bootcamp.mv/api/user', [
        'headers' => [
            'Authorization' => 'Bearer '.$token,
        ],
    ]);
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
<<<<<<< HEAD
public function show(Request $request)
{
   $user = $this->checkUser($request->token);
   return $user;
||||||| merged common ancestors
public function show($id)
{
      // get the user
    $user = User::find($id);
    if ($user== NULL) 
    { 
        return(" ID not found");
    }
=======
        public function show($id)
    {
      // get the user
        $user = Users::find($id);
        if ($user== NULL)
        {
            $user="not found";
        }
>>>>>>> d322ab0378fdd7f7aea76843382e2b024b24f71e

<<<<<<< HEAD
}
||||||| merged common ancestors
     // show the view and pass the user to it
    return $user; 
}
=======
     // show the view and pass the user to it
        return $user;
    }
>>>>>>> d322ab0378fdd7f7aea76843382e2b024b24f71e


<<<<<<< HEAD
public function update(Request $request)
||||||| merged common ancestors
public function update(Request $request, $id)
=======
public function edit($id)
    {
        // et the id of the user to update
        $user = Users::find($id);
>>>>>>> d322ab0378fdd7f7aea76843382e2b024b24f71e

<<<<<<< HEAD
{    
        //validate the request
    $v = validator($request->only('first_name','last_name','email'), [
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255',
    ]);

    if ($v->fails()) {
        return response()->json($v->errors()->all(), 400);
||||||| merged common ancestors
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
=======
        // show the edit form and pass the nerd
        return View::make('users.edit')
            ->with('users', $user);
>>>>>>> d322ab0378fdd7f7aea76843382e2b024b24f71e
    }

<<<<<<< HEAD
    $user_auth=$this->CheckUser($request->token);
    $user= User::find($user_auth['id']);

    $user->first_name = $request->first_name;
    $user->last_name = $request->last_name;
    $user->email = $request->email;
    $user->save();
||||||| merged common ancestors
    $user->first_name = $request->first_name;
    $user->last_name = $request->last_name;
    $user->email = $request->email;
    $user->save();
=======
>>>>>>> d322ab0378fdd7f7aea76843382e2b024b24f71e

<<<<<<< HEAD
    return ('user updated');
}

public function destroy(Request $request)
||||||| merged common ancestors
    return ('user updated');
}

public function destroy($id)
=======
    public function update(Request $request, $id)
>>>>>>> d322ab0378fdd7f7aea76843382e2b024b24f71e

<<<<<<< HEAD
{
    $user_auth=$this->CheckUser($request->token);
    $user= User::find($user_auth['id']);
    $user->delete();
    return ('user deleted');
}

public function login(Request $request){     
||||||| merged common ancestors
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
=======
    {
        $user= Users::find($id);
        //validate the request
         request()->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
        ]);

         $user->first_name = $request->first_name;
         $user->last_name = $request->last_name;
         $user->email = $request->email;
         $user->save();

        return ('user updated');
    }
>>>>>>> d322ab0378fdd7f7aea76843382e2b024b24f71e

        public function destroy($id)

    {
        Users::find($id)->delete();
        return ('user deleted');
    }

       public function Login(Request $request){
      //validate the request
<<<<<<< HEAD
    $v = validator($request->only('email','password'), [
        'email' => 'required',
        'password' => 'required',
    ]);
||||||| merged common ancestors
     $v = validator($request->only('email','password'), [
        'email' => 'required',
        'password' => 'required',
    ]);
=======
       	request()->validate([
       		'mail' => 'required',
       		'password' => 'required',
       	]);

       	$userdata = array($request->email,$request->password);

         // attempt to do the login
       	if (Auth::attempt($userdata)) {
       		$user = Auth::user();
       		$success['token'] =  $user->createToken('AccessToken')->accessToken;
       		return response()->json(['success' => $success], $this->successStatus);
       	}

       	else {
       		return ('LOGIN FAILED');
        }
>>>>>>> d322ab0378fdd7f7aea76843382e2b024b24f71e

<<<<<<< HEAD
    if ($v->fails()) {
        return response()->json($v->errors()->all(), 400);
||||||| merged common ancestors
     if ($v->fails()) {
        return response()->json($v->errors()->all(), 400);
=======
>>>>>>> d322ab0378fdd7f7aea76843382e2b024b24f71e
    }
     
     public function Logout(Request $request){

<<<<<<< HEAD
    $user = User::where("email",$request->email)->get()->first(); 

    if ($user== NULL) 
    { 
        return(" e-mail not registered");
||||||| merged common ancestors
        $user = User::where("email",$request->email)->get()->first(); 

          if ($user== NULL) 
    { 
        return(" e-mail not registered");
=======
        if (Auth::check()) {
            Auth::user()->AauthAcessToken()->delete();
            return Redirect::to('/home');
        }
>>>>>>> d322ab0378fdd7f7aea76843382e2b024b24f71e
    }

<<<<<<< HEAD
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


||||||| merged common ancestors
$response = $http->post('http://bootcamp.mv/oauth/token', [
    'form_params' => [
        'grant_type' => 'password',
        'client_id' => '1',
        'client_secret' => 'Xezd0i9SS9Vitl9d5vDnopsfLQkb1KQYCRNerJiq',
        'username' => $request['email'],
        'password' => $request['password'],
        'scope' => '*',
    ],
]);

    $token= json_decode((string) $response->getBody(), true); 


=======
		 public function TestEmail(Request $request){
			 $data = ['message' => 'This is a test!'];
     
    	 Mail::to('mykooll.ohaegbu@gmail.com')->send(new \App\Mail\TestEmail($data));
		 		}
>>>>>>> d322ab0378fdd7f7aea76843382e2b024b24f71e

<<<<<<< HEAD
    return array($token, $user);
                 // send the token back and test the token
                // I should give user information to FE user information first name , last name, id, and e-mail



}


      //I can receive the token from the FE and destroy it.
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

}
||||||| merged common ancestors
                return array($token, $user);
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
=======
}
>>>>>>> d322ab0378fdd7f7aea76843382e2b024b24f71e
