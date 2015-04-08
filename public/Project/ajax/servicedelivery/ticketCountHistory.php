<?php

require('../../config.php');
$actual_link = $_SERVER['HTTP_REFERER'];
$path = parse_url($actual_link,PHP_URL_PATH);
//$path = strstr($path,"/service_delivery");
//echo $path;
if (strpos($path,'results') !== false) {

$ticketsClosed = mssql_query('select year(sr_service.Date_Entered) as year,month(sr_service.Date_Entered) as month,COUNT(distinct(sr_service.Date_Entered)) as Tickets,
COUNT(distinct(sr_service.Date_Closed)) as Closed
from dbo.SR_Service
left outer join dbo.sr_board on dbo.sr_service.sr_board_recid = dbo.sr_board.sr_board_recid
left outer join company on company.company_recid = sr_service.company_recid
where company.company_name = "Results Physiotherapy"  and (convert(char(6), sr_service.Date_Entered, 112) <> convert(char(6), getdate(), 112) and year(sr_service.Date_Entered) > year(getdate())-2)
group by month(sr_service.Date_Entered),year(sr_service.Date_Entered)
order by year(sr_service.Date_Entered), month(sr_service.Date_Entered)');
}else{

  $ticketsClosed = mssql_query('select year(sr_service.Date_Entered) as year,month(sr_service.Date_Entered) as month,COUNT(distinct(sr_service.Date_Entered)) as Tickets,
  COUNT(distinct(sr_service.Date_Closed)) as Closed
  from dbo.SR_Service left outer join dbo.sr_board on dbo.sr_service.sr_board_recid = dbo.sr_board.sr_board_recid
  where  (convert(char(6), sr_service.Date_Entered, 112) <> convert(char(6), getdate(), 112) and year(sr_service.Date_Entered) > year(getdate())-2)
  group by month(sr_service.Date_Entered),year(sr_service.Date_Entered)
  order by year(sr_service.Date_Entered), month(sr_service.Date_Entered)');
}
if(!$ticketsClosed){
  die("Error: ".mssql_get_last_message());
}


// fetch all rows from the query
$all_rows = array();
while($row = mssql_fetch_assoc($ticketsClosed)) {
    $all_rows []= $row;
}

header("Content-Type: application/json");
echo json_encode($all_rows);
?>
