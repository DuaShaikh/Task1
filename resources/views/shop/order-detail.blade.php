@extends('layout.ecommerce')
@section('title', 'Checkout')
@section('main')
    <div class="page-container">
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-10">
                    <div class="card ">
                        <div class="card-body">
                            <h6>Order Details</h6>
                            <hr>
                        
                            <form class="row g-3" method="post" action="order-item/{{$orders->id}}">
                                @csrf
                                <table class="table table-striped">
                                    <tr>
                                        <thead>
                                            <th>Product Name</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                        </thead>
                                    </tr>
                                    <tbody>
                                    @php
                                        $totalPrice = 0;
                                    @endphp
                                        @foreach ($carts as $key =>  $cart )
                                    
                                        <tr>
                                            <input type="hidden" name="orders[{{$key}}][order_id]"  value="{{$orders->id}}">
                                            <input type="hidden" name="orders[{{$key}}][product_id]" value="{{$cart->cartProduct->id}}">
                                            <input type="hidden" name="orders[{{$key}}][size]" value="{{$cart->size}}">
                                            <td>{{$cart->cartProduct->pName}}</td>
                                            <input type="hidden" name="orders[{{$key}}][quantity]" value="{{$cart->quantity}}">
                                            <td>{{$cart->quantity}}</td>
                                            <input type="hidden" name="orders[{{$key}}][productPrice]" value="{{ ($cart->quantity * $cart->cartProduct->productPrice) }}">
                                            <td >{{ ($cart->quantity * $cart->cartProduct->productPrice) }}</td>
                                        </tr>
                                        @php 
                                            $totalPrice += $cart->cartProduct->productPrice * $cart->quantity;
                                        @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="col-md-9" name="price">
                                    <td> Total Price: <strong>{{$totalPrice}}</strong></td>
                                </div>
                                <div class="col-md-3">
                                    <input type="submit" class="btn btn-primary btn-block" value="Place Order">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection