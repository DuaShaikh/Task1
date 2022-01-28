@extends('layout.ecommerce')
@section('title','View Product')
@section('main')
    @foreach($products as $product)
        <form action="add-to-cart" method="post">
            @csrf
            <input type="hidden" name="product_id" value="{{$product->id}}">
            <div class="card mb-3 mt-5 " style="max-width: 1000px; margin-left:300px; border-radius:20px">
                <div class="card-header">Product</div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4" >
                                <img src="{{url($product->productMedia->url)}}" alt="" style="width: 200px;height:200px">
                            </div>
                            <div class="col-md-8 mt-4">
                                <h5 class="productTitle">{{$product->pName}}</h5><hr>
                                <p>{{$product->description}}</p><hr>
                                {{-- @if ($product->unitsInStock>0)
                                    <label class="badge bg-success">In stock</label>
                                @else
                                    <label  class="badge bg-danger">Out of stock</label>
                                @endif --}}
                                <h3 class="cost"> {{$product->productPrice}}</h3>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 col-xs-12 quantity">
                                        <input type="number" name="quantity" minlength="1" maxlength="10"  placeholder="Quantity">
                                        </div><br>
                                        <div class="col-md-4 ">
                                            <div class="form-floating">
                                                <select class="form-select" id="floatingSelectGrid" name="size" aria-label="Floating label select example">
                                                    <option selected>None</option>
                                                    <option value="S">S</option>
                                                    <option value="M">M</option>
                                                    <option value="L">L</option>
                                                </select>
                                                <label for="floatingSelectGrid">Size</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- @if ($product->unitsInStock>0) --}}
                                    <div class="btn-ground mb-3" >
                                        <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-shopping-cart"></span> Add To Cart</button>
                                    </div>
                                {{-- @else 
                                <div class="btn-ground mb-3" >
                                    <button type="submit" class="btn btn-primary" disabled><span class="glyphicon glyphicon-shopping-cart"></span> Add To Cart</button>
                                </div>
                                @endif --}}
                            </div>
                        </div>
                    </div>
                </div>
        </form>
    @endforeach
@endsection