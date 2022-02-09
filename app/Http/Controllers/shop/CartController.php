<?php

namespace App\Http\Controllers\shop;

use Illuminate\Http\Request;
use App\Services\CartService;
use App\Services\UserService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CartRequest;


class CartController extends Controller
{
    protected $cartService;
    protected $userService;

    function __construct(CartService $cartService, UserService $userService) {
        $this->cartService = $cartService;
        $this->userService = $userService;
    }

    function addToCart(CartRequest $req) 
    {
        if(auth()->check()) {
        $carts = $this->cartService->postaddToCart($req);
        return redirect('/');
        } elseif (!auth()->check()) {
            $req->session()->flash('status', 'Please Login Your Account!');
            return redirect('/login');
        }
    }

    // static function cartItem()
    // {
    //     $carts = $this->cartService->countCartItems();
    //     return view('components.navbar', compact('carts'));
    // }

    function viewCart()
    {
        $carts = $this->cartService->viewCartItems();
        return view('shop.add-to-cart', compact('carts'));
    }

    function deleteCart($id)
    {
        $carts = $this->cartService->deleteCartItems($id);
        return redirect('view-cart');
    }

    function updateCart(Request $req)
    {

        $cart  = $this->cartService->updateCartItems($req);
        $users = $this->userService->getUserdetails();
        return view('shop.checkout', compact('users'));
        // return $this->getUpdateCart();
    }
     
    // function deleteCartUser()
    // {
    //     $carts = $this->cartService->deleteCartUser();
    //     return view('shop.order-detail', compact('carts'));
    // }
}
