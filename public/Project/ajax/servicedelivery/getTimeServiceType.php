<?php

error_reporting(-1);
ini_set('display_errors', 'On');
require('../../config/config.php');

$range1 = $_GET['range1'];
$range2 = $_GET['range2'];

$query = 'SELECT top 10 SR_type.description as type,sum(time_entry.hours_actual) as typeCount
from Time_Entry
left outer join sr_service on Time_Entry.sr_service_recid = sr_service.sr_service_recid
left outer join sr_type on sr_service.sr_type_recid = sr_type.sr_type_recid
left outer join sr_board on sr_service.sr_board_recid = sr_board.sr_board_recid
left outer join member on time_entry.Member_RecID = Member.Member_RecID
where member.title like "%IT Support%" and

(dbo.Time_Entry.date_start >="'.$range1.'" and dbo.Time_Entry.Date_start <= "'.$range2.'")



and DATEDIFF( ww, dbo.Time_Entry.Date_Entered_UTC, GETDATE() ) = 0
group by sr_type.Description
order by typeCount desc';

$projectHours = mssql_query($query);
$query1 = str_replace('"',"",$query);

$all_rows = array();
while($row = mssql_fetch_assoc($projectHours)) {
    $all_rows []= $row;
}

header("Content-Type: application/json");
echo json_encode($all_rows);

?>
