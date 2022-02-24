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
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="container py-3">
                        @foreach ($contacts as $contact )
                        <div class="card-body py-5 m-4" x-data="{open: false}" style="background-color: #d7d9db">
                            <div class="row">
                                <div class="col-md-10">
                                    <h5 class="card-title">{{$contact->subject}}</h5>
                                    <p class="card-text"> By {{$contact->userData->fullName}}</p>
                                </div>
                                <div class="col-md-2 d-flex flex-row-reverse">
                                    <a @click.prevent = "open = true" href="#" class="btn btn-primary p-2">+</a>
                                </div>
                            </div>
                            <div x-show="open" @click.outside="open = false">
                                {{$contact->comment}}
                            </div>
                        </div>
                        @endforeach
                    </div>
                   
                    <span>{{ $contacts->links() }}</span>
                </div>
            </div>
        </div>
    </div>

{{-- <div x-data="{ contacts : @entangle('contacts') }">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="container">
                        <div class="card-body">
                            <template  x-for="contact in contacts" :key="id"> 
                                <h5 class="card-title" x-text="subject"></h5>
                                <p class="card-text" ></p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </template>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
