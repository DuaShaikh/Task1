<?php

namespace App\Services;
use App\Models\shop\Cart;
use Illuminate\Http\Request;

class cartService
{
    function postAddToCart($req) 
    {
        if(auth()->check()) {
            ddd($req->all());
            die();
            $req->merge([
                "user_id" => auth()->user()->id
            ]);

            return Cart::create($req->all());
        } else {
            return redirect('auth.login');
        }
    }
     
    function cartItems() 
    {
        $userId = auth()->user()->id;
        return Cart::where('id',$userId)->count();
    }

}