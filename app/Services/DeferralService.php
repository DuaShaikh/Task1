<?php

namespace App\Services;
use App\Models\Deferral;
use Illuminate\Http\Request;

class DeferralService
{    //
    function getDeferrals()
    { 
        // $search='';
        // if(isset($req['searchBar'])){
        //     $search = $req['searchBar'];
        // }
            return Deferral::orderByDesc('id')->paginate(4);
            // where('name','LIKE','%'.$search.'%')->orWhere('description','LIKE','%'.$search.'%')
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
        return Deferral::find($id)->replicate();
        
    }
    function showDeferrals($id) 
    {
         return Deferral::find($id);
         
    }
    function updateDeferrals($id,$request)
    {
        return Deferral::find($id)->update($request->all());
    }
  
}
