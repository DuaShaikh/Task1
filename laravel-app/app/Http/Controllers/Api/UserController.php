<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\UserService;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
   public function __construct(UserService $userService) 
   {
       $this->userService = $userService;
   }

   public function getUserRecord()
   {
       $users = $this->userService->getUsers();
       return response()->json([
           'status' => 200,
           'message' => 'User Record get Successfully',
           'users' => $users
       ]);
   }

   public function createUser(Request $req)
   {
    $users = $this->userService->postUsers($req);

    $token = $users->createToken('Laravel8PassportAuth')->accessToken;
  
    return response()->json([
        'status' => 200,
        'message' => 'User Register Successfully',
        'token' => $token
    ]);
   }

   public function userLogin(Request $request)
   {
        $user = $this->userService->loginStore($request);
   
        $token = $user->createToken('Laravel8PassportAuth')->plainTextToken;
        return response()->json([
            'status' => 200,
            'message' => 'User Login Successfully',
            'user' => $user,
            'token' => $token
        ]);
   }

   public function user($id) 
   {
       $user = $this->userService->getUserbyId($id);
       return response()->json([
        'status' => 200,
        'message' => 'User Get Successfully',
        'user' => $user,
    ]);
   }

   public function allUsersExcept1($id) 
   {
       $user = $this->userService->getAllUsersExceptCurrent($id);
       return response()->json([
        'status' => 200,
        'message' => 'Users Get Successfully',
        'user' => $user,
    ]);
   }


} 
