<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User\Contact;
use Livewire\WithPagination;

class ContactData extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    
    public function render()
    {
        return view('livewire.admin.contact-data', [
            'contacts' => Contact::with(['userData']) ->orderByDesc('id')->paginate(4)
        ]);
    }
}
