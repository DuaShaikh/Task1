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
                   
                    <form class="row g-3">
                        <table>
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
                                    <td>{{$cart->cartProduct->pName}}</td>
                                    <td>{{$cart->quantity}}</td>
                                    <td>{{$cart->quantity*$cart->cartProduct->productPrice}}</td>
                                </tr>
                                @php 
                                    $totalPrice += $cart->cartProduct->productPrice * $cart->quantity;
                                @endphp
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    
                                    {{-- <td colspan="2" class="hidden-xs"></td> --}}
                                    <td class="hidden-xs text-center">Total Price: <strong>{{$totalPrice}}</strong></td>
                                    {{-- <a href="checkout" class="btn btn-success btn-block">Checkout </a> --}}
                                    <td><a href="#"> <input type="submit" class="btn btn-primary btn-block" value="Next"></a></td>
                                </tr>
                            </tfoot>
                        </table>
                        {{-- <div class="col-md-9">
                            <h6>Total Price: <span>{{$totalPrice}}</span></h6>
                        </div>
                        <div class="col-md-3">
                           
                        </div> --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection