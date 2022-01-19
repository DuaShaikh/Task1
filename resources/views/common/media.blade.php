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
                    <form method="post" action="media" enctype="multipart/form-data">
                        <div class="container">
                            <div class="row register-form">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        @csrf
                                        <input type="hidden" value="{{$users->id}}" name="user_id">
                                        <input type="text" class="form-control @error('imageName') is-invalid @enderror" placeholder="Image Name *" value="{{old('imageName')}}" name="imageName" />
                                        @error('imageName')<span class="invalid-feedback" role="alert" style="color:red"><strong>{{ $message }}</strong></span>@enderror
                                    </div>
                                    <div class="form-group">
                                        <div class="maxl">
                                            <label class="radio inline"> 
                                                Image Type * <br>
                                                <input type="radio" name="imageType" value="JPG" checked >
                                                <span> JPG </span> 
                                            </label>
                                            <label class="radio inline"> 
                                                <input type="radio" name="imageType" value="PNG">
                                                <span>PNG</span> 
                                            </label>
                                            <label class="radio inline"> 
                                                <input type="radio" name="imageType" value="JPEG">
                                                <span>JPEG</span> 
                                            </label>
                                        </div>
                                        <span style="color:red">@error('imageType'){{$message}}@enderror</span>
                                    </div>
                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="file"  placeholder="*" value="" name="photo"/>
                                        @error('photo')<span class="invalid-feedback" role="alert" style="color:red"><strong>{{ $message }}</strong></span>@enderror
                                    </div>
                                    <input type="submit" class="btnRegister"  value="Register"/>
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