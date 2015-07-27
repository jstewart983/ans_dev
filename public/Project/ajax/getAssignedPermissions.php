<?php


if(isset($_GET['user'])){
  include('../config/userconfig.php');
  $user = $_GET['user'];
  $query = 'SELECT * from user_groups
  left outer join user_permissions on user_groups.user_group_id = user_permissions.user_group_id
   where user_permissions.user_id = "'.$user.'"';
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
}






?>
