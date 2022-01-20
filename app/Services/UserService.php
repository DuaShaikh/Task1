<?php

namespace App\Services;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserService
{

    function registerUser($request) 
    {
        // return User::create($request->all());
        return User::create([
            'fullName' => $request['fullName'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'gender' =>$request['gender'],
            'phone'=> $request['phone'],
            'address_id'=> $request['address_id'],
            'media_id'=>$request['media_id']
        ]);
    }
    
    function updateUser($req)
    {
        $user = User::find($req["id"]);

        $user->update($req);

        return $user;
    }

   
}