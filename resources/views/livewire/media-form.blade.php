<div class="container register">
    <div class="row">
        <div class="col-md-3 register-left">
            <img src="{{ URL::to('/images/logoEcommerce.png') }}" class="logoEcom">
            <h2>Step - 3/3</h2>
            {{-- <p>You are 30 seconds away from earning your own money!</p> --}}
        </div>
        <div class="col-md-9 register-right">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <h3 class="register-heading">Registration</h3>
                    <form wire:submit.prevent="media" enctype="multipart/form-data" autocomplete="off">
                        <div class="container">
                            <div class="row register-form">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control @error('imageName') is-invalid @enderror" placeholder="Image Name *" wire:model='imageName' value="{{old('imageName')}}"/>
                                        @error('imageName')<span class="invalid-feedback" role="alert" style="color:red"><strong>{{ $message }}</strong></span>@enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="file"  placeholder="*" wire:model='photo'/>
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