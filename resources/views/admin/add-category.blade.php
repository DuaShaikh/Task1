<x-app-layout>
  
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Categories') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="container categoryCard" >
                        <form autocomplete="off" method="post" action="add-category" enctype="multipart/form-data">
                            @csrf
                           @include('admin.category-form')
                          </form>
                    </div>
                </div>
            </div>
        </div>
    
</x-app-layout>
