<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;
use App\Models\User\Contact;
use Illuminate\Support\Facades\Mail;

class ContactUs extends Component
{
    public $users;

    public $subject, $comment;

    public function mount()
    {  
        if(auth()->check()) {
            $id = auth()->user()->id;
            return $this->users = User::find($id);
        }
    }

    public function render()
    {
        return view('livewire.user.contact-us');
    }

    public function contact()
    {
        $this->validate([
            'subject' => 'required',
            'comment' => 'required|min:10|max:100',
        ]);
        if(auth()->check()) {
            $contacts = Contact::create(
                [
                    'user_id' => $this->users->id,
                    'subject' => $this->subject,
                    'comment' => $this->comment
                ]
            );
    } else {
        session()->flash('status', 'Login Your Account!! ');
        return redirect(route('login'));
    }
    // Mail::to('admin123@gmail.com')->send($contacts);
    $this->reset();
    session()->flash('contact', 'Your Response Send Successfully');
     
    }
}
