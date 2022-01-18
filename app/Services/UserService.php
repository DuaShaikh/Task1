<?php

namespace App\Services;
use App\Models\User;
use Illuminate\Http\Request;

class UserService
{

    function registerUser($request) 
    {
        return User::create($request->all());
    }
}