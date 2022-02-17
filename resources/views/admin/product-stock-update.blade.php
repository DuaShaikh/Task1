<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update Product Stock') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="container">
                        <div class="row">
                              @if (Session::get('product'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                  <strong>{{ session::get('product') }}</strong>
                                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                              @endif
                          </div>
                      </div>
                    <div class="container">
                        <form method="post" action="stock-update">
                            @csrf
                            @include('admin.product-stock-form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>