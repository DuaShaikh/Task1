<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Services\DeferralService;
// use App\Http\Requests\DeferralRequest;
use App\Services\UserService;
use App\Http\Requests\user\UserRequest;


class UserController extends Controller
{
    // protected $deferralService;
    // function __construct(DeferralService $deferralService) {
    //     $this->deferralService = $deferralService;
    // }

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


    





    

    // function getData(Request $req)
    // {
    //     $users = $this->deferralService->getDeferrals($req);

    //     return view('table', compact('users'));
    // }

    // function postData(DeferralRequest $request)
    // {
    //     $users = $this->deferralService->postDeferrals($request);
    //     session()->flash('status','Record Inserted successfully!');
    //     return $this->getData();
    // }

    // function delData($id, Request $req)
    // {
    //     $users = $this->deferralService->deleteDeferrals($id);
    //     $req->session()->flash('status','Record Deleted successfully!');
    //     return $this->getData();
    // }

    // function copyData($id, Request $req)
    // {
    //     $users = $this->deferralService->replicateDeferrals($id);
    //     $req->session()->flash('status','Record Replicated successfully!');
    //     return $this->getData();
    // }

    // function showData($id)
    // {
    //     $users = $this->deferralService->showDeferrals($id);
    //     return view('update',['users'=>$users]);
    // }
    // function updateData($id, DeferralRequest $request)
    // {
    //     $users = $this->deferralService->updateDeferrals($id, $request);
    //     return $this->getData();
    // }

   
}
