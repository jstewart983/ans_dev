<?php

error_reporting(-1);
ini_set('display_errors', 'On');
require('../../config/config.php');

$range1 = $_GET['range1'];
$range2 = $_GET['range2'];

$query ='select SUM(time_entry.Hours_Actual) as hours,sr_board.board_name
from Time_Entry
left outer join sr_service on Time_Entry.sr_service_recid = sr_service.sr_service_recid
left outer join sr_board on sr_service.sr_board_recid = sr_board.sr_board_recid
left outer join member on time_entry.Member_RecID = Member.Member_RecID
where (dbo.Member.Role_ID = "Technology Consultant") and Time_Entry.te_charge_code_recid is null and (dbo.Time_Entry.date_start >="'.$range1.'" and dbo.Time_Entry.date_start <= "'.$range2.'")
group by sr_board.board_name';

$projectHours = mssql_query($query);
$query1 = str_replace('"',"",$query);

$all_rows = array();
while($row = mssql_fetch_assoc($projectHours)) {
    $all_rows []= $row;
}

header("Content-Type: application/json");
echo json_encode($all_rows);

?>
