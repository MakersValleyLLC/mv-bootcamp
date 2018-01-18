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

        $input = ([
            'role' => "maker",
            'first_name' => null,
            'last_name' => null,
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        $user = Users::create($input);

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

    public function login(Request $request){      
      //validate the request
        request()->validate([
           'email' => 'required',
           'password' => 'required',
       ]);

        $user = Users::find($request->email);

        $request->request->add([
            'grant_type'    => 'password',
            'client_id'     =>  0,
            'client_secret' => null,
            'username'      => $request->email,
            'password'      => $request->password,
            'scope'         => null,
        ]);

                $proxy = Request::create(
            'oauth/token',
            'POST'
        );

                return $proxy;



   }

   protected function guard()
{
    return Auth::guard('api');
}

     public function logout(Request $request){      
$request->user()->token()->revoke();

        $this->guard()->logout();

        $request->session()->flush();

        $request->session()->regenerate();

        $json = [
            'success' => true,
            'code' => 200,
            'message' => 'You are Logged out.',
        ];
        return $json;
     }
     
     



  
}
