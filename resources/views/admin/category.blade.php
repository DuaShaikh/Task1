<x-app-layout>
    <x-slot name="header">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('All Categories') }}
                    </h2>
                </div>
                <div class="col-md-3 my-7">
                    <a href='category/add-category'><input type="submit"  class="btn btn-success" value="Add Categories"></a>
                </div>
            </div>
        </div>
    </x-slot>
    <div class="container mt-5 productCard" >
        <div class="card">
            <div class="card-body">
                <table class="table table-striped ">
                    <thead>
                            <tr>
                                {{-- <th scope="col">Image</th> --}}
                                <th scope="col">Category Name</th>
                                <th scope="col" colspan="2">Action</th>
                            </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category )
                            <tr>

                                {{-- <td><img src="{{url($category->categoryMedia->url)}}" alt="" style="width: 200px;height:200px"></td> --}}
                                <td>{{$category->categoryName}}</td> 
                                <td><a href="{{ URL::to('show-category/' . $category->id) }}"> <i class="fas fa-pencil-alt"></i></a></td>
                                <td><a href="{{ URL::to('delete-category/' . $category->id) }}"> <i class="fas fa-trash"> </i> </a></td>   
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
