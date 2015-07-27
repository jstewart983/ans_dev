<?php

error_reporting(-1);
ini_set('display_errors', 'On');
require('../../config/config.php');

if(isset($_GET['range1']) && isset($_GET['range2'])){

$sitename = $_GET['site'];
$range1 = $_GET['range1'];
$range2 = $_GET['range2'];

$query = 'select SR_Type.Description as type,sr_service.email_address,sr_service_calculated.nextscheduledate,sr_service_calculated.resourcelist, case sr_service.date_closed when null then DATEDIFF(DAY, sr_service.date_entered, getdate()) else DATEDIFF(DAY, sr_service.date_entered, sr_service.date_closed) end as daysOpen,sr_service.sr_service_recid,sr_status.description as status, sr_service.date_entered,sr_urgency.description as urgency,sr_service.summary
  from sr_service
	left outer join sr_type on sr_type.sr_type_recid = sr_service.sr_type_recid
	left outer join sr_urgency on sr_urgency.sr_urgency_recid = sr_service.sr_urgency_recid
	left outer join sr_board on sr_board.sr_board_recid = sr_service.sr_board_recid
	left outer join sr_status on sr_status.sr_status_recid  = sr_service.sr_status_recid
  left outer join sr_service_calculated on sr_service.sr_service_recid = sr_service_calculated.sr_service_recid
  left outer join company on sr_service.company_recid = company.company_recid
  where sr_service.site_name = "'.$sitename.'" and company.company_name = "Results Physiotherapy" and (dbo.SR_Service.Date_Entered >="'.$range1.'" and dbo.SR_Service.Date_Entered <= "'.$range2.'")
and
(sr_type.description = "Hardware" or sr_type.description = "Internet" or sr_type.description = "Monitoring Alerts" or
  sr_type.description = "Network" or sr_type.description = "Phone/Fax" 
  or sr_type.description = "Wireless" or sr_type.description = "Workstation")
  order by sr_service.date_entered desc';
}else{
    	$sitename = $_GET['site'];
      $query = 'select SR_Type.Description as type,sr_service.email_address,sr_service_calculated.nextscheduledate,sr_service_calculated.resourcelist, case sr_service.date_closed when null then DATEDIFF(DAY, sr_service.date_entered, getdate()) else DATEDIFF(DAY, sr_service.date_entered, sr_service.date_closed) end as daysOpen,sr_service.sr_service_recid,sr_status.description as status, sr_service.date_entered,sr_urgency.description as urgency,sr_service.summary
        from sr_service
	left outer join sr_type on sr_type.sr_type_recid = sr_service.sr_type_recid
	left outer join sr_urgency on sr_urgency.sr_urgency_recid = sr_service.sr_urgency_recid
	left outer join sr_board on sr_board.sr_board_recid = sr_service.sr_board_recid
	left outer join sr_status on sr_status.sr_status_recid  = sr_service.sr_status_recid
  left outer join sr_service_calculated on sr_service.sr_service_recid = sr_service_calculated.sr_service_recid
  left outer join company on sr_service.company_recid = company.company_recid
  where sr_service.site_name = "'.$sitename.'" and company.company_name = "Results Physiotherapy" and DATEDIFF( ww, dbo.SR_Service.Date_Entered, GETDATE() ) = 4
and
(sr_type.description = "Hardware" or sr_type.description = "Internet" or sr_type.description = "Monitoring Alerts" or
  sr_type.description = "Network" or sr_type.description = "Phone/Fax"
  or sr_type.description = "Wireless" or sr_type.description = "Workstation")
  order by sr_service.date_entered desc';
}







$openTickets = mssql_query($query);


$all_rows = [];

while($row = mssql_fetch_array($openTickets)) {


if($row['nextscheduledate'] !== null){
	//$dates = explode(" ",$row['nextscheduledate']);
	$output = $row['nextscheduledate'];
}else{
	$output = "N/A";
}
if($row['resourcelist'] !== null){
	//$dates = explode(" ",$row['resourcelist']);
	$output2 = $row['resourcelist'];
}else{
	$output2 = "N/A";
}
$all_rows [] = [$row['sr_service_recid'],$row['type'],strtok($row['email_address'], '@'),$row['status'],$output2,$row['summary'],$output,"<a href='#' data-toggle='tooltip2' title='If the ticket is open then this value is the running total. If the ticket is closed then this value is the amount of days it was open until it closed.'>".$row['daysOpen']."</a>"];




}


header("Content-Type: application/json");
echo json_encode($all_rows);

?>
