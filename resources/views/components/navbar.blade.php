<nav class="navbar navbar-expand-lg  navbar-dark bg-primary">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <img src="{{ URL::to('/images/logoEcommerce.png') }}" class="logoEcom">
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active home" style="font-size: 20px">
                  <a class="nav-link" href="{{route('/')}}">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <div class="btn-group">
                      <button class="btn btn-primary btn-lg dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Shop
                      </button>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="#" active>Electronic Device</a>
                      <a class="dropdown-item" href="#">Groceries</a>
                      <a class="dropdown-item" href="#">Men's Fashion</a>
                      <a class="dropdown-item" href="#">Women's Fashion</a>
                      <a class="dropdown-item" href="#">Kid's Fashion</a>
                    </div>
                  </li>
            </ul>
        </div>
  
    {{-- <div class="col-xl-3 col-lg-4 col-md-3 col-sm-6">
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        </form>
    </div> --}}
    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-6iconLink">
         {{-- <i> {{ Auth::user()->fullName }}</i> --}}
         <button class="btn btn-primary"><a href="{{route('admin/dashboard')}}"><i class="far fa-user"></i></a></button>
         @if(auth()->user()?->role=='admin')
         <button disabled class="btn btn-primary"><a href="{{route('view-cart')}}"> <i class="fas fa-shopping-cart"><span class="cartCount">{{auth()?->user()?->cart()->count()}}</span></i> </a></button>
        @else
       <button class="btn btn-primary"><a href="{{route('view-cart')}}"> <i class="fas fa-shopping-cart"><span class="cartCount">{{auth()?->user()?->cart()->count()}}</span></i> </a></button>
      @endif
      </div>
    
  </nav>
