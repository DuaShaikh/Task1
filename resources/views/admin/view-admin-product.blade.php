<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View Product') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="container">
                        <div class="row">
                            <div class="card mb-3" style="max-width: 740px;">
                                <div class="row g-0">
                                  <div class="col-md-4">
                                    <td><img src="{{url($products->productMedia->url)}}" alt="" style="width: 500px;height:300px"></td>
                                  </div>
                                  <div class="col-md-8">
                                    <div class="card-body">
                                      <h5 class="card-title">{{$products->pName}}</h5>
                                      <p class="card-text">{{$products->description}}</p>
                                      <p class="card-text">{{$products->productPrice}}</p>
                                      <p class="card-text"><small class="text-muted">Last updated {{$products->updated_at}}</small></p>
                                    </div>
                                  </div>
                                </div>
                              </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
