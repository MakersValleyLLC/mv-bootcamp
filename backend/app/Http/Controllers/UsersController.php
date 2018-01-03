<?php

namespace App\Http\Controllers;

use App\Users;

class UsersController extends Controller
{

    public function __invoke()
    {
        return Users::all();
    }

        public function index()
    {
        return Users::all();
    }


    // Read and show the information of an User
        public function show($id)
    {
        $user= Users::find($id);
        return $user;
    }


    public function update(Request $request, $id)

    {
             $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
                                         ]);
            Users::find($id)->update($request->all());
    }

        public function destroy($id)

    {

        Users::find($id)->delete();

    }
  
}
