<?php

require('../../config/config.php');
$title = "Tickets Closed - This Week";
$datasource = "Connectwise";
$description = "This represents a count of tickets closed by all members of the Service Delivery Team for the current week starting on Sunday.";
$actual_link = $_SERVER['HTTP_REFERER'];
$path = parse_url($actual_link,PHP_URL_PATH);
//$path = strstr($path,"/service_delivery");
//echo $path;
if (strpos($path,'desk') !== false) {

  $query = 'select COUNT(distinct(sr_service.Date_Closed)) as closedTickets
  from dbo.SR_Service left outer join dbo.sr_board on dbo.sr_service.sr_board_recid = dbo.sr_board.sr_board_recid
  left outer join member on member.member_id = sr_service.closed_by
  where (dbo.member.Title like "%IT Support%") and

  (board_name = "My Company/Service" or board_name = "Alerts - Service Delivery" or board_name = "Results Physiotherapy") and DATEDIFF( ww, sr_service.Date_Closed, GETDATE() ) = 0';

}elseif(strpos($path,'CIM') !== false){

  $query = 'select COUNT(distinct(sr_service.Date_Closed)) as closedTickets
  from dbo.SR_Service left outer join dbo.sr_board on dbo.sr_service.sr_board_recid = dbo.sr_board.sr_board_recid
  left outer join member on member.member_id = sr_service.closed_by
  where (dbo.member.Title like "%Client IT%" or dbo.member.Member_ID = "zhoover") and

  (board_name = "My Company/Service" or board_name = "Alerts - Service Delivery" or board_name = "Results Physiotherapy") and DATEDIFF( ww, sr_service.Date_Closed, GETDATE() ) = 0';

}elseif(strpos($path,'results') !== false){

  $query = 'select COUNT(distinct(sr_service.Date_Closed)) as closedTickets
  from dbo.SR_Service left outer join dbo.sr_board on dbo.sr_service.sr_board_recid = dbo.sr_board.sr_board_recid
  left outer join member on member.member_id = sr_service.closed_by
  left outer join company on company.company_recid = sr_service.company_recid
  where company_name = "Results Physiotherapy"

   and DATEDIFF( ww, sr_service.Date_Closed, GETDATE() ) = 0';


}else{

  $query = 'select COUNT(distinct(sr_service.Date_Closed)) as closedTickets
  from dbo.SR_Service left outer join dbo.sr_board on dbo.sr_service.sr_board_recid = dbo.sr_board.sr_board_recid
  left outer join member on member.member_id = sr_service.closed_by
  where
  (dbo.member.Title like "%IT Support%" or dbo.member.Title like "%Client IT%" or dbo.member.Member_ID = "zhoover") and year(sr_service.Date_Closed) - year(getdate()) = 0  and datepart(wk,sr_service.Date_Closed) = datepart(wk,getdate())';

}

$ticketsClosed = mssql_query($query);
$query1 = str_replace('"',"",$query);

// fetch all rows from the query
$all_rows = array();
while($row = mssql_fetch_assoc($ticketsClosed)) {
    $row["Title"] = $title;
    $row["Query"] = $query1;
    $row["Datasource"] = $datasource;
    $row["Description"] = $description;
    $all_rows []= $row;
}


header("Content-Type: application/json");
echo json_encode($all_rows);
//(dbo.Member.Member_id = "pfotineas" or
//dbo.Member.Member_id = "jsimpler" or
//dbo.Member.Member_id = "vhall")(board_name = "My Company/Service" or board_name = "Alerts - Service Delivery" or board_name = "Results Physiotherapy")
?>
