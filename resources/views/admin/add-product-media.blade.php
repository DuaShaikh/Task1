<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Add Product Media') }}
      </h2>
  </x-slot>
  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 bg-white border-b border-gray-200">
                  <div class="container" >
                      <form autocomplete="off" method="post" action="add-product-media" enctype="multipart/form-data">
                          @csrf
                          <div class="row mb-3">
                              <input type="hidden" value="{{$products->id}}" name="product_id">
                            <label for="inputName3" class="col-sm-2 col-form-label">Image Name</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" name="imageName">
                            </div>
                          </div>
                          <div class="row mb-3">
                              <label for="inputPrice3" class="col-sm-2 col-form-label">Upload Image</label>
                              <div class="col-sm-10">
                                <input type="file" class="form-control" name="photo" required>
                                <span style="color:red;">@error('photo'){{$message}}@enderror</span>
                              </div>
                            </div>
                        
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>
