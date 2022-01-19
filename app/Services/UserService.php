<?php

namespace App\Services;
use App\Models\user\User;
use Illuminate\Http\Request;

class UserService
{

    function registerUser($request) 
    {
        return User::create($request->all());
    }
    
    function updateUser($req)
    {
        $user = User::find($req["id"]);

        $user->update($req);

        return $user;
    }
}