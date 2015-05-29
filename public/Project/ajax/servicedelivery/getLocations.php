<?php
error_reporting(-1);
ini_set('display_errors', 'On');
require('../../config/config.php');

//$title = "Closed First Call % - This Wk";
//$description = "This represents the percentage of tickets that were closed on the first call this week on all boards managed by the Service Delivery Team, excluding Saturday and Sunday. (CFC% = Count of Closed First Call/Total Closed)";
//$datasource = "Connectwise";
//$path = parse_url($actual_link,PHP_URL_PATH);
//$path = strstr($path,"/service_delivery");
//echo $path;
$query = 'SELECT description from sr_location';

$openTickets = mssql_query($query);


// fetch all rows from the query
$all_rows = array();
while($row = mssql_fetch_assoc($openTickets)) {

    $all_rows []= $row;
}

header("Content-Type: application/json");
echo json_encode($all_rows);
?>
