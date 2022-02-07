<x-app-layout>
    <x-slot name="header">
        <div class="container">
            <div class="row">
                <div class="col-md-9 mt-2">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('All Categories') }}
                    </h2>
                </div>
                <div class="col-md-3 d-flex flex-row-reverse">
                    <a href = "category/add-category"><input type="submit"  class="btn btn-success" value="Add Categories"></a>
                </div>
            </div>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="container productCard" >
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
                        <table class="table table-striped">
                            <thead>
                                    <tr>
                                        {{-- <th scope="col">Image</th> --}}
                                        <th scope="col">ID</th>
                                        <th scope="col">Category Name</th>
                                        <th scope="col">Parent Category Id</th>
                                        <th scope="col" colspan="2">Action</th>
                                    </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category )
                                    <tr>

                                        {{-- <td><img src="{{url($category->categoryMedia->url)}}" alt="" style="width: 200px;height:200px"></td> --}}
                                        <td>{{$category->id}}</td> 
                                        <td>{{$category->categoryName}}</td>
                                        @if ($category->parent_id)
                                        <td>{{$category->parent_id}}</td> 
                                        @else
                                        <td>No Parent Category</td>
                                        @endif 
                                        
                                        <td><a href="{{ URL::to('show-category/' . $category->id) }}"> <i class="fas fa-pencil-alt"></i></a></td>
                                        <td><a href="{{ URL::to('delete-category/' . $category->id) }}"> <i class="fas fa-trash"> </i> </a></td>   
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
