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
   
    
    <link rel="stylesheet" href="main.css">
    <title>Table</title>
</head>

<body>
  <?php include "header.php"; ?>

  <div class="container"style="margin-top:-40px">
  
    <div class="heading " >
      <div class="container" >
        <div class="row">
          <div class="col-md-9" id="data" >
            <h3 class="deferrals" style="margin-top:120px;"> <b style="color: black;">Deferrals</b> Define your deferrals reasons </h3>
          </div>
          <div class="col">
            <i class="far fa-globe"></i>
            <i class="far fa-history"></i>
            <!-- <input type="button" value="Add" class="button"> -->
            <button type="button" class="button" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap" style="margin-top: 100px; margin-bottom:20px;">Add</button>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col">
          <form>
          <input type="text" name="search" id="searchbar" placeholder="Search">
          </form>
        </div>
        </div>
    </div>
     

  <section>
    <?php
    session_start();
    require "function.php";
    $limit = 10;
    $result = retrivedData($conn, $limit);
    $count = $result['count']->fetch_object();
    $pages = ceil($count->count / $limit);
    
 
   if (mysqli_num_rows($result['data']) > 0) {
    ?>
    <?php if (isset($_SESSION['success'])) { ?>
      <div class="alert alert-success"><?php echo $_SESSION['success']; ?> </div>
    <?php unset($_SESSION['success']); } ?>
    <table class="table table-striped table-borderless" >

    

      <thead>
        <tr style="font-family: monospace; font-size: 12px">
          <th scope="col" >Name</th>
          <th scope="col">Discription</th>
          <th scope="col">Associated Profile</th>
          <th scope="col" colspan="3"> Actions</th>
        </tr>
      </thead>
      <tbody id="table_data">
      <?php

      
          $i=0;
         while($row = mysqli_fetch_array($result['data']) ) {
      ?>
        <tr >
          <td><?php echo $row["name"];  ?></td>
          <td><?php echo $row["description"];  ?> </td>
          <td></td>
          <td ><a href="http://task.me/function.php?function=show&id=<?php echo $row["id"]; ?>" > <i class="fas fa-pencil-alt"></i></a></td>
          <td><a href="http://task.me/table.php?function=duplicateData&id=<?php echo $row["id"]; ?>"><i class="far fa-copy"></i> </a></td>
        	<td><a href="http://task.me/function.php?function=deleteData&id=<?php echo $row["id"]; ?>"> <i class="fas fa-trash"> </i> </a></td>
        
        </tr>
          <?php
       $i++;
} 
     ?>
       
      </tbody>
    
    </table>
 

    <!-- ----------------------Pagination----------------------- -->


    <?php

    $pre = $result['currentPage'] - 1;
    $next = $result['currentPage'] + 1;
      
 
    echo '<ul class="pagination">';
    $disabled= '';
    if($result['currentPage'] == 1) {
      $disabled = 'disabled';
    }
      echo '<li class="page-item ' . $disabled . '" >
        <a class="page-link" href="http://task.me/table.php?page=' . $pre . '">Previous</a>
      </li>'; 

    for($j=1; $j<=$pages; $j++){
      $active = "";
      if($result['currentPage'] == $j) {
        $active = "active";
      }
      echo '<li class="page-item ' . $active . '"><a class="page-link" href="http://task.me/table.php?page=' . $j . '">' . $j . '</a></li>';
    }
    $disabled= '';
    if($result['currentPage'] == $pages) {
     $disabled = 'disabled';
    }
    
      echo '<li class="page-item '. $disabled. '">
        <a class="page-link"  href="http://task.me/table.php?page=' . $next . '">Next</a>
      </li>'; 
     
    
    echo '</ul>';
  }
  else {
    echo 'No result found';
  }
  ?>
  </div>
</section>
<!-- --------------------------------Form----------------------------------- -->


<section>
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered  modal-lg" >
      <div class="modal-content">
        <div >
          <h5 class="modal-title" >Add Deferral Reason</h5>
        </div>
        <div class="modal-body" style="padding: 30px;">
            <form method="post" action="function.php" >
                <div class="container">
                   
                <div class="row mb-3">
                  <!-- <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label> -->
                  <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Display Name" name="name" >
                    <input type="hidden" name="function" value="submitForm">
               
                  </div>
                </div>
                <div class="row mb-3">
                  <!-- <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label> -->
                  <div class="col-sm-10" style="padding-bottom: 30px">
                    <input type="text" class="form-control" placeholder="Description" name="description">
                  </div>
                </div>
                <div class="row g-2">
                      
                    <div class="col-md">
                        <h5 style="font-size: 20px; margin-top: 10px;">
                            Deferral Period
                          </h5>
                    </div>
                    <div class="col-md ">
                        <div class="form-floating">
                          <select class="form-select" id="floatingSelectGrid" name="interval" aria-label="Floating label select example" >
                            <option selected>None</option>
                            <option value="m">One</option>
                            <option value="d">Two</option>
                            <option value="y">Three</option>
                          </select>
                          <label for="floatingSelectGrid">Interval</label>
                        </div>
                      </div>
                    <div class="col-md">
                      <div class="form-floating">
                          
                        <input type="text" class="form-control" id="floatingInputGrid" placeholder="name@example.com" name="count">
                        <label for="floatingInputGrid" style="color: gray;">Count</label>
                      </div>
                    </div>
                   
                  </div>
               
                  <div class="col-md">
                    <h5 class="col-form-label col" >Calculate Deferral Period Form:</h5>
                  </div>
                  <div class="col-sm-10">
                   
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="compute" id="gridRadios1" value="1" checked>
                      <label class="form-check-label" for="gridRadios1">
                        Occurrence Date Capture in the Questionnaire
                      </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="compute" id="gridRadios1" value="0" checked>
                        <label class="form-check-label" for="gridRadios1">
                          From Appearance Date as Confidential
                        </label>
                      </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="confidential" value="1" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                          Treat This Deferral as Confidential
                        </label>
                      </div>
                     
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="override" value="1" id="flexCheckChecked" checked>
                        <label class="form-check-label" for="flexCheckChecked">
                          Require Supervisor Override to Post this Deferral
                        </label>
                      </div>
                  </div>
                
               
                <select class="form-select" aria-label="Default select example" name="lookback" style="margin-top: 30px;">
                    <option selected>LookBack Perform</option>
                    <option value="TY">One</option>
                    <option value="ASAP">Two</option>
                    <option value="MP">Three</option>
                  </select>
                  <select class="form-select" aria-label="Default select example" name="deferralType" style="margin-top: 30px;">
                    <option selected>Deferral Type</option>
                    <option value="primary">One</option>
                    <option value="secondary">Two</option>
                  </select>
                
            </div>
            <div class="row" >
            <div class="col-md-6">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >Cancel</button>
        </div>
        <div class="col-md-6">
        <button type="submit" class="btn btn-primary">Save</button>
        </div>
        </div>


              </form>

              
        </div>
        
      </div>
    </div>
  </div>
   <footer class="page-footer font-small blue-grey lighten-5" >


    <div class="col-md-2" >
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


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>



</section>

<script>


$(document).ready(function(){
  $('#searchbar').keyup(function(){
   var search_term = $(this).val();
   console.log(search_term);
    $.ajax({
        url :"function.php?function=retrivedData",
        METHOD: "GET",
        data: {search: search_term},
        dataType:"text",
        success: function(data){
        $("#table_data").html(data);
        //    console.log(data);
        
        }
    });
    });

  
}); 


</script>


</body>

</html>