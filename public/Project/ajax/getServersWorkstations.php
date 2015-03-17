<?php
require('../lconfig.php');



$query = 'select
(SELECT distinct COUNT(*) FROM computers left outer join clients on clients.ClientID = computers.ClientID where OS not like "%server%" and clients.Company !="Advanced Network Solutions" limit 1) as workStations,
(SELECT distinct COUNT(*) FROM computers left outer join clients on clients.ClientID = computers.ClientID where OS like "%server%" and clients.Company !="Advanced Network Solutions" limit 1) as servers

from computers
 

limit 1';

$results=mysqli_query($con,$query);


$all_rows = array();
$row = mysqli_fetch_assoc($results);
$all_rows [] = $row;


header("Content-Type: application/json");
echo json_encode($all_rows);



?>