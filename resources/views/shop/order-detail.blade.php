@extends('layout.ecommerce')
@section('title', 'Checkout')
@section('main')
<x-navbar />

<div class="container mt-5">
    <div class="row">
        <div class="col-md-10">
            <div class="card ">
                <div class="card-body">
                    <h6>order Details</h6>
                    <hr>
                   
                    <form class="row g-3" method="post" action="order-detail">
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
                                @foreach ($carts as $cart )
                               
                                <tr>
                                    <td name="pName">{{$cart->cartProduct->pName}}</td>
                                    <td name="quantity">{{$cart->quantity}}</td>
                                    <td name="productPrice">{{$cart->quantity*$cart->cartProduct->productPrice}}</td>
                                </tr>
                                @php 
                                    $totalPrice += $cart->cartProduct->productPrice * $cart->quantity;
                                @endphp
                                @endforeach
                            </tbody>
                        </table>
                        <div class="col-md-9" name="price">
                            <td> <input type="text" name="price" value="{{$totalPrice}}"></td>
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
@endsection