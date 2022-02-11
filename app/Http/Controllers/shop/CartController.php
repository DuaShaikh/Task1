<?php

/**
 * Cart Controller Doc Comment
 * 
 * PHP version 8.1
 *
 * @category PHP
 * @package  Laravel
 * @author   Dua <dua@example.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://laravel.me/
 */

namespace App\Http\Controllers\shop;

use Illuminate\Http\Request;
use App\Services\CartService;
use App\Services\UserService;
use App\Services\ProductService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CartRequest;

    /**
     * This is CartController extends controller
     * 
     * @category PHP
     * @package  Laravel
     * @author   Dua <dua@example.com>
     * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
     * @link     http://laravel.me/
     */
class CartController extends Controller
{
    protected $cartService;
    protected $userService;
    protected $productService;

    /**
     * Define construct function.
     * 
     * @param object $cartService    connecting to cart service
     * @param object $userService    connecting to user service
     * @param object $productService connecting to product service
     */
    function __construct(
        CartService $cartService,
        UserService $userService,
        ProductService $productService
    ) {
        $this->cartService = $cartService;
        $this->userService = $userService;
        $this->productService = $productService;
    }

    /**
     * This is a addToCart function which check 
     * authorized user is logged in and then add 
     * products into cart table
     * 
     * @param \App\Http\Requests\Admin\CartRequest $req passing cart validation
     * 
     * @return \Illuminate\View\View
     */
    function addToCart(CartRequest $req)
    {
        if (auth()->check()) {
            $carts = $this->cartService->postaddToCart($req);
            $id = $req->product_id;
            $products = $this->productService->getProductsbyId($id);
            return view('shop.view-product', compact('products'));
        } elseif (!auth()->check()) {
            $req->session()->flash('status', 'Please Login Your Account!');
            return redirect('/login');
        }
    }

    /**
     * This is a viewCart function which get cart items in add to cart view
     * 
     * @return \Illuminate\View\View
     */  
    function viewCart()
    {
        $carts = $this->cartService->viewCartItems();
        return view('shop.add-to-cart', compact('carts'));
    }

    /**
     * This is a deleteCart function which delete cart items
     * 
     * @param $id 
     * 
     * @return  \Illuminate\View\View
     */ 
    function deleteCart($id)
    {
        $carts = $this->cartService->deleteCartItems($id);
        return redirect('view-cart');
    }

    /**
     * This is a updateCart function which update cart items and get user details
     * 
     * @param \Illuminate\Http\Request $req get post req data
     * 
     * @return \Illuminate\View\View
     */ 
    function updateCart(Request $req)
    {

        $cart  = $this->cartService->updateCartItems($req);
        $users = $this->userService->getUserdetails();
        return view('shop.checkout', compact('users'));
        // return $this->getUpdateCart();
    }
}
