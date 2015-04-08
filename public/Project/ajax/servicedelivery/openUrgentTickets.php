<?php

require('../../config.php');
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
}else{

	$query = 'select DATEDIFF(DAY, sr_service.date_entered, getdate()) as daysOpen,sr_service.sr_service_recid,sr_status.description as status, sr_service.date_entered,sr_urgency.description as urgency,sr_service.summary from sr_service
	left outer join sr_type on sr_type.sr_type_recid = sr_service.sr_type_recid
	left outer join sr_urgency on sr_urgency.sr_urgency_recid = sr_service.sr_urgency_recid
	left outer join sr_board on sr_board.sr_board_recid = sr_service.sr_board_recid
	left outer join sr_status on sr_status.sr_status_recid  = sr_service.sr_status_recid
	where (sr_board.board_name = "My Company/Service" or sr_board.board_name = "Alerts - Service Delivery") and sr_service.date_closed is null and (sr_urgency.sort_order = 2 or sr_urgency.sort_order = 1 or sr_urgency.sort_order = 100)
	group by sr_service.sr_service_recid, sr_urgency.description,sr_service.summary,sr_urgency.sort_order,sr_service.date_entered,sr_status.description
	order by sr_service.date_entered desc';

}

$openTickets = mssql_query($query);
$query1 = str_replace('"',"",$query);

echo "<div style='width:100%;padding:0px;'class=' panel panel-default'>";
echo "<div class='panel-heading'style='text-align:center;'><p id='urgentTicketsTitle'  style='text-align:center;'>".$title." <span><a id='info' data-description='".$description."'  data-datasource='".$datasource."' data-title='".$title."' data-query='".$query1."' href='#' class='fui-info-circle' data-toggle='modal' data-target='#basicModal'></a></span></p></div>";
echo "<div style='width:100%;width:100%;overflow-y: scroll !important;height:278px;'class=panel-body>";
echo "<table id='clientTable' style='width:100%;' class='table table-hover'>";
echo "<thead>";
echo "<th>Ticket #</th>";
echo "<th>Urgency</th>";
echo "<th>Status</th>";
echo "<th>Summary</th>";
echo "<th>Days Open</th>";
echo "</thead>";

echo "<tbody  class='rowlink'>";
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
