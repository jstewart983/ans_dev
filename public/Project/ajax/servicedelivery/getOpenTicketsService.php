<?php

require('../../config/config.php');
$title = "Open Tickets";
$description = "This represents a count of tickets currently open on all boards managed by the Service Delivery Team.  This includes Scheduled Maintenance tickets.";
$datasource = "Connectwise";
$actual_link = $_SERVER['HTTP_REFERER'];
$path = parse_url($actual_link,PHP_URL_PATH);
//$path = strstr($path,"/service_delivery");
//echo $path;
if (strpos($path,'results') !== false) {

$query = 'select Count(*) as openTickets
from dbo.SR_Service
LEFT OUTER JOIN dbo.SR_Board on dbo.SR_Service.SR_Board_RecID = dbo.SR_Board.SR_Board_RecID
left outer join company on company.company_recid = sr_service.company_recid
left outer join sr_status on sr_service.sr_status_recid = sr_status.sr_status_recid

where company_name = "Results Physiotherapy" and sr_status.description <> "Closed" and sr_status.description <> "Canceled" and sr_status.description <> "Closed - First Call" and sr_service.date_closed is null';


}else{

  $query = 'select Count(*) as openTickets
  from dbo.SR_Service
  LEFT OUTER JOIN dbo.SR_Board on dbo.SR_Service.SR_Board_RecID = dbo.SR_Board.SR_Board_RecID
  left outer join sr_status on sr_service.sr_status_recid = sr_status.sr_status_recid
  where (sr_status.description <> "Closed" and sr_status.description <> "Canceled" and sr_status.description <> "Closed - First Call") and (dbo.SR_Board.Board_Name = "My Company/Service" or dbo.SR_Board.Board_Name = "Alerts - Service Delivery" or dbo.SR_Board.Board_Name = "Results Physiotherapy" or dbo.SR_Board.Board_Name="Results - Initiatives") and sr_service.date_closed is null';


}

$openTickets = mssql_query($query);
$query1 = str_replace('"', "", $query);


// fetch all rows from the query
$all_rows = array();
while($row = mssql_fetch_assoc($openTickets)) {
  $row["Title"] =$title;
  $row["Description"] = $description;
  $row["Query"] = $query1;
  $row["Datasource"] = $datasource;
    $all_rows []= $row;

}

header("Content-Type: application/json");
echo json_encode($all_rows);


?>
