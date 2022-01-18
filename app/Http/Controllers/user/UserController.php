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
        return view('shop.address', compact('users'));
    }

    function userAddress(Request $req) {
        $address = $this->userService->saveAddress($req);

        $users = $this->userService->updateUser(["id" => $req->user_id, "address_id" => $address->id]);

        return view('shop.media', compact('users'));
    }
}
