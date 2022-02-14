<?php

/**
 * Product service Doc Comment
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

use App\Models\shop\Product;
use Illuminate\Http\Request;

    /**
     * This is a Product service class
     *
     * @category PHP
     * @package  Laravel
     * @author   Dua <dua@example.com>
     * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
     * @link     http://laravel.me/
     */
class ProductService
{
    /**
     * Get all products
     *
     * @return product
     */
    public function getProducts()
    {
        $products = Product::with(['productMedia']) ->orderByDesc('id')->paginate(6);


        return $products;
    }

    /**
     * Get product data of last inserted id
     *
     * @return product
     */
    public function getLastProductId()
    {
        $products = Product::with(['productMedia'])->max('id');


        return $products;
    }

    /**
     * Get products by product id
     *
     * @param $id passing product id
     *
     * @return product
     */
    public function getProductsbyId($id)
    {
        $products = Product::where('id', $id)
                    ->with(['productMedia']);
        return $products->get();
    }

    /**
     * Add products into product table
     *
     * @param $req passing req data
     * @param $id  passing product id
     *
     * @return product
     */
    public function addProducts($req, $id)
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

    /**
     * Update product by product id
     *
     * @param $req passing req data
     *
     * @return product
     */
    public function updateProduct($req)
    {
        $product = Product::find($req["id"]);

        $product->update($req);

        return $product;
    }

    /**
     * Delete PRoduct by id
     *
     * @param $id passing product id
     *
     * @return product
     */
    public function deleteProducts($id)
    {
        $product = Product::find($id);
        $product->delete();
        return $product;
    }

    /**
     * Show product detail by product id
     *
     * @param $id passing product id
     *
     * @return product
     */
    public function showProductsbyId($id)
    {
        $product = Product::find($id);
        $product->with('category')->get();

        return $product;
    }

    /**
     * Edit Products by id
     *
     * @param $req passing req data
     *
     * @return product
     */
    public function editProductsbyId($req)
    {
        $product = Product::find($req->id);
        $product->update($req->all());


        $product->category()->where('product_id', $req->id)->sync($req->category_id);


        return $product;
    }
}
