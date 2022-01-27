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
            'public/users/', $request->file('photo'), $imageName
        ); 
        $request->merge([
            "imageType" => $type,
            "url" => $url
        ]);

        return Media::create($request->all());
    }

}
