@extends('layout.ecommerce')
@section('title', 'Login')
@section('main')
<div class="page-container"></div>
<div class="login-reg-panel">                   
    <div class="register-info-box">
        <div class="col">
        <img src="{{ URL::to('/images/logoEcommerce.png') }}" class="logoEcom">
        </div>
        <div class="col-xs-4"><h2>Don't have an account?</h2></div>
        <div class="col-xs-4"> <p>Register Now</p></div>
        <div class="col-xs-4">        
           <label id="label-register" style="color:#9E9E9E"> <a href="register">Register </a></label>
        </div>
    </div>
      
        <div class="white-panel">
            <div class="login-show show-log-panel">
                <form method="POST" action="{{ route('login') }}" autocomplete="off">   
                    <h2>LOGIN</h2>
                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" style="color:red"/>

                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" style="color:red" />
                    @csrf
                    <div class="form-group">
                        <input type="email" class="form-control " class="block mt-1 w-full" placeholder="email"  name="email" value="{{old('email')}}"/>
                        {{-- @error('email')<span class="invalid-feedback" role="alert" style="color:red"><strong>{{ $message }}</strong></span>@enderror --}}
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control "  placeholder="password"  name="password" />
                        {{-- @error('password')<span class="invalid-feedback" role="alert" style="color:red"><strong>{{ $message }}</strong></span>@enderror --}}
                    </div>
                    <input type="submit" value="Login">
                    @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">Forgot password?</a>
                    @endif
                </form>
            </div>
        </div>
</div>
</div>
@endsection