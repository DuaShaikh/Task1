<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" 
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Home Page</title>
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
                    <img src="images/blood-donation-logo-drop-vector-illustration-149924786-removebg-preview.png">
                  </li>
                 <a href="table.php"><li class="list" >Donors</li></a> 
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
                  <li class="profile"><img src="images/istockphoto-1311564458-170667a.jpg"></li>
                  <li class="arrowDown">  <i class="fas fa-sort-down"></i></li>
              </ul>
        </div>
    </div>
    
        </div>
        </div>
    </header>

 
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
    <?php 
            include "db_config.php";
            $sql = "SELECT * FROM widget";
            $result = $conn->query($sql); 
               
            if(mysqli_num_rows($result)>0){

    ?>
    <div class="content">

        <div class="row">
           <?php 
           $i=0;
           while($rows = mysqli_fetch_array($result)){
            ?>
        
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
              <p class="card-text">
                  <?php echo $rows["announcement"];?>
               </p>
            </div>
            </div>
            </div>
           
            <div class="col">
            <div class="card">
         
                <div class="card-body">
                  <h5 class="card-title">Widget</h5>
                  <h6>3</h6>
                  <p class="card-text"> <?php echo $rows["widget3"];?> </p>
                 
                </div>
              </div>
              </div>
              <div class="col">
                <div class="card">
         
                    <div class="card-body">
                        <h5 class="card-title">Widget</h5>
                        <h6>4</h6>
                      <p class="card-text"><?php echo $rows["widget4"];?></p>
                      
                    </div>
                  </div>
                  </div>
                  <div class="col">
                    <div class="card">
         
                        <div class="card-body">
                            <h5 class="card-title">Widget</h5>
                            <h6>5</h6>
                          <p class="card-text"><?php echo $rows["widget5"];?></p>
                          
                        </div>
                      </div>
                  </div>
                  </div>
              <?php
              $i++;
                }

              ?>
            
          </div>
  
           <?php
           }
           ?>
 
        <!-- Footer -->
<footer class="page-footer font-small blue-grey lighten-5" >

    
    <div class="col-md-2">
        <div class="footer-copyright text-center text-black-50 ">Cloud Dashboard
        </div>
    </div> 
    <div class="col-md-2">
    <div class="footer-copyright text-center text-black-50 ">© BBCS 2021 All Right Reserved
    </div>
</div>
<div class="col-md-2">
    <div class="footer-copyright text-center text-black-50 ">midgard Environment . Version 0.5
    </div>
</div>
   

    </footer>

</body>
</html>