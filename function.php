<?php
error_reporting(E_ALL);
session_start();

include_once 'db_config.php';

if (isset($_GET['function'])) {
    // print_r($_GET['function']);
    // exit();
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


function retrivedData($conn, $limit = 10) {
    $page = $_GET['page'] ?? 1;
    $offset = ($page - 1)*$limit;
if(isset($_GET["search"])) {
	$search = ($_GET["search"]);
    print_r($search);
    $sql = "SELECT * FROM deferral WHERE 'name' LIKE '%$search%' LIMIT {$offset},{$limit}  ";
    // print_r($sql);
} else {
    $sql = "SELECT * FROM deferral ORDER BY id DESC LIMIT {$offset},{$limit}";  
}

$result = $conn->query($sql) or die('failed');

// print_r($result);
    
    $sql = "SELECT count('id') as count FROM deferral";
    $count = $conn->query($sql) or die('failed') ;
    
//     $sql = "SELECT * FROM deferral WHERE 'name' LIKE '%" . $_POST["search"] ."%'";
//     $data= $conn->query($sql) or die('Failed');
//     print_r($sql);

//     $output = '';
//     if (mysqli_num_rows($result) > 0) {
//         $ouput .= '
//         <table class="table table-striped table-borderless" >
//         <thead>
//         <tr style="font-family: monospace; font-size: 12px">
//           <th scope="col" >Name</th>
//           <th scope="col">Discription</th>
//           <th scope="col">Associated Profile</th>
//           <th scope="col" colspan="3"> Actions</th>
//         </tr>
//         </thead>
//       <tbody id="table_data">';
//        $i=0;
//         while ($row = mysqli_fetch_array($result)) {
//             $output .= '<tr>
//     <td>' . $row['name'] . '</td>
//     <td>' . $row['description'] . '</td>
    
//   </tr>
//    </tbody>
//    </table>
//   ';
//     $i++;
//         }
//     } else {
//         $output = '
//   <tr>
//     <td colspan="4"> No result found. </td>   
//   </tr>';
//     }

//     echo $output;

    
//     print_r($data);

    mysqli_close($conn);

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


