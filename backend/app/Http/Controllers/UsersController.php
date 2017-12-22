<?php

namespace App\Http\Controllers;

use App\Users;

class UsersController extends Controller
{
   public function __invoke()
    {
        return Users::all();
    }
}
