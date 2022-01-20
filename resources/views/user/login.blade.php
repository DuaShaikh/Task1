@extends('layout.ecommerce')
@section('title', 'Login')
@section('main')

<div class="login-reg-panel">
                        
    <div class="register-info-box">
        <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt="" class="loginLogo"/>
        <h2>Don't have an account?</h2>
        <p>Register Now</p>
        <label id="label-register" > <a href="register">Register </a></label>
    </div>
      
        <div class="white-panel ">
            <div class="login-show show-log-panel">
                <form method="post" action="login">   
                <h2>LOGIN</h2>
                @csrf
                <div class="form-group">
                    <input type="email" class="form-control "  placeholder="email"  name="email" value="{{old('email')}}"/>
                    {{-- @error('email')<span class="invalid-feedback" role="alert" style="color:red"><strong>{{ $message }}</strong></span>@enderror --}}
                </div>
                <div class="form-group">
                    <input type="password" class="form-control "  placeholder="password"  name="password" />
                    {{-- @error('password')<span class="invalid-feedback" role="alert" style="color:red"><strong>{{ $message }}</strong></span>@enderror --}}
                </div>
                <input type="submit" value="Login">
                <a href="">Forgot password?</a>
            </form>
            </div>
        </div>
   
</div>
@endsection