<?php

namespace App\Http\Controllers;

use App\Users;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
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
     $v = validator($request->only('email', 'password'), [
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

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



    // Read and show the information of an User
        public function show($id)
    {
      // get the user
        $user = Users::find($id);
        if ($user== NULL)
        {
            $user="not found";
        }

     // show the view and pass the user to it
        return $user;
    }


public function edit($id)
    {
        // et the id of the user to update
        $user = Users::find($id);

        // show the edit form and pass the nerd
        return View::make('users.edit')
            ->with('users', $user);
    }


    public function update(Request $request, $id)

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

        public function destroy($id)

    {
        Users::find($id)->delete();
        return ('user deleted');
    }

       public function Login(Request $request){
      //validate the request
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

     public function Logout(Request $request){

     	if (Auth::check()) {
     		Auth::user()->AauthAcessToken()->delete();
     		return Redirect::to('/home');
    }
     }

		 // public function TestEmail(Request $request){
			//  $data = ['message' => 'This is a test!'];
     //
    	//  Mail::to('mykooll.ohaegbu@gmail.com')->send(new \App\Mail\TestEmail($data));
		 // 		}

}
