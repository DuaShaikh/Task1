<?php

namespace App\Services;
use App\Models\shop\Stock;
use Illuminate\Http\Request;

class StockService
{

    function getStockAvailable($products)
    {
        for ($i=0; $i < count($products); $i++) {
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

    function decreaseStockQuantity($req, $carts)
    {
        for ($i=0; $i < count($carts); $i++) {
            ddd($i);
            $stocks  = Stock::where(
                [
                    'product_id'=>$carts[$i]['product_id'], 
                    'size'=>$carts[$i]['size']
                ]
            )->get()->toArray();

            ddd($stocks);
            // $quantity = $stocks[$i]['quantity'] - $carts[$i]['quantity'];
            // ddd($quantity);


            // $req->merge([
            //     'quantity' => $quantity,
            // ]);
            // ddd($req->quantity);
            // // ddd($stocks);
            // return $stocks->update($req->quantity);
        }
    }
}

