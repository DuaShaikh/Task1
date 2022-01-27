<?php

namespace App\Services;
use App\Models\shop\Product;
use Illuminate\Http\Request;

class ProductService
{

    function getProducts() 
    {
        $products = Product::with(['ProductMedia'])
            ->get();

        return $products;
    }

    function getProductsbyId($id)
    {
        $products = Product::where('id',$id)
                    ->with(['ProductMedia']);
        return $products->get();
    }

}

