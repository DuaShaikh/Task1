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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" 
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script> -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    
    <link rel="stylesheet" href="main.css">
    <title>Document</title>
</head>
<body>
    

 <div id="data" class="container">
     <h3> Hellow </h3>
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

  
     
   <!-- -------------------- Table--------------------- -->


    <?php
    session_start();
    require "function.php";
    $limit = 10;
    $result = retrivedData($conn, $limit);
    $count = $result['count']->fetch_object();
    $pages = ceil($count->count / $limit);
    

   if (mysqli_num_rows($result['data']) > 0) 
{
     
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

<?php }?>



  

<script>


$(document).ready(function(){
    $('#searchbar').keyup(function(){
   var search_term = $(this).val();
   console.log(search_term);
   $.ajax({
     url :"function.php",
     type: "GET",
     data: {search: search_term,function: 'retrivedData'},
     dataType:"text",
     success: function(data){
       $("#table_data").html(data);
       console.log(data);
       
     }
   });
 });

$('#data').click(function(){
  $('h3').css("color", "yellow");
});
$("div").css("background-color", "black");
}); 


</script>

</body>
</html> 