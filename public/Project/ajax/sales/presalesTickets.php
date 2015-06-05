<?php
//ini_set('memory_limit', '778M');
error_reporting(-1);
ini_set('display_errors', 'On');
require('../../config/config.php');
//$title = "Open + Urgent Tickets";
//$datasource = "Connectwise";
//$description="This displays a table of tickets that are both open and urgent on the My Company/Service board or the Alerts - Service Delivery board";
//$actual_link = $_SERVER['HTTP_REFERER'];
//$path = parse_url($actual_link,PHP_URL_PATH);
//$path = strstr($path,"/service_delivery");
//echo $path;



	$query = 'select sr_service_calculated.resourcelist, DATEDIFF(DAY, sr_service.date_entered, getdate()) as daysOpen,sr_service.sr_service_recid,sr_status.description as status, sr_service.date_entered,sr_urgency.description as urgency,sr_service.summary
  from sr_service
	left outer join sr_type on sr_type.sr_type_recid = sr_service.sr_type_recid
	left outer join sr_urgency on sr_urgency.sr_urgency_recid = sr_service.sr_urgency_recid
	left outer join sr_board on sr_board.sr_board_recid = sr_service.sr_board_recid
	left outer join sr_status on sr_status.sr_status_recid  = sr_service.sr_status_recid
  left outer join sr_service_calculated on sr_service.sr_service_recid = sr_service_calculated.sr_service_recid
  left outer join company on sr_service.company_recid = company.company_recid
  where sr_board.board_name = "Pre-Sales Engineering" and (sr_status.description <> "Closed" and sr_status.description <> "Cancelled" and sr_status.description <> "Closed - First Call") and sr_service.date_closed is null
  order by sr_service.date_entered desc';



$openTickets = mssql_query($query);

echo "<div style='width:100%;padding:0px;'class=' panel panel-default'>";
echo "<div style='width:100%;width:100%;overflow-y: scroll !important;height:780px;'class=panel-body>";
echo "<table id='clientTable' style='width:100%;' class='table table-hover'>";
echo "<thead>";
echo "<th>Ticket #</th>";
echo "<th>Urgency</th>";
echo "<th>Status</th>";
echo "<th>Engineer(s)</th>";
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
     echo "<td>".$row['resourcelist']."</td>";
     echo "<td>".$row['summary']."</td>";
     echo "<td>".$row['daysOpen']."</td>";
    echo "</tr>";


}
echo "</tbody>";
echo "</table>";
//header("Content-Type: application/json");

echo "</div>";
?>