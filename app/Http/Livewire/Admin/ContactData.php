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
            'contacts' => Contact::with(['userData'])->orderByDesc('id')->get()
        ]);
    }

    protected $rules = [
        'feedbackReply' => 'min:5|max:255'
    ];
 
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function feedback($id,$contact_id)
    { 
        $contacts = Contact::where(['id'=>$contact_id, 'user_id'=>$id])->with(['userData'])->first();

        $name = $contacts->userData->fullName;
        $email = $contacts->userData->email;

        $data = ['name' => $name, 'subject' => $contacts->subject, 'feedback' => $this->feedbackReply];
        $user['to'] = $email;
        Mail::send(
            'user.feedback-mail',
            $data,
            function ($messages) use ($user) {
                $messages->to($user['to']);
                $messages->subject('Your Reply From ABC Shop');
            }
        );
        session()->flash('mail', 'Email Send Successfully');
        return redirect('admin/dashboard/feedback');
        $this->reset();
       
    }
    
}
