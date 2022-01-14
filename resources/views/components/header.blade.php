<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" 
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
    <link rel="stylesheet" href="{{ URL::asset('css/main.css') }}" />
   
</head>
<body>
    <header>
        <div class="container-fuild"> 
             <div class="navbar">
                <div class="menu">
                    <div class="col">
                        <ul>
                            <li class="bar"> <i class="fas fa-bars"></i></li>
                            <li class="logo">
                                <img src="{{ URL::to('/images/logo.png') }}">
                            </li>
                            <a href="table"><li class="list" >Donors</li></a> 
                            <li class="list">Products</li>
                            <li class="list">Patients</li>
                            <li class="list">Quality</li>
                            <li class="list">Billing</li>
                            <li class="list">Reports</li>
                        </ul>
                    </div>
                </div>
                    <div class="date1">
                        <div class="col">
                        <ul>
                            <li class="date">December 28, 2021 09:31 PM</li>
                            <li class="profile"><img src="{{ URL::to('/images/profilePic.jpg') }}"></li>
                            <li class="arrowDown" >  
                                <div class="btn-group">
                                    <i class=" dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"></i>
                                    <ul class="dropdown-menu">
                                      <li><a class="dropdown-item" href="#">Login</a></li>
                                      
                                    </ul>
                                  </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
</body>
</html>
