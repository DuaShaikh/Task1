@extends('layout.ecommerce')
@section('title', 'Media')
@section('main')
<div class="container register">
    <div class="row">
        <div class="col-md-3 register-left">
            <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
            <h2>Step - 3/3</h2>
            {{-- <p>You are 30 seconds away from earning your own money!</p> --}}
         
        </div>
        <div class="col-md-9 register-right">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <h3 class="register-heading">Registration</h3>
                    <div class="row register-form">
                        <div class="col-md-6">
                           
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Image Name" value="" />
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Image Type" value="" />
                            </div>
                            
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="file" class="form-control" placeholder="" value="" />
                            </div>
                           <a href="login"> <input type="submit" class="btnRegister"  value="Register"/></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection