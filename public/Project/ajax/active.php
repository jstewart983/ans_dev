<?php
//error_reporting(E_ALL);
//init_set('display_errors','On');

include('../config/userconfig.php');

$flag = $_GET['flag'];
$user = $_GET['user'];


$query = "UPDATE users set active_flag='".$flag."' WHERE user_id ='".$user."'";
//echo $company;



 //echo $query;


$results=mysqli_query($con,$query);
if(!$results){
  echo mysqli_error($con)." - basically what I am saying is fail";
}

/*$all_rows = array();

while($row = mysqli_fetch_assoc($results)){
  //print_r($row);
  $all_rows [] = $row;
}*/




//header("Content-Type: application/json");
//echo json_encode($all_rows);
mysqli_close($con);


?>
