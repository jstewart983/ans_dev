<?php
error_reporting(-1);
ini_set('display_errors', 'On');
include('../config/userconfig.php');

if(isset($_GET['member'])){

  $name = $_GET['member'];
  $company = $_GET['company'];
  $in_out = $_GET['in_out'];
  $bar_code = $_GET['bar_code'];
  //$date = date('m/d/Y h:i:s a', time());

  $query = "INSERT INTO item (member_id,company_name,in_out,bar_code,date_stamp) VALUES ('".$name."','".$company."','".$in_out."','".$bar_code."',NOW())";

$results=mysqli_query($con,$query);

if($results){
  echo 201;
}else{
  echo 500;
}
}



?>
