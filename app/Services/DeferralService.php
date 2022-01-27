<?php

namespace App\Services;
use App\Models\Deferral;
use Illuminate\Http\Request;

class DeferralService
{    //
    function getDeferrals($req)
    { 
        $search = $req['searchBar'] ?? "";
        if($search != '') {
            return Deferral::where('name', 'LIKE', '%'. $search .'%')->orderByDesc('id')->paginate(5);
        } else {
            return Deferral::orderByDesc('id')->paginate(5);
        }   
    }
        
    function postDeferrals($request) 
    {
        return Deferral::create($request->all());
    }

    function deleteDeferrals($id) 
    {
        return Deferral::find($id)->delete();
    }

    function replicateDeferrals($id) 
    {
        return Deferral::find($id)->replicate()->save();
    }
    function showDeferrals($id) 
    {
         return Deferral::find($id);  
    }
    function updateDeferrals($id,$request)
    {
        return Deferral::find($id)->update($request->all())->save();
    }
}
