<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\DeferralService;
use App\Http\Requests\DeferralRequest;

class UserController extends Controller
{
    protected $deferralService;

    function __construct(DeferralService $deferralService) {
        $this->deferralService = $deferralService;
    }

    //
    function getData()
    {
        $users = $this->deferralService->getDeferrals();

        return view('table', compact('users'));
    }

    function postData(DeferralRequest $request)
    {
        $users = $this->deferralService->postDeferrals($request);

        return $this->getData();
    }

    function delData($id)
    {
        $users = $this->deferralService->deleteDeferrals($id);
        return $this->getData();
        
    }
}
