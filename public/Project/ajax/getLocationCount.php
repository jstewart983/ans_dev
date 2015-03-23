<?php
require('../lconfig.php');

if(isset($_GET['company'])){

$company = $_GET['company'];

$query = 'SELECT clients.company,count(locationID) as locationCount FROM locations left outer join clients on clients.ClientID = locations.ClientID where clients.Company="'.$company.'"
';
}else{

  $query = 'SELECT clients.company,count(locationID) as locationCount FROM locations left outer join clients on clients.ClientID = locations.ClientID where clients.Company!="Advanced Network Solutions"';
}



$results=mysqli_query($con,$query);


$all_rows = array();
$row = mysqli_fetch_assoc($results);
$all_rows [] = $row;


header("Content-Type: application/json");
echo json_encode($all_rows);


?>
