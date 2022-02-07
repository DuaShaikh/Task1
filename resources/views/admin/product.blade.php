<x-app-layout>
    <x-slot name="header">
        <div class="container">
            <div class="row">
                <div class="col-md-9 mt-2" >
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('All Products') }}
                    </h2>
                </div>
                <div class="col-md-3 d-flex flex-row-reverse">
                    <a href='product/add-product'><input type="submit"  class="btn btn-success" value="Add Products"></a>
                </div>
            </div>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="container">
                        <div class="row">
                              @if (Session::get('status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                  <strong>{{ session::get('status') }}</strong>
                                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                              @endif
                          </div>
                      </div>
                    <div class="container productCard" >
                        <table class="table table-striped ">
                            <thead>
                                    <tr>
                                        <th scope="col">Image</th>
                                        {{-- <th>Id</th> --}}
                                        <th scope="col">Name</th>
                                        {{-- <th>Description</th> --}}
                                        <th scope="col">Price</th>
                                        <th scope="col" colspan="3">Action</th>
                                    </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product )
                                    <tr>
                                        <td><img src="{{url($product->productMedia->url)}}" alt="" style="width: 200px;height:200px"></td>
                                        <td>{{$product->pName}}</td>
                                        <td>Rs.{{$product->productPrice}}</td>
                                        {{-- <td><a href="{{ URL::to('view-admin-product/' . $product->id) }}"><i class="fas fa-eye"></i> </a></td> --}}
                                        <td><a href="{{ URL::to('admin/dashboard/product/show-product/' . $product->id) }}"> <i class="fas fa-pencil-alt"></i></a></td>
                                        <td><a href="{{ URL::to('delete-product/' . $product->id) }}"> <i class="fas fa-trash"> </i> </a></td>   
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <span>{{$products->links("pagination::bootstrap-4")}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
