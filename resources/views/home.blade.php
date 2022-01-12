
@extends('layout.master')
@section('title','Home')
@section('main')
    <div class="subMenu">
        <div class="container">
            <div class="row">
                <div class="col">
                    <i class="fas fa-tint"></i>
                    <h5>Donors</h5>   </li>
                </div>
                <div class="col">
                    <i class="far fa-prescription-bottle-alt"></i>
                    <h5>Products</h5>
                </div>
                <div class="col">
                    <i class="far fa-user"></i>
                    <h5>Patients</h5>
                </div>
                <div class="col">
                    <i class="fas fa-thumbs-up"></i>
                    <h5 style="margin-left: 50px;"> Quality</h5>
                </div>
                <div class="col">
                    <i class="fas fa-money-bill-wave"></i>
                    <h5 style="margin-left: 65px;">Billing</h5>  
                </div>
            </div>
         </div>
    </div>
    @foreach($widgets as $widget)
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="donorActivity">
                    <div class="card">
                        <div class="card-body" style="color: black; font-weight: bold; padding: 30px; padding-left: 30px;">
                                <h5 class="card-title">Today's Donor Activity</h5>
                            <div class="row">
                                <div class="col link">
                                    <h6>Enter a Source:</h6>
                                    <a href="#" style="color: rgb(56, 86, 170)">
                                        Kent Donation Center
                                    </a> <br>
                                    <a href="#" style="color: rgb(56, 86, 170)">
                                        Kent Donation Center
                                    </a><br>
                                    <a href="#" style="color: rgb(56, 86, 170)">
                                        Kent Donation Center
                                    </a> 
                                </div>
                                <div class="col link" >
                                    <h6>Enter a Blood Drive:</h6>
                                    <a href="#" style="color: rgb(56, 86, 170)">
                                        Mobile Drive 1 (0)
                                    </a> <br>
                                    <a href="#" style="color: rgb(56, 86, 170)">
                                        Mobile Drive 2 (0)
                                    </a>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
            
                <div class="col-md-6">
                    <div class="card" style="border: 1px solid red;   background: linear-gradient(to right, #e7f0f3 0%, #dd9a98 100%);">
                        <div class="card-body">
                            <h5 class="card-title">Announcement(s)</h5>
                            <p class="card-text">{{$widget->announcement}}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                              <h5 class="card-title">Widget</h5>
                              <h6>3</h6>
                              <p class="card-text"> {{$widget->widget3}} </p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                                <h5 class="card-title">Widget</h5>
                                <h6>4</h6>
                                <p class="card-text">{{$widget->widget4}}</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                                <h5 class="card-title">Widget</h5>
                                <h6>5</h6>
                                <p class="card-text"> {{$widget->widget5}}</p>
                        </div>
                    </div>
                </div>
              
        </div>
    </div>
    @endforeach    
@endsection
    
