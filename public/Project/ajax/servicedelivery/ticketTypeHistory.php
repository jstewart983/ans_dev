<?php

require('../../config.php');
$title = "Tickets Open vs Tickets Closed - Last Year to Last Month";
$description ="This chart displays the number of tickets both created and completed as well as the number of billable hours worked, from last year to last month. The purpose of this chart is to display trends in work load. For example, when there is a significant gap between tickets created and tickets closed it may suggest that service delivery is overloaded.";
$datasource = "Connectwise";
$actual_link = $_SERVER['HTTP_REFERER'];
$path = parse_url($actual_link,PHP_URL_PATH);
//$path = strstr($path,"/service_delivery");
//echo $path;
if (strpos($path,'results') !== false) {

$query = 'select year(sr_service.Date_Entered) as year,month(sr_service.Date_Entered) as month,COUNT(distinct(sr_service.Date_Entered)) as Tickets,
COUNT(distinct(sr_service.Date_Closed)) as Closed
from dbo.SR_Service
left outer join dbo.sr_board on dbo.sr_service.sr_board_recid = dbo.sr_board.sr_board_recid
left outer join sr_type on sr_service.sr_type_recid = sr_type.sr_type_recid
left outer join company on company.company_recid = sr_service.company_recid
where sr_type.description = "Application" and company.company_name = "Results Physiotherapy"  and (convert(char(6), sr_service.Date_Entered, 112) <> convert(char(6), getdate(), 112) and year(sr_service.Date_Entered) > year(getdate())-2)
group by month(sr_service.Date_Entered),year(sr_service.Date_Entered)
order by year(sr_service.Date_Entered), month(sr_service.Date_Entered)';
}else{

if(isset($_GET['type'])){
  
  $query = 'select year(sr_service.Date_Entered) as year,month(sr_service.Date_Entered) as month,COUNT(distinct(sr_service.Date_Entered)) as Tickets,
  COUNT(distinct(sr_service.Date_Closed)) as Closed
  from dbo.SR_Service left outer join dbo.sr_board on dbo.sr_service.sr_board_recid = dbo.sr_board.sr_board_recid
  left outer join sr_type on sr_service.sr_type_recid = sr_type.sr_type_recid
  where sr_type.description="Scheduled Maintenance" and (convert(char(6), sr_service.Date_Entered, 112) <> convert(char(6), getdate(), 112) and year(sr_service.Date_Entered) > year(getdate())-2)
  group by month(sr_service.Date_Entered),year(sr_service.Date_Entered)
  order by year(sr_service.Date_Entered), month(sr_service.Date_Entered)';
}
  $query = 'select year(sr_service.Date_Entered) as year,month(sr_service.Date_Entered) as month,COUNT(distinct(sr_service.Date_Entered)) as Tickets,
  COUNT(distinct(sr_service.Date_Closed)) as Closed
  from dbo.SR_Service left outer join dbo.sr_board on dbo.sr_service.sr_board_recid = dbo.sr_board.sr_board_recid
  left outer join sr_type on sr_service.sr_type_recid = sr_type.sr_type_recid
  where sr_type.description="Scheduled Maintenance" and (convert(char(6), sr_service.Date_Entered, 112) <> convert(char(6), getdate(), 112) and year(sr_service.Date_Entered) > year(getdate())-2)
  group by month(sr_service.Date_Entered),year(sr_service.Date_Entered)
  order by year(sr_service.Date_Entered), month(sr_service.Date_Entered)';
}

$projectHours = mssql_query($query);
$query1 = str_replace('"',"",$query);
// fetch all rows from the query
$all_rows = array();
while($row = mssql_fetch_assoc($projectHours)) {

  $row["Title"] =$title;
  $row["Description"] = $description;
  $row["Query"] = $query1;
  $row["Datasource"] = $datasource;
  $all_rows []= $row;

}

header("Content-Type: application/json");
echo json_encode($all_rows);
?>
