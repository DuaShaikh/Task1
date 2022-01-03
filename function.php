<?php
error_reporting(E_ALL);

include_once 'db_config.php';

if (isset($_GET['function'])) {
    $_GET['function']($conn);
} elseif(isset($_POST['functon'])) {
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
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  mysqli_close($conn);
}


function retrivedData($conn) {
    $limit = 4;
    // $page = $_GET['page'];
    $offset = (1 - 1)*$limit;
    $sql = "SELECT * FROM deferral ORDER BY id DESC LIMIT {$offset},{$limit}";
    $result = $conn->query($sql);
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
      } 
    mysqli_close($conn);

    return $result;
}



function deleteData($conn){

    $id =  $_GET["id"];

    $sql = "DELETE FROM deferral WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
        session_start();
        $_SESSION['success'] = "Record Deleted Successfully";
        header("location:table.php");
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
    mysqli_close($conn);
    
}

?>