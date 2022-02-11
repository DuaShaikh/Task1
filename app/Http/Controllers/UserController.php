<?php

/**
 * User Controller Doc Comment
 * 
 * PHP version 8.1
 *
 * @category PHP
 * @package  Laravel
 * @author   Dua <dua@example.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://localhost/
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;
use App\Http\Requests\user\UserRequest;

    /**
     * This is UserController extends controller
     * 
     * @category PHP
     * @package  Laravel
     * @author   Dua <dua@example.com>
     * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
     * @link     http://laravel.me/
     */
class UserController extends Controller
{
    protected $userService;
    /**
     * Define construct function.
     * 
     * @param object $userService connecting to user service
     */
    function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * This is an postUser function
     * 
     * @param \App\Http\Requests\user\UserRequest $request passing user validation
     * 
     * @return \Illuminate\View\View
     */
    function postUser(UserRequest $request)
    {
        $users = $this->userService->registerUser($request);

        return view('shop.address', compact('users'));
    }

    /**
     * This is an userAddress function which save user address
     * 
     * @param \Illuminate\Http\Request $req get post req data
     * 
     * @return \Illuminate\View\View
     */
    function userAddress(Request $req)
    {
        $address = $this->userService->saveAddress($req);

        $users = $this
            ->userService
            ->updateUser(
                [
                    "id"         => $req->user_id,
                    "address_id" => $address->id
                ]
            );

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
