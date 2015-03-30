<?php

require('../config.php');

$openTickets = mssql_query('select
(cast((select count(*)
from dbo.SR_Service left outer join
dbo.sr_status on dbo.sr_service.sr_status_recid = dbo.sr_status.sr_status_recid
where convert(date,dbo.sr_service.Date_Closed) >= convert(date,GETDATE()-7)
and CONVERT(date,dbo.sr_service.Date_Closed) <> CONVERT(date,getdate())
and datename(dw,convert(date,dbo.sr_service.Date_Closed)) <> "Saturday"
and datename(dw,convert(date,dbo.sr_service.Date_Closed)) <> "Sunday" and dbo.sr_status.description = "Closed - First Call")as float)/
(select count(*)
from dbo.sr_service left outer join
dbo.sr_status on dbo.sr_service.sr_status_recid = dbo.sr_status.sr_status_recid
where convert(date,dbo.sr_service.Date_Closed) >= convert(date,GETDATE()-7)
and CONVERT(date,dbo.sr_service.Date_Closed) <> CONVERT(date,getdate())
and datename(dw,convert(date,dbo.sr_service.Date_Closed)) <> "Saturday"
and datename(dw,convert(date,dbo.sr_service.Date_Closed)) <> "Sunday" and (dbo.SR_Service.SR_Board_RecID = 1 or dbo.SR_Service.SR_Board_RecID = 30 or
dbo.SR_Service.SR_Board_RecID = 35 or dbo.SR_Service.SR_Board_RecID = 36 or dbo.SR_Service.SR_Board_RecID = 41)))
as CFC');

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
