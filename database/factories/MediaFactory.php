<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\common\Media;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class MediaFactory extends Factory
{
    protected $model = Media::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = 'shirt.jpg';
        $file = UploadedFile::fake()->image($name);
        $url  = Storage::disk('public')->put(
            'product',
            $file
        );      

        return [
            'url'       => $url,
            'imageName' => $name,
            'imageType' => 'jpg',

        ];
    }
}
