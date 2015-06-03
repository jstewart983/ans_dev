<?php

require('../../config/config.php');
$title = "Open + Urgent Tickets";
$datasource = "Connectwise";
$description="This displays a table of tickets that are both open and urgent on the My Company/Service board or the Alerts - Service Delivery board";
$actual_link = $_SERVER['HTTP_REFERER'];
$path = parse_url($actual_link,PHP_URL_PATH);
//$path = strstr($path,"/service_delivery");
//echo $path;
if (strpos($path,'results') !== false) {
$query = 'select DATEDIFF(DAY, sr_service.date_entered, getdate()) as daysOpen,sr_service.sr_service_recid,sr_status.description as status, sr_service.date_entered,sr_urgency.description as urgency,sr_service.summary from sr_service
left outer join sr_type on sr_type.sr_type_recid = sr_service.sr_type_recid
left outer join sr_urgency on sr_urgency.sr_urgency_recid = sr_service.sr_urgency_recid
left outer join sr_board on sr_board.sr_board_recid = sr_service.sr_board_recid
left outer join sr_status on sr_status.sr_status_recid  = sr_service.sr_status_recid
left outer join company on company.company_recid = sr_service.company_recid
where company.company_name = "Results Physiotherapy" and sr_service.date_closed is null and (sr_urgency.sort_order = 2 or sr_urgency.sort_order = 1 or sr_urgency.sort_order = 100)
group by sr_service.sr_service_recid, sr_urgency.description,sr_service.summary,sr_urgency.sort_order,sr_service.date_entered,sr_status.description
order by sr_service.date_entered desc';
}
else if (strpos($path,'CIM') !== false) {
	$count = '';
	$title = "Tickets in CIM status";
	$datasource = "Connectwise";
	$description="This displays a table of tickets that are currently in the CIM status on any board";
	$header = "<h4 style='text-align:center;'>".$count." tickets are in CIM status</h4>";
	$query = 'select DATEDIFF(DAY, sr_service.date_entered, getdate()) as daysOpen,sr_service.sr_service_recid,sr_status.description as status, sr_service.date_entered,sr_urgency.description as urgency,sr_service.summary from sr_service
	left outer join sr_type on sr_type.sr_type_recid = sr_service.sr_type_recid
	left outer join sr_urgency on sr_urgency.sr_urgency_recid = sr_service.sr_urgency_recid
	left outer join sr_board on sr_board.sr_board_recid = sr_service.sr_board_recid
	left outer join sr_status on sr_status.sr_status_recid  = sr_service.sr_status_recid
	where (sr_status.description="CIM") and sr_service.date_closed is null
	group by sr_service.sr_service_recid, sr_urgency.description,sr_service.summary,sr_urgency.sort_order,sr_service.date_entered,sr_status.description
	order by sr_service.date_entered desc';

}else if (strpos($path,'fieldservices') !== false) {
	$count = '';
	$title = "Tickets in CIM status";
	$datasource = "Connectwise";
	$description="This displays a table of tickets that are currently in the CIM status on any board";
	$header = "<h4 style='text-align:center;'>".$count." tickets are in CIM status</h4>";
	$query = 'select DATEDIFF(DAY, sr_service.date_entered, getdate()) as daysOpen,sr_service.sr_service_recid,company.company_name as status, sr_service.date_entered,sr_urgency.description as urgency,sr_service.summary from sr_service
	left outer join sr_type on sr_type.sr_type_recid = sr_service.sr_type_recid
	left outer join sr_urgency on sr_urgency.sr_urgency_recid = sr_service.sr_urgency_recid
	left outer join sr_board on sr_board.sr_board_recid = sr_service.sr_board_recid
	left outer join sr_status on sr_status.sr_status_recid  = sr_service.sr_status_recid
	left outer join company on sr_service.company_recid = company.company_recid
	where (sr_status.description="CIM") and sr_service.date_closed is null
	group by sr_service.sr_service_recid, sr_urgency.description,sr_service.summary,sr_urgency.sort_order,sr_service.date_entered,company.company_name
	order by sr_service.date_entered desc';

}elseif(strpos($path,'managedservices') !== false){
	$description="This displays a table of tickets that are both open and urgent on the BackOffice, LogicMonitor and Managed Services - Requests boards";

	$count = '';
	$header = "<h4 style='text-align:center;'>".$count." tickets are open and urgent</h4>";
	$query = 'select DATEDIFF(DAY, sr_service.date_entered, getdate()) as daysOpen,sr_service.sr_service_recid,sr_status.description as status, sr_service.date_entered,sr_urgency.description as urgency,sr_service.summary from sr_service
	left outer join sr_type on sr_type.sr_type_recid = sr_service.sr_type_recid
	left outer join sr_urgency on sr_urgency.sr_urgency_recid = sr_service.sr_urgency_recid
	left outer join sr_board on sr_board.sr_board_recid = sr_service.sr_board_recid
	left outer join sr_status on sr_status.sr_status_recid  = sr_service.sr_status_recid
	where sr_service.closed_by is null and (dbo.SR_Board.Board_Name = "BackOffice" or dbo.SR_Board.Board_Name = "Managed Services Requests" or dbo.SR_Board.Board_Name = "" or dbo.SR_Board.Board_Name="LogicMonitor") and sr_service.date_closed is null and (sr_urgency.sort_order = 2 or 					sr_urgency.sort_order = 1 or sr_urgency.sort_order = 100) and (sr_status.description <> "Closed" and sr_status.description <> "Cancelled" and sr_status.description <> "Closed - First Call")
	group by sr_service.sr_service_recid, sr_urgency.description,sr_service.summary,sr_urgency.sort_order,sr_service.date_entered,sr_status.description
	order by sr_service.date_entered desc';

}
else{
	$count = '';
	$header = "<h4 style='text-align:center;'>".$count." tickets are open and urgent</h4>";
	$query = 'select DATEDIFF(DAY, sr_service.date_entered, getdate()) as daysOpen,sr_service.sr_service_recid,sr_status.description as status, sr_service.date_entered,sr_urgency.description as urgency,sr_service.summary from sr_service
	left outer join sr_type on sr_type.sr_type_recid = sr_service.sr_type_recid
	left outer join sr_urgency on sr_urgency.sr_urgency_recid = sr_service.sr_urgency_recid
	left outer join sr_board on sr_board.sr_board_recid = sr_service.sr_board_recid
	left outer join sr_status on sr_status.sr_status_recid  = sr_service.sr_status_recid
	where sr_service.closed_by is null and (sr_urgency.sort_order = 2 or sr_urgency.sort_order = 1 or sr_urgency.sort_order = 100) and (dbo.SR_Board.Board_Name = "My Company/Service" or dbo.SR_Board.Board_Name = "Alerts - Service Delivery" or dbo.SR_Board.Board_Name = "Results Physiotherapy" or dbo.SR_Board.Board_Name="Results - Initiatives") and sr_service.date_closed is null and (sr_status.description <> "Closed" and sr_status.description <> "cancelled" and sr_status.description <> "Closed - First Call")
	group by sr_service.sr_service_recid, sr_urgency.description,sr_service.summary,sr_urgency.sort_order,sr_service.date_entered,sr_status.description
	order by sr_service.date_entered desc';

}

$openTickets = mssql_query($query);
$rowcount = mssql_num_rows($openTickets);
$query1 = str_replace('"',"",$query);
$count = $rowcount;
echo "<div style='width:100%;padding:0px;'class=' panel panel-default'>";
echo "<div class='panel-heading'style='text-align:center;'><p id='urgentTicketsTitle'  style='text-align:center;'>".$title." <span><a id='info' data-description='".$description."'  data-datasource='".$datasource."' data-title='".$title."' data-query='".$query1."' href='#' class='fui-info-circle' data-toggle='modal' data-target='#basicModal'></a></span></p></div>";
echo "<div style='width:100%;width:100%;overflow-y: scroll !important;height:480px;'class=panel-body>";
if($count == 1 && strpos($path,'CIM') !== false){
	$header = "<h4 style='text-align:center;'>".$count." ticket is in CIM status</h4>";
echo $header;
}else if(strpos($path,'CIM') !== false && $count > 1){
	$header = "<h4 style='text-align:center;'>".$count." tickets are in CIM status</h4>";
	echo $header;
}else if($count == 1 && strpos($path,'CIM') !== true){
	$header = "<h4 style='text-align:center;'>".$count." ticket is open and urgent</h4>";
	echo $header;

}else if(strpos($path,'fieldservices') !== false && $count > 1){
	$header = "<h4 style='text-align:center;'>".$count." tickets are in CIM status</h4>";
	echo $header;
}else if($count == 1 && strpos($path,'fieldservices') !== true){
	$header = "<h4 style='text-align:center;'>".$count." ticket is open and urgent</h4>";
	echo $header;

}else{
	$header = "<h4 style='text-align:center;'>".$count." tickets are open and urgent</h4>";
	echo $header;
}

echo "<table id='clientTable' style='width:100%;' class='table table-hover'>";
echo "<thead>";
echo "<th>Ticket #</th>";
echo "<th>Urgency</th>";
echo "<th>Company</th>";
echo "<th>Summary</th>";
echo "<th>Days Open</th>";
echo "</thead>";

echo "<tbody>";
// fetch all rows from the query
//$all_rows = array();

while($row = mssql_fetch_array($openTickets)) {






	echo "<tr>";
    echo "<td>".$row['sr_service_recid']."</td>";
     echo "<td>".$row['urgency']."</td>";
     echo "<td>".$row['status']."</td>";
     echo "<td>".$row['summary']."</td>";
     echo "<td>".$row['daysOpen']."</td>";
    echo "</tr>";


}
echo "</tbody>";
echo "</table>";
//header("Content-Type: application/json");

echo "</div>";
?>
