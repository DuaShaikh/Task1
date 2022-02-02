<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Product') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="container" >
                        <form autocomplete="off" method="post" action="edit-product">
                            @csrf
                            <div class="row mb-3">
                                <input type="hidden" value="{{$products->id}}" name="id" >
                              <label for="inputName3" class="col-sm-2 col-form-label">Product Name</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control" name="pName" value="{{$products->pName}}">
                              </div>
                            </div>
                            <div class="row mb-3">
                              <label for="inputDescription3" class="col-sm-2 col-form-label">Description</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control" name="description" value="{{$products->description}}">
                              </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPrice3" class="col-sm-2 col-form-label">Price</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="productPrice" value="{{$products->productPrice}}">
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
