<?php
error_reporting(-1);
ini_set('display_errors', 'On');
include('../../config/userconfig.php');

if(isset($_GET['report_name'])){

  $name = $_GET['report_name'];
  $for = $_GET['report_for'];
  //$date = date('m/d/Y h:i:s a', time());

  $query = "INSERT INTO reports (report_name,report_for,report_generated) VALUES ('".$name."','".$for."',CURDATE())";

$results=mysqli_query($con,$query);

if($results){
  echo 201;
}else{
  echo 500;
}
}



?>
