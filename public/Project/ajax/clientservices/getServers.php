<?php
require('../../lconfig.php');

if(isset($_GET['company'])){
$company = $_GET['company'];

$query = 'SELECT COUNT(ComputerID) AS servers FROM computers left outer join clients on clients.ClientID = computers.ClientID where OS like "%server%" and clients.Company="'.$company.'" ';

}else{

$query = 'SELECT COUNT(ComputerID) AS servers FROM computers left outer join clients on clients.ClientID = computers.ClientID where OS like "%server%" and clients.Company !="Advanced Network Solutions" ';
}
$results=mysqli_query($con,$query);


$all_rows = array();
$row = mysqli_fetch_assoc($results);
$all_rows [] = $row;


header("Content-Type: application/json");
echo json_encode($all_rows);
mysqli_close($con);



?>
