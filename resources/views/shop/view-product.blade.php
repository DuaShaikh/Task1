@extends('layout.ecommerce')
@section('title','View Product')
@section('main')
<div class="page-container">
  
    <div class="container">
        <div class="row mt-3">
            @if (Session::get('cart'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>{{ session::get('cart') }}</strong>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>
        @foreach($products as $product)
            <form action="add-to-cart" method="post">
                @csrf
                <input type="hidden" name="product_id" value="{{$product->id}}">
                <div class="card mb-3 mt-5 " >
                    <div class="card-header">Product</div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4 mt-4" >
                                    <img src="{{url($product->productMedia->url)}}" alt="" style="width: 300px;height:300px">
                                </div>
                                <div class="col-md-8 mt-4">
                                    <h5 class="productTitle">{{$product->pName}}</h5><hr>
                                    <p>{{$product->description}}</p><hr>
                                    <h3 class="cost"> Rs.{{$product->productPrice}}</h3>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 col-xs-12 mt-2 quantity" >
                                                <input type="number" class="form-control @error('quantity') is-invalid @enderror" name="quantity" 
                                                minlength="1" maxlength="10" min='1'  placeholder="Quantity" style="height: 60px">
                                                @error('quantity')<span class="invalid-feedback" role="alert" style="color:red"><strong>{{ $message }}</strong></span>@enderror
                                            </div><br>
                                    
                                                <div class="col-md-6 col-sm-6 col-xs-12 mt-2" >
                                                    <div class="form-floating" name="size"  >
                                                        <select class="form-control @error('size') is-invalid @enderror" id="floatingSelectGrid" name="size" aria-label="Floating label select example" style="height: 60px">
                                                            <option selected value="">None</option>
                                                            <option value="S">S</option>
                                                            <option value="M">M</option>
                                                            <option value="L">L</option>
                                                        </select>
                                                        <label for="floatingSelectGrid" name="size">Size</label>
                                                        @error('size')<span class="invalid-feedback" role="alert" style="color:red"><strong>{{ $message }}</strong></span>@enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-md-6">
                                                    @if(auth()->user()?->role== 'admin')
                                                    <button type="submit" disabled class="btn btn-primary"><span class="glyphicon glyphicon-shopping-cart"></span> Add To Cart</button>
                                                    @else
                                                    <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-shopping-cart"></span> Add To Cart</button>
                                                    @endif
                                                </div>
                                                <div class="col-md-6 d-flex flex-row-reverse">
                                                    <a href="/"><button type="button" class="btn btn-secondary"><span class="glyphicon glyphicon-shopping-cart"></span> Back</button></a>
                                                </div>
                                            </div>
                                            
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </form>
        @endforeach
    </div>
</div>
@endsection