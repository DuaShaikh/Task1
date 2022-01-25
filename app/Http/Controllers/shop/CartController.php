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
        $req->session()->flash('status','Login Your Account!');
        return redirect('/');
    }

    static function cartItem()
    {
        $carts = $this->cartService->countCartItems();
        return view('components.navbar', compact('carts'));
    }

    function viewCart()
    {
        $carts = $this->cartService->viewCartItems();
        return view('shop.add-to-cart', compact('carts'));
    }

    function deleteCart($id)
    {
        $carts = $this->cartService->deleteCartItems($id);
        return view('shop.add-to-cart', compact('carts'));
    }

    function updateCart(Request $req)
    {
        $cart = $this->cartService->updateCartItems($req);
        return $this->getUpdateCart();
    }

    function getUpdateCart()
    {
        $carts = $this->cartService->getUpdateCarts();
        return view('shop.checkout', compact('carts'));
    }
}
