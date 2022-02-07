<?php

namespace App\Services;
use App\Models\User;
use App\Models\user\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserService
{

    function registerUser($request) 
    {
        // return User::create($request->all());
        return User::create(
            [
                'fullName' => $request['fullName'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'gender' =>$request['gender'],
                'phone'=> $request['phone'],
                'address_id'=> $request['address_id'],
                'media_id'=>$request['media_id']
            ]
        );
    }
    
    function updateUser($req)
    {
        $user = User::find($req["id"]);

        $user->update($req);

        return $user;
    }
    
    function getUserdetails()
    {
        $userID = auth()->user()->id;
        
        return User::where('id', $userID)->with('userAddress')->get();
    }
    
    function updateUserdetails($req)
    {
        $user = auth()->user();
        
        $address = Address::find($req->id);

        $address->update($req->all());
        
        $req->merge(
            [
                'address_id' => $req->id,
            ]
        );
    
        $user->update($req->all());

        return $user;
    }
}