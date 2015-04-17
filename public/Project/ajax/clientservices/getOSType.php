<?php
include('../../config/lconfig.php');

if(isset($_GET['company'])){
  //echo $_GET['company'];
$company = $_GET['company'];
$company = urldecode($company);

//echo $company;
$query = 'SELECT OS, COUNT(ComputerId) as osCount  FROM computers left outer join clients on computers.ClientID = clients.ClientID   where clients.Company="'.$company.'"
GROUP BY OS
ORDER BY COUNT(ComputerId) DESC
LIMIT 10';
}else{

  $query = 'SELECT  OS, COUNT(ComputerId) as osCount  FROM computers left outer join clients on computers.ClientID = clients.ClientID   where clients.Company !="Advanced Network Solutions"
  group by OS
  ORDER BY COUNT(ComputerId) DESC
  LIMIT 10';
}
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
