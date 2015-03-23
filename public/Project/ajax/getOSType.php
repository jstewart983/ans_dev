<?php
require('../lconfig.php');

if(isset($_GET['company'])){
$company = $_GET['company'];
$query = 'SELECT OS, COUNT(OS) as osCount  FROM computers left outer join clients on clients.ClientID = computers.ClientID where clients.Company="'.$company.'"
group by OS';
}else{

  $query = 'SELECT OS, COUNT(OS) as osCount  FROM computers left outer join clients on clients.ClientID = computers.ClientID where clients.Company !="Advanced Network Solutions"
  group by OS limit 10';
}



$results=mysqli_query($con,$query);


$all_rows = array();

while($row = mysqli_fetch_array($results)){
  //print_r($row);
  $all_rows [] = $row;
}




header("Content-Type: application/json");
echo json_encode($all_rows);



?>
