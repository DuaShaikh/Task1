@extends('layout.ecommerce')
@section('title','Home')
@section('main')
@if (Session::get('status'))
          <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
            <strong>{{ session::get('status') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
<x-sub-navbar/>
<x-navbar />
<x-slider />
<div class="container-lg" style="margin-top:100px">
    <div class="card">
        <div class="card-header">
            LATEST PRODUCTS
        </div>
       
        <div class="card-body">
            {{-- <div class="row"> --}}
                  
            <div class="product_item">
                @foreach($products as $product)
                <div class="col-lg-3 col-md-4 col-sm-6 mix sale" style="display: inline-block; margin-left:70px" data-bound="">
                    <div class="single_product">
                        <div class="product_image">
                            <img src="{{url($product->productMedia->url)}}" alt="" style="width: 200px;height:200px">
                            <div class="new_badge">New</div>
                            <div class="box-content">
                                {{-- <a href="#"><i class="fa fa-heart-o"></i></a> --}}
                                <a href="view-product/{{$product->id}}}"><i class="fas fa-eye"></i></a>
                                {{-- <a href="#"><i class="fa fa-search"></i></a> --}}
                            </div>										
                        </div>
                        <div class="product_btm_text">
                            <h4>{{$product->pName}}</h4>
                            <span class="price">Rs.{{$product->productPrice}}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
          
        </div>
     
    {{-- </div> --}}
</div>
</div>
</div>

@endsection