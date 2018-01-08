<?php

namespace App\Http\Controllers;

use App\Users;

class UsersController extends Controller
{

   /* public function __invoke()
    {
        return Users::all();
    }
    */

        public function index()
    {
        return Users::all();
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
        $user->update($request->all());
        return ('user updated');
    }

        public function destroy($id)

    {
        Users::find($id)->delete();
        return ('user deleted');
    }
  
}
