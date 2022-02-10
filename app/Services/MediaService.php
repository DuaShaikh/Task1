<?php

namespace App\Services;

use Illuminate\Http\File;
use Illuminate\Http\Request;
use App\Models\common\Media;
use Illuminate\Support\Facades\Storage;

class MediaService
{
    function userMedia($request)
    {
        $imageName = time() . '.' . $request->file('photo')->getClientOriginalName();
        $type = $request->file('photo')->getClientOriginalExtension();
        // $url = $request->file('photo')->storeAs('public/users/', $imageName);
        $url  = Storage::putFileAs(
            'public/users/',
            $request->file('photo'),
            $imageName
        );
        $request->merge(
            [
                "imageType" => $type,
                "url" => $url
            ]
        );

        return Media::create($request->all());
    }

    function productMedia($request)
    {
        $imageName = time() . '.' . $request->file('photo')->getClientOriginalName();
        $type = $request->file('photo')->getClientOriginalExtension();
        // $url = $request->file('photo')->storeAs('public/users/', $imageName);
        $url  = Storage::disk('public')->putFileAs(
            'product/',
            $request->file('photo'),
            $imageName
        );
        $request->merge(
            [
                "imageName" => $imageName,
                "imageType" => $type,
                "url" => $url
            ]
        );

        return Media::create($request->all());
    }

    function editProductMedia($req)
    {
        $imageName = time() . '.' . $req->file('photo')->getClientOriginalName();
        $type = $req->file('photo')->getClientOriginalExtension();
        $url  = Storage::disk('public')->putFileAs(
            'category/',
            $req->file('photo'),
            $imageName
        );
        $req->merge(
            [
                "imageName" => $imageName,
                "imageType" => $type,
                "url" => $url
            ]
        );
        $media = Media::find($req->media_id);
        $media->update($req->except('_token'));
    }

    function categoryMedia($req)
    {
        $imageName = time() . '.' . $req->file('photo')->getClientOriginalName();
        $type = $req->file('photo')->getClientOriginalExtension();
        $url  = Storage::disk('public')->putFileAs(
            'category/',
            $req->file('photo'),
            $imageName
        );
        $req->merge(
            [
                "imageName" => $imageName,
                "imageType" => $type,
                "url" => $url
            ]
        );

        return Media::create($req->all());
    }

    function editCategoryMedia($req)
    {
        $imageName = time() . '.' . $req->file('photo')->getClientOriginalName();
        $type = $req->file('photo')->getClientOriginalExtension();
        $url  = Storage::disk('public')->putFileAs(
            'category/',
            $req->file('photo'),
            $imageName
        );
        $req->merge(
            [
                "imageName" => $imageName,
                "imageType" => $type,
                "url" => $url
            ]
        );
        $media = Media::find($req->media_id);
        $media->update($req->all());
    }
}
