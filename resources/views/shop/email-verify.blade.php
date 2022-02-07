@extends('layout.ecommerce')
@section('title','Order-Confirmed')
@section('main')
<div class="page-container">
    <div class="container-sm d-flex justify-content-center mt-5">
        <div class="card text-center mt-5 cardBody">
            <div class="card-body ">
                <div class="row">
                 <div class="col-md-12"> <i class="far fa-check-circle"></i></div>
                <div class="col-md-12 mt-3"><h5 class="card-title">ORDER CONFIRMED</h5></div>
                <div class="col-md-12 mt-3"> <p class="card-text">{{auth()->user()->fullName}}, we have sent confirmation email to your provided email address</p></div>
               <div class="col-md-12 mt-3"> <a href="/" class="btn btn-primary">Continue Shopping</a></div>
               
            </div>
        </div>
    </div>
</div>
</div>
@endsection