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
            <h2>LOGIN</h2>
            <input type="text" placeholder="Email">
            <input type="password" placeholder="Password">
            <input type="button" value="Login">
            <a href="">Forgot password?</a>
        </div>
     
    </div>
</div>
@endsection