<?php

namespace App\Services;
use App\Models\common\Media;
use App\Models\shop\Product;
use Illuminate\Http\Request;
use App\Models\shop\ProductCategory;
use Illuminate\Support\Facades\Storage;

class ProductService
{

    function getProducts() 
    {
        $products = Product::with(['productMedia']) ->orderByDesc('id')->paginate(6);
          

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
               'media_id' =>$id,
            ]
        );  
        $product = Product::create($req->all());
         


        // $product->category()->create([
        //     'product_id'  => $product['id'],
        //         'category_id' => $req['category_id']
        // ]);
          $req->merge(
            [
               
                'product_id'  => $product->id,
                'category_id' => $req->category_id
            ]
        );  
     
        $productCategory = ProductCategory::create($req->all());
       
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

        
        $req->merge(
            [
                'category_id' => $req->category_id
            ] 
        );
       
        $category = ProductCategory::where('product_id', $req->id);
        $category->update(
            [
                'product_id' => $req->id,'category_id' => $req->category_id
            ]
        );

        return $product;
    }

}

