<x-app-layout>
    <x-slot name="header">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('All Products') }}
                    </h2>
                </div>
                <div class="col-md-3 my-7">
                    <a href='product/add-product'><input type="submit"  class="btn btn-success" value="Add Products"></a>
                </div>
            </div>
        </div>
    </x-slot>
    <div class="container mt-3 productCard" >
        <div class="card">
            <div class="card-body">
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
                                {{-- <td>{{$product->id}}</td> --}}
                                <td>{{$product->pName}}</td>
                                {{-- <td>{{$product->description}}</td> --}}
                                <td>{{$product->productPrice}}</td>  
                                <td><a href="{{ URL::to('view-admin-product/' . $product->id) }}"><i class="fas fa-eye"></i> </a></td>
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
</x-app-layout>
