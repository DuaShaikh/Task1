<?php

namespace App\Http\Controllers\common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\common\MediaRequest;
use App\Services\MediaService;
use App\Services\UserService;

class MediaController extends Controller
{
    protected $mediaService;
    protected $userService;

    function __construct(MediaService $mediaService,UserService $userService) {
        $this->mediaService = $mediaService;
        $this->userService = $userService;
    }

    function uploadImage(MediaRequest $request)
    { 
        $media = $this->mediaService->userMedia($request);
        $users = $this->userService->updateUser(["id" => $request->user_id, "media_id" => $media->id]);

        return view('user.login', compact('users'));
    }
}
