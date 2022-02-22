<div class="container register">
    <div class="row">
        <div class="col-md-3 register-left">
            <img src="{{ URL::to('/images/logoEcommerce.png') }}" class="logoEcom">
            <h3>Welcome</h3>
            <h2>Step - 1/3</h2>
            <p>Already Have an Account?</p>
            <a href="login"> <input type="submit" name="" value="Login"/></a> <br/>
        </div>
        <div class="col-md-9 register-right">
            <div class="tab-content" id="myTabContent"> 
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                          <h3 class="register-heading">Registration</h3>
                    <form wire:submit.prevent='registerUser' autocomplete="off">
                        <div class="container">
                            <div class="row register-form">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        @csrf
                                        <input type="text" class="form-control @error('fullName') is-invalid @enderror" placeholder="Full Name *" wire:model="fullName" value="{{old('fullName')}}"/>
                                        @error('fullName')<span class="invalid-feedback" role="alert" style="color:red"><strong>{{ $message }}</strong></span>@enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" wire:model="password" autocomplete="current-password" placeholder="Password *"/>
                                        @error('password')<span class="invalid-feedback" role="alert" style="color:red"><strong>{{ $message }}</strong></span>@enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror"  wire:model="password_confirmation" placeholder="Confirm Password *"   />
                                        @error('password')<span class="invalid-feedback" role="alert" style="color:red"><strong>{{ $message }}</strong></span>@enderror

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email *"  wire:model="email" value="{{old('email')}}"/>
                                        @error('email')<span class="invalid-feedback" role="alert" style="color:red"><strong>{{ $message }}</strong></span>@enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="text" wire:model="phone" class="form-control @error('phone') is-invalid @enderror"  placeholder="Phone *"  value="{{old('phone')}}"/>
                                        @error('phone')<span class="invalid-feedback" role="alert" style="color:red"><strong>{{ $message }}</strong></span>@enderror
                                    </div>
                                    <div class="form-group">
                                        <div class="maxl">
                                            <label class="radio inline"> 
                                                Gender <br>
                                                <input type="radio" wire:model="gender" value="M" checked >
                                                <span> Male </span> 
                                            </label>
                                            <label class="radio inline"> 
                                                <input type="radio" wire:model="gender" value="F">
                                                <span>Female </span> 
                                            </label>
                                        </div>
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