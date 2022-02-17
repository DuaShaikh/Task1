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
use App\Models\Common\Media;
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
     * @param $request passing data
     *
     * @return Media
     */
    public function userMedia($request)
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
     * @param $request passing data
     *
     * @return Media
     */
    public function productMedia($request)
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
     * @param $req passing data
     *
     * @return Media
     */
    public function editProductMedia($req)
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

        return $media->update($req->except('_token'));
    }

    /**
     * Create category media
     *
     * @param $req passing data
     *
     * @return Media
     */
    public function categoryMedia($req)
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
     * @param $req passing data
     *
     * @return Media
     */
    public function editCategoryMedia($req)
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

        return $media->update($req->all());
    }
}
