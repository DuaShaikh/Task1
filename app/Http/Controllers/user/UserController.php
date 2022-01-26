<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Http\Requests\user\UserRequest;


class UserController extends Controller
{
    protected $userService;

    function __construct(UserService $userService) {
        $this->userService = $userService;
        

    }
  
    function postUser(UserRequest $request)
    {
        $users = $this->userService->registerUser($request);
        return view('user.address', compact('users'));
    }

    function loginUser(Request $request){
        $users = $this->userService->loginUsers($request);
        return view('shop.product', compact('users'));
       
    }

    function updateDetail() 
    {
        $users = $this->userService->updateUser();
        return view('shop.checkout', compact('users'));
    }
    // function getUser()
    // {
    //     $users = $this->userService->getUserdetails();
    //     return view('shop.checkout', compact('users'));
    // }

}
