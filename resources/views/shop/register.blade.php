@extends('layout.ecommerce')
@section('title', 'Register')
@section('main')
<div class="container register">
    <div class="row">
        <div class="col-md-3 register-left">
            <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt="" />
            <h3>Welcome</h3>
            <h2>Step - 1/3</h2>
            <p>Already Have an Account?</p>
            <a href="login"> <input type="submit" name="" value="Login"/></a> <br/>
        </div>
        <div class="col-md-9 register-right">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                          <h3 class="register-heading">Registration</h3>
                    <form method="post" action="register">
                        <div class="container">
                            <div class="row register-form">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        @csrf
                                        <input type="text" class="form-control" placeholder="Full Name *" name="fullName" value="" required/>
                                        <span style="color:red; margin-left:10px">@error('fullName'){{$message}}@enderror</span>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Password *" value="" name="password" required/>
                                        <span style="color:red; margin-left:10px">@error('password'){{$message}}@enderror</span>
                                    </div>
                                    {{-- <div class="form-group">
                                        <input type="password" class="form-control"  placeholder="Confirm Password *" value=""  />
                                    </div> --}}
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="Email *" value="" name="email" required/>
                                        <span style="color:red; margin-left:10px">@error('email'){{$message}}@enderror</span>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" minlength="11" maxlength="11" name="phone" class="form-control" placeholder="Phone *" value="" required/>
                                        <span style="color:red; margin-left:10px">@error('phone'){{$message}}@enderror</span>
                                    </div>
                                    <div class="form-group">
                                        <div class="maxl">
                                            <label class="radio inline"> 
                                                Gender <br>
                                                <input type="radio" name="gender" value="M" checked required>
                                                <span> Male </span> 
                                            </label>
                                            <label class="radio inline"> 
                                                <input type="radio" name="gender" value="F">
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
@endsection