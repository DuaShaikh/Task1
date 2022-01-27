<?php

namespace App\Services;
use App\Models\shop\Cart;
use Illuminate\Http\Request;

class cartService
{
    function postAddToCart($req) 
    {
        if(auth()->check()) {
            $req->merge([
                "user_id" => auth()->user()->id
            ]);

            return Cart::create($req->all());
        } else {
            return redirect('auth.login');
        }
    }
     
    function countCartItems() 
    {
        $userId = auth()->user()->id;
        return Cart::where('id', $userId)->count();
    }

    function viewCartItems()
    { 
        return auth()->user()->cart()?->with(['cartProduct.ProductMedia'])->get();
    }

    function deleteCartItems($id)
    {
        return Cart::where('id', $id)->delete();
    }

    function updateCartItems($req)
    {
        $data = $req->cart;
        data_set($data, "*.user_id", auth()->user()->id);
        auth()->user()->cart()->delete();
        return Cart::insert($data);
    }

    function getUpdateCarts()
    {
        return auth()->user()->cart()->with(['cartProduct.ProductMedia'])->get();
    }

    function deleteCartUser() 
    {
        return auth()->user()->cart()->delete();
    }
}
