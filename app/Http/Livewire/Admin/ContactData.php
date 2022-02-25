<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User\Contact;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Mail;

class ContactData extends Component
{
    use WithPagination;

    public $feedbackReply;

    public $user_id;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.admin.contact-data', [
            'contacts' => Contact::with(['userData']) ->orderByDesc('id')->get()
        ]);
    }

    public function feedback($id)
    { 
        dd($this->feedbackReply);
        $contacts = Contact::where('user_id',$id)->with(['userData'])->first();

        $name = $contacts->userData->fullName;
        $email = $contacts->userData->email;

        $data = ['name' => $name, 'subject' => $contacts->subject, 'feedback' => $this->feedbackReply];
        $user['to'] = $email;
        return Mail::send(
            'user.feedback-mail',
            $data,
            function ($messages) use ($user) {
                $messages->to($user['to']);
                $messages->subject('Your Reply From ABC Shop');
            }
        );
        $this->reset();
        session()->flash('mail', 'Email Send Successfully');
    }
    
}
