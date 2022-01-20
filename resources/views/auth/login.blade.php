{{-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ml-3">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout> --}}


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
                <form method="POST" action="{{ route('login') }}">   
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

@endsection