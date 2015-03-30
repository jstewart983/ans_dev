<?php

require('../config.php');

$ticketsClosed = mssql_query('select COUNT(distinct(sr_service.Date_Closed)) as closedTickets
from dbo.SR_Service left outer join dbo.sr_board on dbo.sr_service.sr_board_recid = dbo.sr_board.sr_board_recid
where (board_name = "My Company/Service" or board_name = "Alerts - Service Delivery") and DATEDIFF( ww, sr_service.Date_Closed, GETDATE() ) = 0');

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
