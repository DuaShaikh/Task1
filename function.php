<?php
error_reporting(E_ALL);
session_start();

include_once 'db_config.php';

if (isset($_GET['function'])) {
    // print_r($_GET['function']);
    // exit();
    $_GET['function']($conn);
   
} elseif (isset($_POST['function'])) {
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


function retrivedData($conn, $limit = 10) {
    $page = $_GET['page'] ?? 1;
    $offset = ($page - 1)*$limit;
    $search='';
if(isset($_GET["search"])) {
	$search = ($_GET["search"]);
}
    $sql = "SELECT * FROM deferral WHERE `name` LIKE '%$search%' OR `description` LIKE '%$search%' ORDER BY id DESC LIMIT {$offset},{$limit}  ";
    $result = $conn->query($sql);
    $sql = "SELECT count('id') as count FROM deferral WHERE `name` LIKE '%$search%' OR `description` LIKE '%$search%'";
    $count = $conn->query($sql) or die('failed') ;

    mysqli_close($conn);

    if ($_GET['search']) {
        // print_r($result->fetch_assoc());
        echo json_encode(["data" => $result->fetch_all(MYSQLI_ASSOC), "count" => $count->fetch_object(), "currentPage" => $page]);
        // die;
    }
    
    return ["data" => $result, "count" => $count, "currentPage" => $page];

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
	
    $sql ="UPDATE deferral SET `name`='{$name}', `description`='{$description}', `interval`='{$interval}', `count`='{$count}', `compute`='{$compute}', `override`='{$override}', 
    `confidential`='{$confidential}', `lookback`='{$lookback}', `deferralType`='{$deferralType}'  WHERE `id`='{$id}'";
    if ($conn->query($sql) === TRUE) {
    $_SESSION['success'] = "Record Updated Successfully";
    header("location:table.php");
    } else {
    echo "Error updating record: " . mysqli_error($conn);
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


