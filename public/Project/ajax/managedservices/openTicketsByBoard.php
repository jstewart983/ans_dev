<?php

require('../../config/config.php');
$title = "Open Tickets";
$description = "This represents a count of tickets currently open on all boards managed by the Service Delivery Team.  This includes Scheduled Maintenance tickets.";
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

where company_name = "Results Physiotherapy" and sr_status.description <> "Closed" and sr_status.description <> "Canceled" and sr_status.description <> "Closed - First Call" and sr_service.date_closed is null';


}elseif(strpos($path,'managedservices') !== false){

  $query = 'select Count(*) as openTickets, sr_board.board_name
  from dbo.SR_Service
  LEFT OUTER JOIN dbo.SR_Board on dbo.SR_Service.SR_Board_RecID = dbo.SR_Board.SR_Board_RecID
  left outer join sr_status on sr_service.sr_status_recid = sr_status.sr_status_recid
  where (sr_status.description <> "Closed" and sr_status.description <> "Canceled" and sr_status.description <> "Closed - First Call") and (dbo.SR_Board.Board_Name = "BackOffice" or dbo.SR_Board.Board_Name = "Managed Services Requests" or dbo.SR_Board.Board_Name = "" or dbo.SR_Board.Board_Name="LogicMonitor") and sr_service.date_closed is null
  group by sr_board.board_name';


}
else{

  $query = 'select Count(*) as openTickets, sr_board.board_name
  from dbo.SR_Service
  LEFT OUTER JOIN dbo.SR_Board on dbo.SR_Service.SR_Board_RecID = dbo.SR_Board.SR_Board_RecID
  left outer join sr_status on sr_service.sr_status_recid = sr_status.sr_status_recid
  where (sr_status.description <> "Closed" and sr_status.description <> "Canceled" and sr_status.description <> "Closed - First Call") and (dbo.SR_Board.Board_Name = "BackOffice" or dbo.SR_Board.Board_Name = "Managed Services Requests" or dbo.SR_Board.Board_Name = "" or dbo.SR_Board.Board_Name="LogicMonitor") and sr_service.date_closed is null
  group by sr_board.board_name';

}

$openTickets = mssql_query($query);

echo "<table class='table table-list-search remodelGray'>";


echo "<tbody>";


while($row = mssql_fetch_array($openTickets)) {

	echo '<tr>
					<td><b>'.$row['board_name'].'</b></td>
					<td>'.$row['openTickets'].'</td>
			</tr>';
}
echo "</tbody>";
echo "</table>";
//header("Content-Type: application/json");

echo "</div>";


?>
