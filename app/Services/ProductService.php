<?php

namespace App\Services;


use App\Models\shop\Product;
use Illuminate\Http\Request;

class ProductService
{
    function getProducts()
    {
        $products = Product::with(['productMedia']) ->orderByDesc('id')->paginate(6);


        return $products;
    }

    function getLastProductId()
    {
        $products = Product::with(['productMedia'])->max('id');


        return $products;
    }

    function getProductsbyId($id)
    {
        $products = Product::where('id', $id)
                    ->with(['productMedia']);
        return $products->get();
    }

    function addProducts($req, $id)
    {
        $req->merge(
            [
               'media_id' => $id,
            ]
        );
        $product = Product::create($req->all());
        $product->category()->sync($req->category_id);

        return $product;
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
        $product = Product::find($id);
        $product->with('category')->get();

        return $product;
    }

    function editProductsbyId($req)
    {
        $product = Product::find($req->id);
        $product->update($req->all());


        $product->category()->where('product_id', $req->id)->sync($req->category_id);


        return $product;
    }
}
