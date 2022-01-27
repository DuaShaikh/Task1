@extends('layout.ecommerce')
@section('title','Order-Confirmed')
@section('main')
    <div class="container-sm cardBody">
        <div class="card text-center mt-5 ">
            <div class="card-body">
                <i class="far fa-check-circle"></i>
                <h5 class="card-title">ORDER CONFIRMED</h5>
                <p class="card-text">{{auth()->user()->fullName}}, we have sent confirmation email to your provided email address</p>
                <a href="/" class="btn btn-primary">Continue Shopping</a>
            </div>
        </div>
    </div>
@endsection