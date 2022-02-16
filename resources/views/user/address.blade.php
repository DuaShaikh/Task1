@extends('layout.ecommerce')
@section('title', 'Address')
@section('main')
<div class="container register">
    <div class="row">
        <div class="col-md-3 register-left">
            <img src="{{ URL::to('/images/logoEcommerce.png') }}" class="logoEcom">
            <h2>Step - 2/3</h2>

        </div>
        <div class="col-md-9 register-right">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <h3 class="register-heading">Registration</h3>
                    <form method="post" action="address" autocomplete="off">
                        <div class="container">
                            <div class="row register-form">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        @csrf
                                        <input type="hidden" value = "{{$users->id}}" name = "user_id">
                                        <input type="text" class="form-control @error('address') is-invalid @enderror"  placeholder="Address" name="address" value="{{old('address')}}" />
                                        @error('address')<span class="invalid-feedback" role="alert" style="color:red"><strong>{{ $message }}</strong></span>@enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control @error('city') is-invalid @enderror"  placeholder="City"  name="city" value="{{old('city')}}"/>
                                        @error('city')<span class="invalid-feedback" role="alert" style="color:red"><strong>{{ $message }}</strong></span>@enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control @error('region') is-invalid @enderror"  placeholder="Region"  name="region" value="{{old('region')}}"/>
                                        @error('region')<span class="invalid-feedback" role="alert" style="color:red"><strong>{{ $message }}</strong></span>@enderror
                                    </div>
                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control @error('postalCode') is-invalid @enderror"  placeholder="Postal Code" name="postalCode" value="{{old('postalCode')}}"/>
                                        @error('postalCode')<span class="invalid-feedback" role="alert" style="color:red"><strong>{{ $message }}</strong></span>@enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control @error('country') is-invalid @enderror"   placeholder="Country" name="country" value="{{old('country')}}"/>
                                        @error('country')<span class="invalid-feedback" role="alert" style="color:red"><strong>{{ $message }}</strong></span>@enderror
                                    </div>  
                                       <input type="submit" class="btnRegister"  value="Next"/>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection