<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Products') }}
        </h2>
    </x-slot>
    {{-- @dd($category); --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="container" >
                        @if($products->exists)
                              <form class="flex flex-col w-full" method="POST" action="edit-product" >
                             
                        @else
                           <form autocomplete="off" method="post" action="add-product" enctype="multipart/form-data">
                        @endif
                            {{-- <form autocomplete="off" method="post" action="add-product" enctype="multipart/form-data"> --}}
                            @csrf
                            <div class="row mb-3">
                              <label for="inputName" class="col-sm-2 col-form-label">Product Name</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control @error('pName') is-invalid @enderror" name="pName" value="{{old('pName')}}" />
                                @error('pName')<span class="invalid-feedback" role="alert" style="color:red"><strong>{{ $message }}</strong></span>@enderror
                              </div>
                            </div>
                            <div class="row mb-3">
                              <label for="inputDescription" class="col-sm-2 col-form-label">Description</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{old('description')}}">
                                @error('description')<span class="invalid-feedback" role="alert" style="color:red"><strong>{{ $message }}</strong></span>@enderror
                              </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPrice" class="col-sm-2 col-form-label">Price</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control @error('productPrice') is-invalid @enderror" name="productPrice" value="{{old('productPrice')}}">
                                  @error('productPrice')<span class="invalid-feedback" role="alert" style="color:red"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                              <label for="inputPrice" class="col-sm-2 col-form-label">Category Name</label>
                              <div class="col-sm-10">
                              <select id="inputCategory" class="form-select" name = "category_id" required>
                                <option selected>Choose...</option>
                                @foreach ($category as $cat )
                                <option value={{$cat->id}} >{{$cat->categoryName}}</option>
                                @endforeach
                              </select> 
                            </div>
                          </div>
                          <div class="row mb-3">
                            <label for="inputPrice3" class="col-sm-2 col-form-label">Upload Image</label>
                            <div class="col-sm-10">
                              <input type="file" class="form-control @error('photo') is-invalid @enderror" name="photo">
                              @error('photo')<span class="invalid-feedback" role="alert" style="color:red"><strong>{{ $message }}</strong></span>@enderror
                            </div>
                          </div>

                            <button type="submit" class="btn btn-primary">Save</button>
                      </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
