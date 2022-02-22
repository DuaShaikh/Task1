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
                    <form wire:submit.prevent='address' autocomplete="off">
                        <div class="container">
                            <div class="row register-form">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        @csrf
                                        {{-- <input type="hidden" value = "{{$users}}" name = "user_id"> --}}
                                        <input type="text" class="form-control @error('address') is-invalid @enderror"  placeholder="Address" wire:model="form.address" value="{{old('address')}}" />
                                        @error('form.address')<span class="invalid-feedback" role="alert" style="color:red"><strong>{{ $message }}</strong></span>@enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control @error('city') is-invalid @enderror"  placeholder="City"  wire:model="form.city" value="{{old('city')}}"/>
                                        @error('form.city')<span class="invalid-feedback" role="alert" style="color:red"><strong>{{ $message }}</strong></span>@enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control @error('region') is-invalid @enderror"  placeholder="Region"  wire:model="form.region" value="{{old('region')}}"/>
                                        @error('form.region')<span class="invalid-feedback" role="alert" style="color:red"><strong>{{ $message }}</strong></span>@enderror
                                    </div>
                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control @error('postalCode') is-invalid @enderror"  placeholder="Postal Code" wire:model="form.postalCode" value="{{old('postalCode')}}"/>
                                        @error('form.postalCode')<span class="invalid-feedback" role="alert" style="color:red"><strong>{{ $message }}</strong></span>@enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control @error('country') is-invalid @enderror"   placeholder="Country" wire:model="form.country" value="{{old('country')}}"/>
                                        @error('form.country')<span class="invalid-feedback" role="alert" style="color:red"><strong>{{ $message }}</strong></span>@enderror
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
