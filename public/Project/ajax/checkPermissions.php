<?php
session_start();
include('../config/userconfig.php');



if (in_array('super admin',$_SESSION['fox'])){
echo 1;
}else{
  echo 0;
}

 //echo $query;


//$results=mysqli_query($con,$query);

//$count = mysqli_num_rows($result);

//$all_rows = array();

//while($row = mysqli_fetch_assoc($results)){
  //print_r($row);
  //$all_rows [] = $row;
//}




/*header("Content-Type: application/json");
echo json_encode($all_rows);
mysqli_close($con);*/


?>
