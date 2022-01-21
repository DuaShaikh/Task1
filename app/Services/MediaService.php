<?php

namespace App\Services;
use App\Models\common\Media;
use Illuminate\Http\Request;

class MediaService
{

    function userMedia($request) 
    {
        $imageName = $request->file('photo')->getClientOriginalName();
        $type = $request->file('photo')->getClientOriginalExtension();
        $url = $request->file('photo')->storeAs('public/users/', $imageName);

        $request->merge([
            "imageType" => $type,
            "url" => $url
        ]);

        return Media::create($request->all());
    }

}
