@extends('layout.ecommerce')
@section('title','View Product')
@section('main')
    @foreach($products as $product)
    <form action="add-to-cart" method="post">
        @csrf
        <input type="hidden" name="product_id" value="{{$product->id}}">
        <div class="card mb-3 " style="max-width: 1000px;margin-top:200px; margin-left:300px; border-radius:20px">
            <div class="card-header">Product</div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-4" >
                            <img src="{{url($product->productMedia->url)}}" alt="" style="width: 200px;height:200px">
                        </div>
                        <div class="col-md-8" style="margin-top:20px">
                            <h5>Product Name: <span>{{$product->pName}}</span></h5>
                            <p>{{$product->description}}</p>
                            <h3 class="cost"><span class="glyphicon glyphicon-usd"></span>  <small ><span class="glyphicon glyphicon-usd"></span>{{$product->productPrice}}</small></h3>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="number" name="quantity" minlength="1" maxlength="10"  placeholder="Quantity">
                                    </div><br>
                                    <div class="col-md-4 ">
                                        <div class="form-floating">
                                          <select class="form-select" id="floatingSelectGrid" name="size" aria-label="Floating label select example" required>
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
                            
                              
                                <div class="btn-ground mb-3" >
                                        <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-shopping-cart"></span> Add To Cart</button>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
    </form>
        @endforeach
    </div>

@endsection