
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Stock') }}
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
                        <form method="post" action="stocks">
                            @csrf
                            <div class="row">
                                <label for="inputPrice" class="col-sm-2 col-form-label mt-2">
                                    Product Id
                                </label>
                                <div class="col-sm-3 mt-2">
                                    <input type="text"
                                        class="form-control @error('quantity') is-invalid @enderror" 
                                        name="product_id" 
                                        value="{{$product}}" 
                                        required>
                                    @error('product_id')<span class="invalid-feedback" role="alert" style="color:red"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPrice" class="col-sm-2 col-form-label mt-2">
                                    Quantity
                                </label>
                                <div class="col-sm-3 mt-2">
                                    <input type="text" 
                                        class="form-control @error('quantity') is-invalid @enderror" 
                                        name="quantity" 
                                        value="{{ old('quantity') }}" 
                                        required>
                                    @error('quantity')<span class="invalid-feedback" role="alert" style="color:red"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>
                            <div class="row mb-3" >
                                <label for="inputPrice" class="col-sm-2 col-form-label mt-2">
                                    Size
                                </label>
                                <div class="col-sm-3  mt-2 mb-2">
                                    <select class="form-control form-control-sm @error('size') is-invalid @enderror" name="size" 
                                    required>
                                        <option selected value="">None</option>
                                        <option value="S">S</option>
                                        <option value="M">M</option>
                                        <option value="L">L</option>
                                    </select>
                                    @error('size')<span class="invalid-feedback" role="alert" style="color:red"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-6">
                                    <input type="submit" class="btn btn-primary" value="Add">
                                </div>
                                <div class="col-sm-6 d-flex flex-row-reverse">
                                    <a href="/admin/dashboard/product"><input type="button" class="btn btn-secondary" value="Go Back to All Products">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </x-app-layout>
