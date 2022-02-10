<?php

namespace App\Services;

use App\Models\shop\Cart;
use App\Models\shop\Stock;
use Illuminate\Http\Request;

class CartService
{
    function postAddToCart($req)
    {
        $result = $req->all();
        $data = Cart::where(['product_id' => $req->product_id, 'size' => $req->size])->count();
        if (auth()->check() && $data > 0) {
            return redirect()->back()->with('cart', 'Product Already Exist');
        } elseif (auth()->check()) {
            $req->merge(
                [
                "user_id" => auth()->user()->id,
                // "stock_id"=> $stocks->id
                ]
            );
            $stocks = Stock::where(['product_id' => $req->product_id, 'size' => $req->size])->first();
            if ($stocks->quantity < $req->quantity) {
                return redirect()->back()->with('cart', 'Required Quantity is not Available');
            } else {
                return Cart::create($req->all());
            }
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
        return auth()?->user()?->cart()?->with(['cartProduct.productMedia'])->get();
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
        return auth()->user()->cart()->with(['cartProduct.productMedia'])->get();
    }

    function deleteCartUser()
    {
        return auth()->user()->cart()->delete();
    }
}
