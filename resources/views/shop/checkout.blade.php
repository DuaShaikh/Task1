@extends('layout.ecommerce')
@section('title', 'Shipping Address')
@section('main')
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="card mt-5">
                    <div class="card-body">
                        <h6>Basic Details</h6>
                        <hr>
                        @foreach ($users as $user )
                        <form class="row g-3" method="post" action="update-detail">
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
                            <input type="submit" class="btn btn-success " value="Save">
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
                                    <input type="text" class="form-control"  name="address" value="{{$user->userAddress->address}}" >
                                </div>
                                <div class="col-md-12">
                                    <label for="inputCountry" class="form-label">Country</label>
                                    <input type="text" class="form-control" name="country" value="{{$user->userAddress->country}}">
                                </div>
                                <div class="col-md-12">
                                    <label for="inputCity" class="form-label">City</label>
                                    <input type="text" class="form-control" name="city" value="{{$user->userAddress->city}}">
                                </div>
                                <div class="col-md-12">
                                    <label for="inputCity" class="form-label">Region</label>
                                    <input type="text" class="form-control"  name="region" value="{{$user->userAddress->region}}">
                                </div>
                                    
                                <div class="col-md-12">
                                    <label for="inputZip" class="form-label">Postal Code</label>
                                    <input type="text" class="form-control"  name="postalCode" value="{{$user->userAddress->postalCode}}">
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
@endsection