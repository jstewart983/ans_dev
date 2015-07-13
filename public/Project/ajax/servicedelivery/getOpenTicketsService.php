<?php
error_reporting(-1);
ini_set('display_errors', 'On');
require('../../config/config.php');
$title = "Tickets Opened - This Wk";
$description = "This represents a count of tickets that have been opened this week on boards managed by Service Delivery.";
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

where company_name = "Results Physiotherapy" and sr_status.description <> "Closed" and sr_status.description <> "Cancelled" and sr_status.description <> "Closed - First Call" and sr_service.date_closed is null';

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

}elseif(strpos($path,'managedservices') !== false){

  $description = "This represents a count of tickets currently open on all boards managed by the Managed Services Team.";

  $query = 'select Count(*) as openTickets
  from dbo.SR_Service
  LEFT OUTER JOIN dbo.SR_Board on dbo.SR_Service.SR_Board_RecID = dbo.SR_Board.SR_Board_RecID
  left outer join sr_status on sr_service.sr_status_recid = sr_status.sr_status_recid
  where (sr_status.description <> "Closed" and sr_status.description <> "Cancelled" and sr_status.description <> "Closed - First Call") and (dbo.SR_Board.Board_Name = "BackOffice" or dbo.SR_Board.Board_Name = "Managed Services Requests" or dbo.SR_Board.Board_Name = "" or dbo.SR_Board.Board_Name="LogicMonitor") and sr_service.date_closed is null';

  $query2 = 'select Count(*) as openTickets, sr_board.board_name
  from dbo.SR_Service
  LEFT OUTER JOIN dbo.SR_Board on dbo.SR_Service.SR_Board_RecID = dbo.SR_Board.SR_Board_RecID
  left outer join sr_status on sr_service.sr_status_recid = sr_status.sr_status_recid
  where (sr_status.description <> "Closed" and sr_status.description <> "Cancelled" and sr_status.description <> "Closed - First Call") and (dbo.SR_Board.Board_Name = "BackOffice" or dbo.SR_Board.Board_Name = "Managed Services Requests" or dbo.SR_Board.Board_Name = "" or dbo.SR_Board.Board_Name="LogicMonitor") and sr_service.date_closed is null
  group by sr_board.board_name';

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

}elseif(strpos($path,'fieldservices') !== false){

  $description = "This represents a count of tickets currently open on all boards managed by the Field Services Team.  This includes Scheduled Maintenance tickets.";

  $query = 'select Count(*) as openTickets
  from dbo.SR_Service
  LEFT OUTER JOIN dbo.SR_Board on dbo.SR_Service.SR_Board_RecID = dbo.SR_Board.SR_Board_RecID
  left outer join sr_status on sr_service.sr_status_recid = sr_status.sr_status_recid
  where (sr_status.description <> "Closed" and sr_status.description <> "cancelled" and sr_status.description <> "Closed - First Call") and (dbo.SR_Board.Board_Name = "My Company/Service" or dbo.SR_Board.Board_Name = "Results Physiotherapy" or dbo.SR_Board.Board_Name="Results - Initiatives") and sr_service.date_closed is null';
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

}
else{

  /*$query = 'select Count(*) as openTickets
  from dbo.SR_Service
  LEFT OUTER JOIN dbo.SR_Board on dbo.SR_Service.SR_Board_RecID = dbo.SR_Board.SR_Board_RecID
  left outer join sr_status on sr_service.sr_status_recid = sr_status.sr_status_recid
  where (sr_status.description <> "Closed" and sr_status.description <> "cancelled" and sr_status.description <> "Closed - First Call") and (dbo.SR_Board.Board_Name = "My Company/Service" or dbo.SR_Board.Board_Name = "Alerts - Service Delivery" or dbo.SR_Board.Board_Name = "Results Physiotherapy" or dbo.SR_Board.Board_Name="Results - Initiatives") and sr_service.date_closed is null';
  */
  $query='select  count(distinct(sr_service.sr_service_recid)) as openTickets
  from dbo.SR_Service
  LEFT OUTER JOIN dbo.SR_Board on dbo.SR_Service.SR_Board_RecID = dbo.SR_Board.SR_Board_RecID
  left outer join sr_status on sr_service.sr_status_recid = sr_status.sr_status_recid
  where (board_name = "My Company/Service" or board_name = "Alerts - Service Delivery" or board_name = "Results Physiotherapy") and DATEDIFF( ww, dbo.SR_Service.Date_Entered, GETDATE() ) = 0';

  $percentQuery = 'select  count(distinct(sr_service.sr_service_recid)) as ticketsClosed
  from dbo.SR_Service
  LEFT OUTER JOIN dbo.SR_Board on dbo.SR_Service.SR_Board_RecID = dbo.SR_Board.SR_Board_RecID
  left outer join sr_status on sr_service.sr_status_recid = sr_status.sr_status_recid
  left outer join member on member.member_id = sr_service.closed_by
  left outer join time_entry on SR_Service.sr_service_recid = time_entry.sr_service_recid
  where time_entry.Hours_Actual > 0 and dbo.member.Title like "%IT Support%" and (board_name = "My Company/Service" or board_name = "Alerts - Service Delivery" or board_name = "Results Physiotherapy") and DATEDIFF( ww, dbo.SR_Service.Date_Entered, GETDATE() ) = 0 and DATEDIFF( ww, dbo.SR_Service.Date_Closed, GETDATE() ) = 0';

  $aquery = 'SELECT datepart(wk,sr_service.date_closed) as weekNo,year(sr_service.date_closed) as year,COUNT(distinct(sr_service.sr_service_recid)) AS Count
    FROM SR_Service
    LEFT OUTER JOIN dbo.SR_Board on dbo.SR_Service.SR_Board_RecID = dbo.SR_Board.SR_Board_RecID
    left outer join member on member.member_id = sr_service.closed_by
    left outer join time_entry on SR_Service.sr_service_recid = time_entry.sr_service_recid
    where year(sr_service.date_closed) = year(getdate()) and time_entry.Hours_Actual > 0 and dbo.member.Title like "%IT Support%"
  GROUP BY datepart(wk,sr_service.date_closed),year(sr_service.date_closed)
  order by datepart(wk,sr_service.date_closed)';

  $avgQuery = mssql_query($aquery);

  $total = 0;
  $count = 0;

  while($avgClosed = mssql_fetch_assoc($avgQuery)){
    $count++;
    $total = $total + $avgClosed['Count'];
    //print_r($avgClosed);
  }

  $avg = $total / $count;

  $percent = mssql_query($percentQuery);
  $percentCount = mssql_fetch_assoc($percent);
  //$avgClosed = mssql_fetch_assoc($avgQuery);
  $openTickets = mssql_query($query);
  $query1 = str_replace('"', "", $query);



  // fetch all rows from the query
  $all_rows = array();
  while($row = mssql_fetch_assoc($openTickets)) {
    $row["Title"] =$title;
    $row["Description"] = $description;
    $row["Query"] = $query1;
    $row["Datasource"] = $datasource;
    $row['percent'] = $percentCount['ticketsClosed'];
    $row['avg'] = $avg;
      $all_rows []= $row;

  }
}




header("Content-Type: application/json");
echo json_encode($all_rows);


?>
