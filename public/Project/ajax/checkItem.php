<?php
error_reporting(-1);
ini_set('display_errors', 'On');
include('../config/userconfig.php');

if(isset($_GET['bar_code'])){


  $bar_code = $_GET['bar_code'];
  //$date = date('m/d/Y h:i:s a', time());

  $query = "SELECT * FROM item where bar_code = '".$bar_code."'";

$results=mysqli_query($con,$query);


  echo mysqli_num_rows($results);


}




?>
