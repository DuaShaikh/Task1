<?php

namespace App\Http\Controllers\shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CartService;

class CartController extends Controller
{
    protected $cartService;

    function __construct(CartService $cartService) {
        $this->cartService = $cartService;
    }

    function addToCart(Request $req) 
    {
        $carts = $this->cartService->postaddToCart($req);
        // return view('', compact('carts'));
        return redirect('/');
    }

    function cartItem()
    {
        $carts = $this->cartService->cartItems();
        return view('components.navbar', compact('carts'));
    }
}
