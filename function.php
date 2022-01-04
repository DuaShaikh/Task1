<?php
error_reporting(E_ALL);
session_start();

include_once 'db_config.php';
if (isset($_GET['function'])) {
    $_GET['function']($conn);
} elseif(isset($_POST['function'])) {
    $_POST['function']($conn);
  
} 



function submitForm($conn) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $interval = $_POST['interval'];
    $count = $_POST['count'] ?? 0;
    $compute = $_POST['compute'];
    $override = $_POST['override'] ?? 0;
    $confidential = $_POST['confidential'] ?? 0;
    $lookback = $_POST['lookback'];
    $deferralType = $_POST['deferralType'];

    $sql = "INSERT INTO deferral (`name`, `description`, `interval`, `count`, `compute`, `override`, `confidential`, `lookback`, `deferralType`)
    VALUES ('$name', '$description', '$interval', '$count', '$compute', '$override', '$confidential', '$lookback', '$deferralType')";

if ($conn->query($sql) === TRUE) {
    $_SESSION['success'] = "Record Inserted Successfully";
    header("location:table.php");
} else {
    echo "Error inserting record: " . mysqli_error($conn);
}
  mysqli_close($conn);
}


function retrivedData($conn, $limit) {
    $page = $_GET['page'] ?? 1;
    $offset = ($page - 1)*$limit;
    $sql = "SELECT * FROM deferral ORDER BY id DESC LIMIT {$offset},{$limit}";
    $result = $conn->query($sql);


    $sql = "SELECT count('id') as count FROM deferral";
    $count = $conn->query($sql);
    // if ($conn->query($sql) === TRUE) {
    //     echo "New record created successfully";
    // } 
    mysqli_close($conn);

    return ["data" => $result, "count" => $count];
}



function deleteData($conn){

    $id =  $_GET["id"];

    $sql = "DELETE FROM deferral WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = "Record Deleted Successfully";
        header("location:table.php");
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
    mysqli_close($conn);
    
}

function show($conn){
    $id = $_GET['id']; 
    $sql = mysqli_query($conn,"SELECT * FROM deferral WHERE id='$id'");
    $_SESSION['deferral'] =  $sql->fetch_object();
    header("location:update.php");
}

function update($conn){
    $id = $_POST['id']; 
   
    $name = $_POST['name'];
    $description = $_POST['description'];
    $interval = $_POST['interval'];
    $count = $_POST['count'] ?? 0;
    $compute = $_POST['compute'];
    $override = $_POST['override'] ?? 0;
    $confidential = $_POST['confidential'] ?? 0;
    $lookback = $_POST['lookback'];
    $deferralType = $_POST['deferralType'];
	
    $update ="UPDATE deferral SET `name`='{$name}', `description`='{$description}', `interval`='{$interval}', `count`='{$count}', `compute`='{$compute}', `override`='{$override}', 
    confidentia`l`='{$confidential}', `lookback`='{$lookback}', `deferralType`='{$deferralType}'  WHERE `id`='{$id}'";
	print_r($update);
    $result=mysqli_query($conn,$update) or die("failed to update");

    // print_r($result);
    // die();
    if($result){
        $_SESSION['success'] = "Record updated Successfully";
       header("location:table.php");
    } else {
        die('Failed to update');
    }
    
    
    
    mysqli_close($conn);
}

 function duplicateData($conn){
    $id =  $_GET["id"];
    $sql = "INSERT INTO deferral (`name`, `description`, `interval`, `count`, `compute`, `override`, `confidential`, `lookback`, `deferralType`)
    SELECT `name`, `description`, `interval`, `count`, `compute`, `override`, `confidential`, `lookback`, `deferralType` FROM deferral WHERE id = '$id'";
    $result = mysqli_query($conn,$sql);
    if($result){
        $_SESSION['success'] = "Record Duplicated Successfully";
        header("location:table.php");
     } else {
         die('Failed to update');
     }
     
     
     
     mysqli_close($conn);
    
 
 }
 

?>


