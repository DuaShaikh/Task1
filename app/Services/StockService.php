<?php

/**
 * Stock service Doc Comment
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

use App\Models\shop\Stock;
use Illuminate\Http\Request;

    /**
     * This is a Stock service class
     * 
     * @category PHP
     * @package  Laravel
     * @author   Dua <dua@example.com>
     * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
     * @link     http://laravel.me/
     */
class StockService
{
    /**
     * Get stock available by product id and size
     * 
     * @param $products passing product data
     * 
     * @return stock
     */
    function getStockAvailable($products)
    {
        for ($i = 0; $i < count($products); $i++) {
            return Stock::where('product_id', $products[$i]['id'])->get();
        }
    }

    /**
     * Add product stock by product id and size
     * 
     * @param Illuminate\Http\Request $req passing requested data
     * 
     * @return stock
     */
    function addProductStock($req)
    {
        return Stock::create($req->all());
    }
    
    /**
     * Decrease stock quantity on each item purchased
     * 
     * @param $orders passing orders data
     * 
     * @return stock
     */
    public function decreaseStockQuantity($orders)
    {
        foreach ($orders as $order) {
            $stock  = Stock::where(
                [
                            'product_id' => $order['product_id'],
                            'size'       => $order['size']
                        ]
            )->first();

            $quantity = $stock['quantity'] - $order['quantity'];
            return $stock->update(['quantity' => $quantity]);
        }
    }
}
