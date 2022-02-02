<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Show Categories') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="container" >
                        <form autocomplete="off" method="post" action="edit-category">
                            @csrf
                            <div class="row mb-3">
                                <input type="hidden" name="id" value={{$category->id}}>
                              <label for="inputName3" class="col-sm-2 col-form-label">Category Name</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control" name="categoryName" value="{{$category->categoryName}}">
                              </div>
                            </div>
                            {{-- <div class="row mb-3">
                                <label for="inputPrice3" class="col-sm-2 col-form-label">Price</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="productPrice" >
                                </div>
                            </div> --}}
                                <button type="submit" class="btn btn-primary">Save</button>
                          </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
