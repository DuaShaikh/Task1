<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        'message' => 'User Record get Successfully',
        'token' => $token
    ]);
   }

   public function userLogin(Request $request)
   {
    //    $user = Auth::attempt(['email' => $request->email, 'password' => $request->password]) ;

        $user = $this->userService->loginStore($request);
   
        dd($user);
        $token = $user->createToken('my-app-token')->plainTextToken;
        return response()->json([
            'status' => 200,
            'message' => 'User Record get Successfully',
            'token' => $token
        ]);
        
        // // dd($token);
        // $response = [
        //     'user' => $user,
        //     'token' => $token
        // ];
    
     
        //  return response($response, 201);
   }

}
