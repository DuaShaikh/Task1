<div class="page-container">
    <div class="jumbotron jumbotron-sm">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-12">
                    <h1 class="h1">
                        Contact us <br><small>Feel free to contact us</small></h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
              @if (Session::get('contact'))
                    <div x-data="{ open: true }"
                    x-init="setTimeOut(() => {open = false}, 300ms)"
                    x-show="open" 
                    class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session::get('contact') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
              @endif
          </div>
    </div>
    <div class="container p-4" style="background-color: #d7d9db">
        <div class="well well-sm">
            <form wire:submit.prevent="contact" autocomplete="off">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter name" 
                            value="{{ old('fullName', isset($users) ? $users->fullName : '') }}" required/>
                        </div>
                        <div class="form-group">
                            <label for="email">
                                Email Address</label>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                </span>
                                <input type="email" class="form-control" id="email" placeholder="Enter email"
                                value="{{ old('email', isset($users) ? $users->email : '') }}" required/></div>
                            </div>
                        <div class="form-group">
                            <label for="subject">
                                Subject</label>
                            <select id="subject" name="subject" class="form-control @error('subject') is-invalid @enderror" wire:model="subject">
                                <option value="na" selected="">Choose One:</option>
                                <option value="General Customer Service">General Customer Service</option>
                                <option value="Suggestions">Suggestions</option>
                                <option value="Product Support">Product Support</option>
                            </select>
                            @error('subject')<span class="invalid-feedback" role="alert" style="color:red"><strong>{{ $message }}</strong></span>@enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                Message</label>
                            <textarea id="message" class="form-control @error('comment') is-invalid @enderror" rows="8" cols="25" wire:model="comment">
                                placeholder="Message">
                            </textarea>
                            @error('comment')<span class="invalid-feedback" role="alert" style="color:red"><strong>{{ $message }}</strong></span>@enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary pull-right" id="btnContactUs">
                            Send Message</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
