<?php

namespace App\Services;
use App\Models\user\Address;
use Illuminate\Http\Request;

class AddressService
{

    function UserAddress($request) 
    {
        return Address::create($request->all());
    }
    
}