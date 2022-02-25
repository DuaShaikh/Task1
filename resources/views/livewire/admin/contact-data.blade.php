<x-slot name="header">
    <div class="container">
        <div class="row">
            <div class="col-md-9 mt-2" >
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('User Feedback') }}
                </h2>
            </div>
        </div>
    </div>
</x-slot>
    {{-- <div class="container">
        <div class="row">
            @if (Session::get('mail'))
                    <div x-data="{ open: true }"
                    x-init="setTimeOut(() => {open = false}, 300ms)"
                    x-show="open" 
                    class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session::get('mail') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
            @endif
        </div>
    </div> --}}
    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="container py-3">
                        @foreach ($contacts as $contact )
                        <div class="card-body py-5 m-4" x-data="{open: false}" style="background-color: #efeff0">
                            <div class="row">
                                <div class="col-md-10">
                                    <h5 class="card-title">{{$contact->subject}}</h5>
                                    <p class="card-text"> By {{$contact->userData->fullName}}</p>
                                </div>
                                <div class="col-md-2 d-flex flex-row-reverse p-2">
                                    <a @click.prevent = "open = true" href="#" class="btn btn-primary">Show Message</a>
                                </div>
                            </div>
                            <div x-show="open" @click.outside="open = false">
                                {{$contact->comment}}
                            </div>
                            <div x-data="{reply: false}" class="col-md-4 mt-6">
                            <div>
                                <a @click.prevent = "reply = true" href="#">Reply</a>
                            </div>
                            <div x-show="reply" @click.outside="reply = false">
                                <form wire:submit.prevent='feedback({{ $contact->user_id }})'>
                                    <input type="hidden" wire:model='user_id' x-model="{{$contact->user_id}}">
                                    <textarea cols="30" rows="5" wire:model="feedbackReply" placeholder="Your Reply... "></textarea>
                                    <button type="submit" class="btn btn-primary">Send</button>
                                </form>
                            </div>
                        </div>
                        </div>
                        @endforeach
                    </div>
                    <span>{{ $contacts->links() }}</span>
                </div>
            </div>
        </div>
    </div> --}}

<div x-data="{ contacts:{{$contacts}}}">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="container py-3">
                        <template  x-for="contact in contacts" :key="contact.id"> 
                            <div class="card-body py-5 m-4" x-data="{open: false}" style="background-color: #efeff0">
                                <div class="row">
                                    <div class="col-md-10">
                                        <h5 class="card-title" x-text="contact.subject"></h5>
                                        <p class="card-text" x-text="contact.user_data.fullName"></p>
                                    </div>
                                    <div class="col-md-2 d-flex flex-row-reverse p-2">
                                        <a @click.prevent = "open = true" href="#" class="btn btn-primary">Show Message</a>
                                    </div>
                                </div>
                                <div x-show="open" @click.outside="open = false">
                                    <p x-text="contact.comment"></p>
                                </div>
                                <div x-data="{reply: false}" class="col-md-4 mt-6">
                                    <div>
                                        <a @click.prevent = "reply = true" href="#">Reply</a>
                                    </div>
                                    <div x-show="reply" @click.outside="reply = false">
                                        {{-- <form wire:submit.prevent="$wire.feedback(contact.user_id)"> --}}
                                            <textarea cols="30" rows="5" wire:model="feedbackReply" placeholder="Your Reply... "></textarea>
                                            <button  x-on:click ="$wire.feedback(contact.user_id)" class="btn btn-primary">Send</button>
                                        {{-- </form> --}}
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
