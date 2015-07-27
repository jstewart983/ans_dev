<?php
include('../config/userconfig.php');


//echo $company;
$query = 'SELECT * from user_groups';


 //echo $query;


$results=mysqli_query($con,$query);


$all_rows = array();

while($row = mysqli_fetch_assoc($results)){
  //print_r($row);
  $all_rows [] = $row;
}




header("Content-Type: application/json");
echo json_encode($all_rows);
mysqli_close($con);


?>
