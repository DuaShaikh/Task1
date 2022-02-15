<?php

/**
 * Stock Controller Doc Comment
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
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StockRequest;

    /**
     * This is StockController extends controller
     *
     * @category PHP
     * @package  Laravel
     * @author   Dua <dua@example.com>
     * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
     * @link     http://laravel.me/
     */
class StockController extends Controller
{
    protected $stockService;
    protected $productService;


    /**
     * Define construct function.
     *
     * @param object $stockService   connecting to stock service
     * @param object $productService connecting to product service
     */
    public function __construct(
        StockService $stockService,
        ProductService $productService
    ) {
        $this->stockService = $stockService;
        $this->productService = $productService;
    }

    /**
     * This is a addStocks function which
     * get last inserted product id and add product stock
     *
     * @param \Illuminate\Http\Request $req get post req data
     *
     * @return \Illuminate\View\View
     */
    public function addStocks(Request $req)
    {
        $product = $this->productService->getLastProductId();
        $stock = $this->stockService->addProductStock($req);
        session()->flash('product', 'Product Stock Added successfully!');

        return view('admin.product-stock', compact('product'));
    }

    
}
