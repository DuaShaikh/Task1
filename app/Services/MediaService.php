<?php

/**
 * Media service Doc Comment
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

use Illuminate\Http\File;
use Illuminate\Http\Request;
use App\Models\common\Media;
use Illuminate\Support\Facades\Storage;

    /**
     * This is a Media service class
     * 
     * @category PHP
     * @package  Laravel
     * @author   Dua <dua@example.com>
     * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
     * @link     http://laravel.me/
     */
class MediaService
{
    /**
     * Create user media
     * 
     * @param Illuminate\Http\Request $request 
     * 
     * @return Media
     */
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

    /**
     * Create  product media
     * 
     * @param Illuminate\Http\Request $request 
     * 
     * @return Media
     */
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

    /**
     * Edit product media
     * 
     * @param Illuminate\Http\Request $req 
     * 
     * @return Media
     */
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

    /**
     * Create category media
     * 
     * @param Illuminate\Http\Request $req 
     * 
     * @return Media
     */
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
    /**
     * Edit category media
     * 
     * @param Illuminate\Http\Request $req 
     * 
     * @return Media
     */
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
