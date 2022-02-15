<?php

/**
 * Product Controller Doc Comment
 *
 * PHP version 8.1
 *
 * @category PHP
 * @package  Laravel
 * @author   Dua <dua@example.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://laravel.me/
 */

namespace App\Http\Controllers\shop;

use Illuminate\Http\Request;
use App\Services\StockService;
use App\Services\ProductService;
use App\Services\CategoryService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductRequest;
use App\Services\MediaService;

/**
 * This is ProductController extends controller
 *
 * @category PHP
 * @package  Laravel
 * @author   Dua <dua@example.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://laravel.me/
 */
class ProductController extends Controller
{
    protected $productService;
    protected $stockService;
    protected $categoryService;
    protected $mediaService;

    /**
     * Define construct function.
     *
     * @param object $productService  connecting to product service
     * @param object $stockService    connecting to stock service
     * @param object $categoryService connecting to category service
     * @param object $mediaService    connecting to media service
     */
    public function __construct(
        ProductService $productService,
        StockService $stockService,
        CategoryService $categoryService,
        MediaService $mediaService
    ) {
        $this->productService = $productService;
        $this->stockService = $stockService;
        $this->mediaService = $mediaService;
        $this->categoryService = $categoryService;
    }

    /**
     * This is a getProduct function which
     * get products from product table
     *
     * @return \Illuminate\View\View
     */
    public function getProduct()
    {
        $products = $this->productService->getProducts();
        return view('welcome', compact('products'));
    }

    /**
     * This is a getProductByid function which
     * get products by product id from product table,
     * and get available stock
     *
     * @param $id is product_id
     *
     * @return \Illuminate\View\View
     */
    public function getProductByid($id)
    {
        $products = $this->productService->getProductsbyId($id);
        $stocks = $this->stockService->getStockAvailable($products);
        return view('shop.view-product', compact('products', 'stocks'));
    }

    /**
     * This is a getAdminProducts function which
     * get products from product table
     *
     * @return \Illuminate\View\View
     */
    public function getAdminProducts()
    {
        $products = $this->productService->getProducts();
        return view('admin.product', compact('products'));
    }

    /**
     * This is a showAdminCategory function which
     * get categories from category table and
     * show categories into add product page
     *
     * @return \Illuminate\View\View
     */
    public function showAdminCategory()
    {
        $category = $this->categoryService->getCategories();
        return view('admin.add-products', compact('category'));
    }

    /**
     * This is a addAdminProducts function which
     * create media and pass media id to product table,
     * and create products into product table
     *
     * @param \App\Http\Requests\Admin\ProductRequest $req passing validation
     *
     * @return \Illuminate\View\View
     */
    public function addAdminProducts(ProductRequest $req)
    {
        $media = $this->mediaService->productMedia($req);
        $id = $media->id;

        $products = $this->productService->addProducts($req, $id);

        $product = $products->id;

        return view('admin.product-stock', compact('product'));
    }

    /**
     * This is a deleteAdminProducts function which
     * delete product by id from product table
     *
     * @param $id is product_id
     *
     * @return \Illuminate\View\View
     */
    public function deleteAdminProducts($id)
    {
        $products = $this->productService->deleteProducts($id);
        session()->flash('status', 'Product Deleted successfully!');
        return redirect('admin/dashboard/product');
    }

    /**
     * This is a showAdminProducts function which
     * get categories from category table and
     * get product detail by id from product table
     * and show details to product update form on
     * input fields
     *
     * @param $id is product id
     *
     * @return \Illuminate\View\View
     */
    public function showAdminProducts($id)
    { 
        $category = $this->categoryService->getCategories();
        $products = $this->productService->showProductsbyId($id);

        return view('admin.show-product-detail', compact('products', 'category'));
    }

    /**
     * This is a editAdminProducts function which
     * edit media and products by product id
     *
     * @param \App\Http\Requests\Admin\ProductRequest $req passing validation
     *
     * @return \Illuminate\View\View
     */
    public function editAdminProducts(ProductRequest $req)
    {
        $media = $this->mediaService->editProductMedia($req);
        $products = $this->productService->editProductsbyId($req);
        session()->flash('status', 'Product Updated successfully!');
        return redirect('admin/dashboard/product');
    }
}
