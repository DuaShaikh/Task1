<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Common\Media;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class MediaForm extends Component
{
    use WithFileUploads;

    public $photo, $imageName;
    public $users;

    public function render()
    {
        return view('livewire.media-form');
    }
    
    public function media()
    {
        $this->validate(
            [
                'photo'     =>  'required|image|mimes:jpeg,png,jpg|max:2048',
                'imageName' => 'required',
            ]
        );

        $imageName = time() . '.' . $this->photo->getClientOriginalName();
        $type = $this->photo->getClientOriginalExtension();
        $url  = Storage::putFileAs(
            'public/users/',
            $this->photo,
            $imageName
        );

        $this->imageType = $type;
        $this->url = $url;

        $media = Media::create(
            [
                'imageName' => $this->imageName,
                'url'     => $this->url,
                'imageType' => $this->imageType
            ]
        );

        $id = User::max('id');
        $user = User::find($id);
        $user->update(["media_id" => $media->id]);
    
        return redirect('/login');
    }
}
