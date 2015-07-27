<?php
//error_reporting(E_ALL);
//init_set('display_errors','On');

include('../config/userconfig.php');

$permission = $_GET['permission'];
$user = $_GET['user'];
$delete = $_GET['delete'];
if($delete == "true"){
  $query = "DELETE FROM user_permissions where user_group_ID = '".$permission."' AND user_id = '".$user."'";
}else{
  $query = "REPLACE INTO user_permissions (user_group_ID,user_id) values('".$permission."','".$user."')";
}
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
