<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Http\Requests\user\UserRequest;
use App\Services\OrderItemService;

class UserController extends Controller
{
    protected $userService;
    protected $oderItemService;

    function __construct(UserService $userService, OrderItemService $orderItemService) {
        $this->userService      = $userService;
        $this->orderItemService = $orderItemService;
        

    }
  
    function postUser(UserRequest $request)
    {
        $users = $this->userService->registerUser($request);
        return view('user.address', compact('users'));
    }

    // function loginUser(Request $request){
    //     $users = $this->userService->loginUsers($request);
    //     return view('shop.product', compact('users'));
       
    // }

    function updateDetail(Request $req) 
    {
        $users = $this->userService->updateUserdetails($req);
        return view('shop.checkout', compact('users'));
    }
    // function getUser()
    // {
    //     $users = $this->userService->getUserdetails();
    //     return view('shop.checkout', compact('users'));
    // }


    function getUserItems()
    {
        $users = $this->orderItemService->getUserOrders();
        return view('user.orders', compact('users'));
    }


}
