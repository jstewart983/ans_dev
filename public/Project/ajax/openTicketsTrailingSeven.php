<?php

require('../config.php');

$openTickets = mssql_query('select
datename(DW,CONVERT(date,dbo.sr_service.date_entered)) as Week_Day, COUNT(distinct(dbo.sr_service.date_entered))as Opened_Tickets
from dbo.SR_Service left outer join dbo.sr_board on dbo.sr_service.sr_board_recid = dbo.sr_board.sr_board_recid
where (board_name = "My Company/Service" or board_name = "Alerts - Service Delivery") and convert(date,dbo.sr_service.Date_Entered) >= convert(date,GETDATE()-7)
and CONVERT(date,dbo.sr_service.Date_Entered) <> CONVERT(date,getdate())
and datename(dw,convert(date,dbo.sr_service.date_entered)) <> "Saturday"
and datename(dw,convert(date,dbo.sr_service.date_entered)) <> "Sunday"
group by convert(date,dbo.sr_service.Date_Entered)');

if(!$openTickets){
  die("Error: ".mssql_get_last_message());
}


// fetch all rows from the query
$all_rows = array();
while($row = mssql_fetch_assoc($openTickets)) {
    $all_rows []= $row;
}

header("Content-Type: application/json");
echo json_encode($all_rows);
?>
