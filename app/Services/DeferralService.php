<?php

namespace App\Services;
use App\Models\Deferral;
use Illuminate\Http\Request;

class DeferralService
{    //
    function getDeferrals(){
        return Deferral::orderByDesc('id')->get();
    }
    
    function postDeferrals($request){
        return Deferral::create($request->all());
    }
}
