<?php
error_reporting(-1);
ini_set('display_errors', 'On');
require('../config/config.php');




$query = 'SELECT count(*)  FROM sr_service
 left outer join sr_status on sr_service.sr_status_recid = sr_status.sr_status_recid
 left outer join sr_board on sr_service.sr_board_recid = sr_board.sr_board_recid
 left outer join sr_urgency on sr_service.sr_urgency_recid = sr_urgency.sr_urgency_recid
 where sr_service.closed_by is null and (sr_urgency.sort_order = 2 or sr_urgency.sort_order = 1 or sr_urgency.sort_order = 100) and (dbo.SR_Board.Board_Name = "My Company/Service" or dbo.SR_Board.Board_Name = "Alerts - Service Delivery" or dbo.SR_Board.Board_Name = "Results Physiotherapy" or dbo.SR_Board.Board_Name="Results - Initiatives") and sr_service.date_closed is null and (sr_status.description <> "Closed" and sr_status.description <> "Canceled" and sr_status.description <> "Closed - First Call")';




$results=mssql_query($query);



while($row = mssql_fetch_array($results)) {

echo $row['computed'];
	}






?>
