<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{ URL::to('/images/slider/slider4.jpg') }}" class="d-block w-100 slider" >
      </div>
      <div class="carousel-item">
        <img src="{{ URL::to('/images/slider/slider2.jpg') }}" class="d-block w-100 "> 
      </div>
      <div class="carousel-item">
        <img src="{{ URL::to('/images/slider/slider5.jpeg') }}" class="d-block w-100 slider" >
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
