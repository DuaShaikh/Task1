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
    function getData(Request $req)
    {
        $users = $this->deferralService->getDeferrals($req);

        return view('table', compact('users'));
    }

    function postData(DeferralRequest $request)
    {
        $users = $this->deferralService->postDeferrals($request);
        session()->flash('status','Record Inserted successfully!');
        return $this->getData();
    }

    function delData($id, Request $req)
    {
        $users = $this->deferralService->deleteDeferrals($id);
        $req->session()->flash('status','Record Deleted successfully!');
        return $this->getData();
    }

    function copyData($id, Request $req)
    {
        $users = $this->deferralService->replicateDeferrals($id);
        $req->session()->flash('status','Record Replicated successfully!');
        return $this->getData();
    }

    function showData($id)
    {
        $users = $this->deferralService->showDeferrals($id);
        return view('update',['users'=>$users]);
    }
    function updateData($id, DeferralRequest $request)
    {
        $users = $this->deferralService->updateDeferrals($id, $request);
        return $this->getData();
    }

   
}
