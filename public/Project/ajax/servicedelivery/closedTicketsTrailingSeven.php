<?php

require('../../config.php');
$title = "New Tickets vs Tickets Closed - Last 5 days";
$datasource = "Connectwise";
$description = "This represents the count of tickets created and closed by day, in the last 5 days";
$actual_link = $_SERVER['HTTP_REFERER'];
$path = parse_url($actual_link,PHP_URL_PATH);
//$path = strstr($path,"/service_delivery");
//echo $path;
if (strpos($path,'results') !== false) {
$query = 'select
datename(DW,CONVERT(date,dbo.sr_service.Date_Closed)) as Week_Day, COUNT(distinct(sr_service.Date_Closed)) as Closed_Tickets
from dbo.SR_Service left outer join dbo.sr_board on dbo.sr_service.sr_board_recid = dbo.sr_board.sr_board_recid
left outer join company on company.company_recid = sr_service.company_recid
where company.company_name = "Results Physiotherapy" and convert(date,dbo.sr_service.Date_Closed) >= convert(date,GETDATE()-7)
and CONVERT(date,dbo.sr_service.Date_Closed) <> CONVERT(date,getdate())
and datename(dw,convert(date,dbo.sr_service.Date_Closed)) <> "Saturday"
and datename(dw,convert(date,dbo.sr_service.Date_Closed)) <> "Sunday"
group by convert(date,dbo.sr_service.Date_Closed)';
}else{

  $query = 'select
  datename(DW,CONVERT(date,dbo.sr_service.Date_Closed)) as Week_Day, COUNT(distinct(sr_service.Date_Closed)) as Closed_Tickets
  from dbo.SR_Service left outer join dbo.sr_board on dbo.sr_service.sr_board_recid = dbo.sr_board.sr_board_recid
  where (board_name = "My Company/Service" or board_name = "Alerts - Service Delivery") and convert(date,dbo.sr_service.Date_Closed) >= convert(date,GETDATE()-7)
  and CONVERT(date,dbo.sr_service.Date_Closed) <> CONVERT(date,getdate())
  and datename(dw,convert(date,dbo.sr_service.Date_Closed)) <> "Saturday"
  and datename(dw,convert(date,dbo.sr_service.Date_Closed)) <> "Sunday"
  group by convert(date,dbo.sr_service.Date_Closed)';

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
