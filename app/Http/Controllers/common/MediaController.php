<?php

/**
 * Media Controller Doc Comment
 * 
 * PHP version 8.1
 *
 * @category PHP
 * @package  Laravel
 * @author   Dua <dua@example.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://laravel.me/
 */

namespace App\Http\Controllers\common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\common\MediaRequest;
use App\Services\MediaService;
use App\Services\ProductService;
use App\Services\UserService;

    /**
     * This is an MediaController extends controller
     * 
     * @category PHP
     * @package  Laravel
     * @author   Dua <dua@example.com>
     * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
     * @link     http://laravel.me/
     */
class MediaController extends Controller
{
    protected $mediaService;
    protected $userService;
    protected $productService;

    /**
     * Define construct function.
     * 
     * @param object $mediaService   connecting to media service
     * @param object $userService    connecting to user service
     * @param object $productService connecting to product service
     */
    function __construct(
        MediaService $mediaService,
        UserService $userService,
        ProductService $productService
    ) {
        $this->mediaService = $mediaService;
        $this->userService = $userService;
        $this->productService = $productService;
    }
    /**
     * This is a uploadImage function which upload 
     * user image into media table and pass user media id into user table
     * 
     * @param \App\Http\Requests\common\MediaRequest $request passing validation
     * 
     * @return \Illuminate\View\View
     */
    function uploadImage(MediaRequest $request)
    {
        $media = $this->mediaService->userMedia($request);
        $users = $this->userService
            ->updateUser(["id" => $request->user_id, "media_id" => $media->id]);

        return view('user.login', compact('users'));
    }

    /**
     * This is a postProductMedia function which create 
     * product media and update product table
     * 
     * @param \App\Http\Requests\common\MediaRequest $request passing validation
     * 
     * @return \Illuminate\View\View
     */
    function postProductMedia(MediaRequest $request)
    {
        $media = $this->mediaService->productMedia($request);
        $product = $this->productService
            ->updateProduct(
                [
                    "id" => $request->product_id, "media_id" => $media->id
                ]
            );
        return redirect('admin/dashboard/product');
    }
}
