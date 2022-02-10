<?php

namespace App\Services;

use App\Models\user\Address;
use Illuminate\Http\Request;

class AddressService
{
    function userAddress($request)
    {
        return Address::create($request->all());
    }

    // function updateUserAddress($req)
    // {
    //     return Address::update($req->all());
    // }
}
