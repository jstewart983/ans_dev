<?php

require('../../config.php');
$actual_link = $_SERVER['HTTP_REFERER'];
$title = "Closed First Call %";
$description = "This represents the percentage of tickets that were closed on the first call in the past 7 days on all boards managed by the Service Delivery Team, excluding Saturday and Sunday. (CFC% = Count of Closed First Call/Total Closed)";
$datasource = "Connectwise";
$path = parse_url($actual_link,PHP_URL_PATH);
//$path = strstr($path,"/service_delivery");
//echo $path;
if (strpos($path,'results') !== false) {

$query = 'select
(cast((select count(*)
from dbo.SR_Service left outer join
dbo.sr_status on dbo.sr_service.sr_status_recid = dbo.sr_status.sr_status_recid
left outer join company on company.company_recid = sr_service.company_recid
where convert(date,dbo.sr_service.Date_Closed) >= convert(date,GETDATE()-7)
and CONVERT(date,dbo.sr_service.Date_Closed) <> CONVERT(date,getdate())
and datename(dw,convert(date,dbo.sr_service.Date_Closed)) <> "Saturday"
and datename(dw,convert(date,dbo.sr_service.Date_Closed)) <> "Sunday" and company_name = "Results Physiotherapy" and dbo.sr_status.description = "Closed - First Call")as float)/
(select count(*)
from dbo.sr_service left outer join
dbo.sr_status on dbo.sr_service.sr_status_recid = dbo.sr_status.sr_status_recid
left outer join company on company.company_recid = sr_service.company_recid
where convert(date,dbo.sr_service.Date_Closed) >= convert(date,GETDATE()-7)
and CONVERT(date,dbo.sr_service.Date_Closed) <> CONVERT(date,getdate())
and datename(dw,convert(date,dbo.sr_service.Date_Closed)) <> "Saturday"
and datename(dw,convert(date,dbo.sr_service.Date_Closed)) <> "Sunday" and company.company_name = "Results Physiotherapy" and (dbo.SR_Service.SR_Board_RecID = 1 or dbo.SR_Service.SR_Board_RecID = 30 or
dbo.SR_Service.SR_Board_RecID = 35 or dbo.SR_Service.SR_Board_RecID = 36 or dbo.SR_Service.SR_Board_RecID = 41)))
as CFC';

}else{


  $query = 'select
  (cast((select count(*)
  from dbo.SR_Service left outer join
  dbo.sr_status on dbo.sr_service.sr_status_recid = dbo.sr_status.sr_status_recid

  where convert(date,dbo.sr_service.Date_Closed) >= convert(date,GETDATE()-7)
  and CONVERT(date,dbo.sr_service.Date_Closed) <> CONVERT(date,getdate())
  and dbo.sr_status.description = "Closed - First Call")as float)/
  (select count(*)
  from dbo.sr_service left outer join
  dbo.sr_status on dbo.sr_service.sr_status_recid = dbo.sr_status.sr_status_recid

  where convert(date,dbo.sr_service.Date_Closed) >= convert(date,GETDATE()-7)
  and CONVERT(date,dbo.sr_service.Date_Closed) <> CONVERT(date,getdate())
  and datename(dw,convert(date,dbo.sr_service.Date_Closed)) <> "Saturday"
  and datename(dw,convert(date,dbo.sr_service.Date_Closed)) <> "Sunday" and (dbo.SR_Service.SR_Board_RecID = 1 or dbo.SR_Service.SR_Board_RecID = 30 or
  dbo.SR_Service.SR_Board_RecID = 35 or dbo.SR_Service.SR_Board_RecID = 36)))
  as CFC';

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
