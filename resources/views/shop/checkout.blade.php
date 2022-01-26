@extends('layout.ecommerce')
@section('title', 'Shipping Address')
@section('main')
<x-navbar />

<div class="container">
    <div class="row">
        <div class="col-md-5">
            <div class="card mt-5">
                <div class="card-body">
                    <h6>Basic Details</h6>
                    <hr>
                    @foreach ($users as $user )
                    <form class="row g-3" mathod="post" action="update-detail">
                       @csrf
                        <div class="col-md-6">
                            <label for="inputCountry" class="form-label">Name</label>
                            <input type="text" class="form-control"  name="fullName" value="{{$user->fullName}}">
                        </div>
                        <div class="col-md-6">
                          <label for="inputCity" class="form-label">Phone Number</label>
                          <input type="text" class="form-control"  name="phone" value="{{$user->phone}}">
                        </div>
                        <div class="col-md-10">
                            <label for="inputCountry" class="form-label">Email</label>
                            <input type="text" class="form-control"  name="email" value="{{$user->email}}">
                        </div>
                        <div class="col-md-2 mt-5">
                          <input type="submit" class="btn btn-success " value="Update">
                        </div>
                    </form>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card mt-5">
                <div class="card-body">
                    <h6>Shipping Address</h6>
                    <hr>
                    @foreach ($users as $user )
                        <form method = "post" action = "order-detail">
                            @csrf
                            <div class="col-12">
                                <label for="inputAddress" class="form-label">Address</label>
                                <input type="text" class="form-control"  name="address" value="{{$user->UserAddress->address}}" >
                            </div>
                            <div class="col-md-12">
                                  <label for="inputCountry" class="form-label">Country</label>
                                  <input type="text" class="form-control" name="country" value="{{$user->UserAddress->country}}">
                            </div>
                            <div class="col-md-12">
                                <label for="inputCity" class="form-label">City</label>
                                <input type="text" class="form-control" name="city" value="{{$user->UserAddress->city}}">
                            </div>
                            <div class="col-md-12">
                                  <label for="inputCity" class="form-label">Region</label>
                                  <input type="text" class="form-control"  name="region" value="{{$user->UserAddress->region}}">
                            </div>
                                
                            <div class="col-md-12">
                                <label for="inputZip" class="form-label">Postal Code</label>
                                <input type="text" class="form-control"  name="postalCode" value="{{$user->UserAddress->postalCode}}">
                            </div> 
                            <div class="col-md-4 mt-5">
                                  <input type="submit" class="btn btn-primary btn-block " value="Next">
                            </div>
                        </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <div class="container mt-5">
    <div class="row">
        <div class="col-md-10">
              @foreach ($users as $user )
            <div class="card ">
                <div class="card-body">
                    <h6>Basic Details</h6>
                    <hr>
                    <form class="row g-3" action="">
                       
                        <div class="col-md-6">
                            <label for="inputCountry" class="form-label">Name</label>
                            <input type="text" class="form-control" id="inputCountry" name="fullName" value="{{$user->fullName}}">
                        </div>
                        <div class="col-md-6">
                          <label for="inputCity" class="form-label">Phone Number</label>
                          <input type="text" class="form-control" id="inputCity" name="phone" value="{{$user->phone}}">
                        </div>
                        <div class="col-md-10">
                            <label for="inputCountry" class="form-label">Email</label>
                            <input type="text" class="form-control" id="inputCountry" name="email" value="{{$user->email}}">
                        </div>
                        <div class="col-md-2 mt-5">
                          <input type="submit" class="btn btn-success " value="Update">
                        </div>
                   
                    </form>
                    
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
                          
                        <div class="col-md-4">
                          <label for="inputZip" class="form-label">Postal Code</label>
                          <input type="text" class="form-control" id="inputZip" name="postalCode">
                        </div> 
                        <div class="col-md-2 mt-5">
                            <input type="submit" class="btn btn-primary " value="Next">
                          </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div> --}}
{{-- @endforeach --}}
@endsection