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

use App\Models\Shop\Stock;
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
    public function getStockAvailable($products)
    {
        for ($i = 0; $i < count($products); $i++) {
            return Stock::where('product_id', $products[$i]['id'])->get();
        }
    }

    /**
     * Add product stock by product id and size
     *
     * @param $req passing data
     *
     * @return Stock
     */
    public function addProductStock($req)
    {
        $data = Stock::where(
            [
                'product_id' => $req->product_id, 'size' => $req->size
            ]
        )->count();

        if (auth()->check() && $data > 0) {
            return redirect()
                ->back()
                ->with('product', 'Product Stock Already Exist');
        } elseif (auth()->check() && $data == 0) {
            return Stock::create($req->all())
                ->with('product', 'Product Stock Added Successfully');
        }
    }

    /**
     * Edit product stock by product id and size
     *
     * @param $req passing data
     *
     * @return Stock
     */
    public function editProductStock($req)
    {
        $data = $req->inStock;
        dd($data);
        // data_set($data, "*.user_id", auth()->user()->id);
        $stock = Stock::where(
                'product_id', $data->product_id,
                // 'size'       => $data->size

        );

        return $stock->update($data);
    }

    /**
     * Show product stock by product id
     *
     * @param int $id passing data
     *
     * @return Stock
     */
    public function showProductStockById($id)
    {
        return Stock::where('product_id', $id)->get();
    }

    /**
     * Decrease stock quantity on each item purchased
     *
     * @param $orders passing orders data
     *
     * @return Stock
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
