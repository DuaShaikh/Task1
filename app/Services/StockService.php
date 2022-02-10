<?php

namespace App\Services;

use App\Models\shop\Stock;
use Illuminate\Http\Request;

class StockService
{
    function getStockAvailable($products)
    {
        for ($i = 0; $i < count($products); $i++) {
            return Stock::where('product_id', $products[$i]['id'])->get();
        }
    }

    // function updateStock($req,$carts)
    // {


    // }

    function addProductStock($req)
    {
        return Stock::create($req->all());
    }

    public function decreaseStockQuantity($req, $orders)
    {
        foreach ($orders as $order) {
            $stock  = Stock::where(
                [
                            'product_id' => $order['product_id'],
                            'size'       => $order['size']
                        ]
            )->first();

            $quantity = $stock['quantity'] - $order['quantity'];
            $stock->update(['quantity' => $quantity]);
        }
    }
}
