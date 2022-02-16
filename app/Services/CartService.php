<?php

/**
 * Cart service Doc Comment
 *
 * PHP version 8.1
 *
 * @category PHP
 * @package  Laravel
 * @author   Dua <dua@example.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://laravel.me/
 */

namespace App\Services;

use App\Models\shop\Cart;
use App\Models\shop\Stock;
use Illuminate\Http\Request;

    /**
     * This is a Cart service class
     *
     * @category PHP
     * @package  Laravel
     * @author   Dua <dua@example.com>
     * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
     * @link     http://laravel.me/
     */
class CartService
{
    /**
     * Product added to cart if it is not already exist into cart
     * and if and only if product stock is available
     *
     * @param $req passing data
     *
     * @return Cart
     */
    public function postAddToCart($req)
    {
        $data = Cart::where(
            [
                'product_id' => $req->product_id, 'size' => $req->size
            ]
        )->count();
        if (auth()->check() && $data > 0) {
            return redirect()->back()->with('cart', 'Product Already Exist');
        } elseif (auth()->check()) {
            $req->merge(
                [
                    "user_id" => auth()->user()->id,
                ]
            );
            $stocks = Stock::where(
                [
                    'product_id' => $req->product_id, 'size' => $req->size
                ]
            )->first();
            if ($stocks->quantity < $req->quantity) {
                return redirect()->back()
                    ->with('cart', 'Required Quantity is not Available');
            } else {
                return Cart::create($req->all());
            }
        } else {
            return redirect('auth.login');
        }
    }

    /**
     * Authorized user can view their cart items
     *
     * @return Cart
     */
    public function viewCartItems()
    {
        return auth()->user()->cart()->with(['cartProduct.productMedia'])->get() ?? [];
    }
    /**
     * Authorized user can delete their cart items
     *
     * @param $id passing cart id
     *
     * @return Cart
     */
    public function deleteCartItems($id)
    {
        return Cart::where('id', $id)->delete();
    }

    /**
     * Authorized user can update their cart items
     *
     * @param $req passing data
     *
     * @return Cart
     */
    public function updateCartItems($req)
    {
        $data = $req->cart;
        data_set($data, "*.user_id", auth()->user()->id);
        auth()->user()->cart()->delete();
        return Cart::insert($data);
    }
    /**
     * Authorized user can get their updated cart items
     *
     * @return Cart
     */
    public function getUpdateCarts()
    {
        return auth()->user()->cart()->with(['cartProduct.productMedia'])->get();
    }

    /**
     * After order placed delete user cart
     *
     * @return Cart
     */
    public function deleteCartUser()
    {
        return auth()->user()->cart()->delete();
    }
}
