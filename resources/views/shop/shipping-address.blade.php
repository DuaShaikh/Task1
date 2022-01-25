@extends('layout.ecommerce')
@section('title', 'Shipping Address')
@section('main')
<x-navbar />

<div class="container mt-5">
    <div class="row">
        <div class="col-md-10">
            <div class="card ">
                <div class="card-body">
                    <h6>Basic Details</h6>
                    <hr>
                    <form class="row g-3">
                        <div class="col-12">
                          <label for="inputAddress" class="form-label">Address</label>
                          <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="address">
                        </div>
                        <div class="col-md-6">
                            <label for="inputCountry" class="form-label">Country</label>
                            <input type="text" class="form-control" id="inputCountry" name="country">
                          </div>
                        <div class="col-md-6">
                          <label for="inputCity" class="form-label">City</label>
                          <input type="text" class="form-control" id="inputCity" name="city">
                        </div>
                        <div class="col-md-6">
                            <label for="inputCity" class="form-label">Region</label>
                            <input type="text" class="form-control" id="inputCity" name="region">
                          </div>
                          
                        <div class="col-md-2">
                          <label for="inputZip" class="form-label">Postal Code</label>
                          <input type="text" class="form-control" id="inputZip" name="postalCode">
                        </div> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection