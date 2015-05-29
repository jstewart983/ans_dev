<?php
error_reporting(-1);
ini_set('display_errors', 'On');
require('../../config/config.php');
$title = "Orphaned Tickets";
$datasource = "Connectwise";
$description="This displays a table of tickets that are not closed, were previously worked on by a member of the CIM team, but do not have a future date scheduled.";

//$path = strstr($path,"/service_delivery");
//echo $path;




	//$header = "<h4 style='text-align:center;'>".$count." tickets are orphaned</h4>";
	$query = 'select top 10 DATEDIFF(DAY, sr_service.date_entered, getdate()) as daysOpen,owner_level.member_id,sr_service.sr_service_recid,sr_status.description as status, sr_service.date_entered,sr_urgency.description as urgency,sr_service.summary from sr_service
	left outer join sr_type on sr_type.sr_type_recid = sr_service.sr_type_recid
	left outer join sr_urgency on sr_urgency.sr_urgency_recid = sr_service.sr_urgency_recid
	left outer join sr_board on sr_board.sr_board_recid = sr_service.sr_board_recid
	left outer join sr_status on sr_status.sr_status_recid  = sr_service.sr_status_recid
  left outer join owner_level on sr_service.owner_level_recid = owner_level.owner_level_recid
  left outer join member on owner_level.member_id = Member.member_id
	where  sr_service.date_closed is null
	order by sr_service.date_entered desc';










$openTickets = mssql_query($query);
$rowcount = mssql_num_rows($openTickets);
$query1 = str_replace('"',"",$query);

/*echo "<div style='width:100%;padding:0px;'class=' panel panel-default'>";
echo "<div class='panel-heading'style='text-align:center;'><p id='urgentTicketsTitle'  style='text-align:center;'>".$title." <span><a id='info' data-description='".$description."'  data-datasource='".$datasource."' data-title='".$title."' data-query='".$query1."' href='#' class='fui-info-circle' data-toggle='modal' data-target='#basicModal'></a></span></p></div>";
echo "<div style='width:100%;width:100%;overflow-y: scroll !important;height:480px;'class=panel-body>";


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

echo "</div>";*/
$all_rows = array();
while($row = mssql_fetch_assoc($openTickets)) {
  /*$row["Title"] =$title;
  $row["Description"] = $description;
  $row["Query"] = $query1;
  $row["Datasource"] = $datasource;*/
    $all_rows []= $row;
}

header("Content-Type: application/json");
echo json_encode($all_rows);


?>
