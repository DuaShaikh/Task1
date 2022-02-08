@extends('layout.ecommerce')
@section('title', 'Shipping Address')
@section('main')
<div class="page-container">
    <div class="container">
        @foreach ($users as $user )
            <form  method="post" action="update-detail">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card mt-5">
                                <div class="card-body">
                                    <h6>Basic Details</h6>
                                    <hr>
                                    @csrf
                                        <div class="col-md-12">
                                            <label for="inputCountry" class="form-label">Name</label>
                                            <input type="text"  
                                            class="form-control @error('fullName') is-invalid @enderror" 
                                            name="fullName" value="{{$user->fullName}}" 
                                            required><br>
                                            @error('fullName')<span class="invalid-feedback" role="alert" style="color:red"><strong>{{ $message }}</strong></span>@enderror

                                        </div>
                                        <div class="col-md-12">
                                            <label for="inputCity" class="form-label">Phone Number</label>
                                            <input type="text" 
                                            class="form-control @error('phone') is-invalid @enderror"  
                                            name="phone" 
                                            value="{{$user->phone}}" required><br>
                                            @error('phone')<span class="invalid-feedback" role="alert" style="color:red"><strong>{{ $message }}</strong></span>@enderror
                                        </div>
                                        <div class="col-md-12">
                                            <label for="inputCountry" class="form-label">Email</label>
                                            <input type="text" 
                                            class="form-control @error('email') is-invalid @enderror" 
                                            name="email" 
                                            value="{{$user->email}}" required>
                                            @error('email')<span class="invalid-feedback" role="alert" style="color:red"><strong>{{ $message }}</strong></span>@enderror
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card mt-5">
                                <div class="card-body">
                                    <h6>Shipping Address</h6>
                                    <hr>
                                        <div class="col-md-12">
                                            <label for="inputAddress" class="form-label">Address</label>
                                            <input type="hidden" value={{$user->userAddress->id}} name = "id" >
                                            <input type="text" class="form-control"  name="address" value="{{$user->userAddress->address}}" required><br>
                                            @error('address')<span class="invalid-feedback" role="alert" style="color:red"><strong>{{ $message }}</strong></span>@enderror

                                        </div>
                                        <div class="col-md-12">
                                            <label for="inputCountry" class="form-label">Country</label>
                                            <input type="text" class="form-control" name="country" value="{{$user->userAddress->country}}" required><br>
                                            @error('country')<span class="invalid-feedback" role="alert" style="color:red"><strong>{{ $message }}</strong></span>@enderror

                                        </div>
                                        <div class="col-md-12">
                                            <label for="inputCity" class="form-label">City</label>
                                            <input type="text" class="form-control" name="city" value="{{$user->userAddress->city}}" required><br>
                                            @error('city')<span class="invalid-feedback" role="alert" style="color:red"><strong>{{ $message }}</strong></span>@enderror

                                        </div>
                                        <div class="col-md-12">
                                            <label for="inputCity" class="form-label">Region</label>
                                            <input type="text" class="form-control"  name="region" value="{{$user->userAddress->region}}" required><br>
                                            @error('region')<span class="invalid-feedback" role="alert" style="color:red"><strong>{{ $message }}</strong></span>@enderror

                                        </div>
                                            
                                        <div class="col-md-12">
                                            <label for="inputZip" class="form-label">Postal Code</label>
                                            <input type="text" class="form-control"  name="postalCode" value="{{$user->userAddress->postalCode}}" required><br>
                                            @error('postalCode')<span class="invalid-feedback" role="alert" style="color:red"><strong>{{ $message }}</strong></span>@enderror

                                        </div> 
                                        <div class="col-md-4 mt-5">
                                            <input type="submit" class="btn btn-primary btn-block " value="Next">
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        @endforeach
    </div>
</div>
@endsection

