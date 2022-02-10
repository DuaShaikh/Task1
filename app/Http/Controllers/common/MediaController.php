<?php

namespace App\Http\Controllers\common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\common\MediaRequest;
use App\Services\MediaService;
use App\Services\ProductService;
use App\Services\UserService;

class MediaController extends Controller
{
    protected $mediaService;
    protected $userService;
    protected $productService;

    function __construct(MediaService $mediaService, UserService $userService, ProductService $productService)
    {
        $this->mediaService = $mediaService;
        $this->userService = $userService;
        $this->productService = $productService;
    }

    function uploadImage(MediaRequest $request)
    {
        $media = $this->mediaService->userMedia($request);
        $users = $this->userService->updateUser(["id" => $request->user_id, "media_id" => $media->id]);

        return view('user.login', compact('users'));
    }

    function postProductMedia(MediaRequest $request)
    {
        ddd($request);
        $media = $this->mediaService->productMedia($request);
        $product = $this->productService->updateProduct(["id" => $request->product_id, "media_id" => $media->id]);
        return redirect('admin/dashboard/product');
    }
}
