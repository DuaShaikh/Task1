<?php

namespace App\Services;
use App\Models\shop\Stock;
use Illuminate\Http\Request;

class StockService
{

    function getStockAvailable($products)
    {
        return Stock::where('product_id',$products[0]['id'])->get();
    }

    function updateStock($orders) 
    { 
        for ($i=0; $i<count($orders); $i++) {
        $stocks  = Stock::where(['product_id'=>$orders[$i]['product_id'], 'size'=>$orders[$i]['size']])->get();
        $update = $stocks[$i]['quantity'] - $orders[$i]['quantity'];
        ddd($update);
        
        // $req->merge(
        //     [
        //         "quantity" => $update
        //     ]
        // );
        //  return $stocks->update(['quantity'=>$update]);
        }
     
    }
}

