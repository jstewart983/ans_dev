<?php

error_reporting(-1);
ini_set('display_errors', 'On');
require('../../config/config.php');


$query ='select SUM(time_entry.Hours_Actual) as hours,sr_board.board_name
from Time_Entry
left outer join sr_service on Time_Entry.sr_service_recid = sr_service.sr_service_recid
left outer join sr_board on sr_service.sr_board_recid = sr_board.sr_board_recid
left outer join member on time_entry.Member_RecID = Member.Member_RecID
where member.member_id like "%IT Support%" and Time_Entry.te_charge_code_recid is null and (dbo.Time_Entry.date_start >="2015-03-01")
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
