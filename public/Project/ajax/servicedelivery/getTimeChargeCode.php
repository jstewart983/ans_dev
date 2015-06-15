<?php

error_reporting(-1);
ini_set('display_errors', 'On');
require('../../config/config.php');

$range1 = $_GET['range1'];
$range2 = $_GET['range2'];
if(isset($_GET['member'])){

  $member = $_GET['member'];

  $query = 'SELECT  te_charge_code.description as type,sum(time_entry.hours_actual) as typeCount
  from Time_Entry
  left outer join sr_service on Time_Entry.sr_service_recid = sr_service.sr_service_recid
  left outer join te_charge_code on Time_Entry.te_charge_code_recid = te_charge_code.te_charge_code_recid
  left outer join sr_type on sr_service.sr_type_recid = sr_type.sr_type_recid
  left outer join sr_board on sr_service.sr_board_recid = sr_board.sr_board_recid
  left outer join member on time_entry.Member_RecID = Member.Member_RecID
  where te_charge_code.te_charge_code_recid is not null and (member.member_id = "'.$member.'") and
  (dbo.Time_Entry.date_start >="'.$range1.'" and dbo.Time_Entry.Date_start <= "'.$range2.'")

  group by te_charge_code.description
  order by typeCount desc';
}else{
  $query = 'SELECT  te_charge_code.description as type,sum(time_entry.hours_actual) as typeCount
  from Time_Entry
  left outer join sr_service on Time_Entry.sr_service_recid = sr_service.sr_service_recid
  left outer join te_charge_code on Time_Entry.te_charge_code_recid = te_charge_code.te_charge_code_recid
  left outer join sr_type on sr_service.sr_type_recid = sr_type.sr_type_recid
  left outer join sr_board on sr_service.sr_board_recid = sr_board.sr_board_recid
  left outer join member on time_entry.Member_RecID = Member.Member_RecID
  where te_charge_code.te_charge_code_recid is not null and member.title like "%IT Support%" and
  (dbo.Time_Entry.date_start >="'.$range1.'" and dbo.Time_Entry.Date_start <= "'.$range2.'")

  group by te_charge_code.description
  order by typeCount desc';
}


$projectHours = mssql_query($query);
$query1 = str_replace('"',"",$query);

$all_rows = array();
while($row = mssql_fetch_assoc($projectHours)) {
    $all_rows []= $row;
}

header("Content-Type: application/json");
echo json_encode($all_rows);

?>
