<?php

namespace App\Services;
use App\Models\shop\Product;
use Illuminate\Http\Request;

class ProductService
{

    function getProducts() 
    {
        $products = Product::with(['productMedia'])
            ->get();

        return $products;
    }

    function getProductsbyId($id)
    {
        $products = Product::where('id', $id)
                    ->with(['productMedia']);
        return $products->get();
    }

    function addProducts($req)
    {
        return Product::create($req->all());
    }

    function updateProduct($req)
    {
        $product = Product::find($req["id"]);

        $product->update($req);

        return $product;
    }

    function deleteProducts($id)
    {
        $product = Product::find($id);
        $product->delete();
        return $product;
    }

    function showProductsbyId($id)
    {
        return Product::find($id);
    }

    function editProductsbyId($req)
    {
        $product = Product::find($req->id);
        $product->update($req->all());
       
        return $product;
    }

}

