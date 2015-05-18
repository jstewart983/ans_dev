<?php

require('../../config/config.php');
$title = "New Tickets vs Tickets Closed - This Wk";
$datasource = "Connectwise";
$description = "This represents the count of tickets opened and closed by day (by Service Delivery), this week";
$actual_link = $_SERVER['HTTP_REFERER'];
$path = parse_url($actual_link,PHP_URL_PATH);
//$path = strstr($path,"/service_delivery");
//echo $path;
if (strpos($path,'results') !== false) {
$query = 'select
datename(DW,CONVERT(date,dbo.sr_service.date_entered)) as Week_Day, COUNT(distinct(dbo.sr_service.date_entered))as Opened_Tickets
from dbo.SR_Service left outer join dbo.sr_board on dbo.sr_service.sr_board_recid = dbo.sr_board.sr_board_recid
left outer join company on company.company_recid = sr_service.company_recid
where company.company_name = "Results Physiotherapy" and DATEDIFF( ww, dbo.SR_Service.Date_Entered, GETDATE() ) = 0

group by convert(date,dbo.sr_service.Date_Entered)';
}else{

  $query = 'select
  datename(DW,CONVERT(date,dbo.sr_service.date_entered)) as Week_Day, COUNT(distinct(dbo.sr_service.date_entered))as Opened_Tickets
  from dbo.SR_Service left outer join dbo.sr_board on dbo.sr_service.sr_board_recid = dbo.sr_board.sr_board_recid
  where datename(dw,convert(date,dbo.sr_service.Date_Entered)) <> "Saturday"
  and datename(dw,convert(date,dbo.sr_service.Date_Entered)) <> "Sunday" and (board_name = "My Company/Service" or board_name = "Alerts - Service Delivery" or board_name = "Results Physiotherapy") and DATEDIFF( ww, dbo.SR_Service.Date_Entered, GETDATE() ) = 0

  group by convert(date,dbo.sr_service.Date_Entered)';

}

$openTickets = mssql_query($query);

$query1 = str_replace('"',"",$query);


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
