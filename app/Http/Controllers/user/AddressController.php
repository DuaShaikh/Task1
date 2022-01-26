<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Services\CartService;
use App\Services\UserService;
use App\Services\OrderService;
use App\Services\AddressService;
use App\Http\Controllers\Controller;
use App\Http\Requests\user\UserRequest;
use App\Http\Requests\user\AddressRequest;

class AddressController extends Controller
{
    protected $addressService;
    protected $userService;
   

    function __construct(AddressService $addressService,UserService $userService ) {
        $this->addressService = $addressService;
        $this->userService = $userService;
       
    }

    function saveAddress(AddressRequest $request) 
    {   
        $address = $this->addressService->UserAddress($request);
        $users = $this->userService->updateUser(["id" => $request->user_id, "address_id" => $address->id]);
       
        return view('common.media', compact('users'));
    }

    // function updateAddress(Request $request)
    // {
    //     $address = $this->addressService->updateUserAddress($request);
    //     return view('shop.checkout', compact('address'));
        
       
    // }

}
