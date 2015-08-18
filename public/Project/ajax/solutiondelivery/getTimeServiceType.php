<?php

error_reporting(-1);
ini_set('display_errors', 'On');
require('../../config/config.php');

$range1 = $_GET['range1'];
$range2 = $_GET['range2'];
if(isset($_GET['member']) && isset($_GET['type'])){
  $member = $_GET['member'];
  $type = $_GET['type'];
  $query = 'SELECT SR_Subtype.description as type,sum(time_entry.hours_actual) as typeCount
  from Time_Entry
  left outer join sr_service on Time_Entry.sr_service_recid = sr_service.sr_service_recid
  left outer join sr_type on sr_service.sr_type_recid = sr_type.sr_type_recid
  left outer join sr_subtype on sr_service.sr_subtype_recid = sr_subtype.sr_subtype_recid
  left outer join sr_board on sr_service.sr_board_recid = sr_board.sr_board_recid
  left outer join member on time_entry.Member_RecID = Member.Member_RecID
  where sr_type.description = "'.$type.'"  and Time_Entry.te_charge_code_recid is null and  member.member_id =  "'.$member.'" and
  (dbo.Time_Entry.date_start >="'.$range1.'" and dbo.Time_Entry.Date_start <= "'.$range2.'")

  group by SR_Subtype.description
  order by typeCount desc';

}
else if(isset($_GET['type'])){

  $type = $_GET['type'];
  $query = 'SELECT SR_Subtype.description as type,sum(time_entry.hours_actual) as typeCount
  from Time_Entry
  left outer join sr_service on Time_Entry.sr_service_recid = sr_service.sr_service_recid
  left outer join sr_type on sr_service.sr_type_recid = sr_type.sr_type_recid
  left outer join sr_subtype on sr_service.sr_subtype_recid = sr_subtype.sr_subtype_recid
  left outer join sr_board on sr_service.sr_board_recid = sr_board.sr_board_recid
  left outer join member on time_entry.Member_RecID = Member.Member_RecID
  where sr_type.description = "'.$type.'"  and Time_Entry.te_charge_code_recid is null and member.Role_ID = "Technology Consultant" and
  (dbo.Time_Entry.date_start >="'.$range1.'" and dbo.Time_Entry.Date_start <= "'.$range2.'")

  group by SR_Subtype.description
  order by typeCount desc';

}

else if(isset($_GET['member'])){

  $member = $_GET['member'];

$query = 'SELECT SR_type.description as type,sum(time_entry.hours_actual) as typeCount
from Time_Entry
left outer join sr_service on Time_Entry.sr_service_recid = sr_service.sr_service_recid
left outer join sr_type on sr_service.sr_type_recid = sr_type.sr_type_recid
left outer join sr_board on sr_service.sr_board_recid = sr_board.sr_board_recid
left outer join member on time_entry.Member_RecID = Member.Member_RecID
where Time_Entry.te_charge_code_recid is null and (member.member_id = "'.$member.'") and
(dbo.Time_Entry.date_start >="'.$range1.'" and dbo.Time_Entry.Date_start <= "'.$range2.'")

group by sr_type.Description
order by typeCount desc';
}else{

  $query = 'SELECT SR_type.description as type,sum(time_entry.hours_actual) as typeCount
  from Time_Entry
  left outer join sr_service on Time_Entry.sr_service_recid = sr_service.sr_service_recid
  left outer join sr_type on sr_service.sr_type_recid = sr_type.sr_type_recid
  left outer join sr_board on sr_service.sr_board_recid = sr_board.sr_board_recid
  left outer join member on time_entry.Member_RecID = Member.Member_RecID
  where Time_Entry.te_charge_code_recid is null and member.Role_ID = "Technology Consultant" and
  (dbo.Time_Entry.date_start >="'.$range1.'" and dbo.Time_Entry.Date_start <= "'.$range2.'")

  group by sr_type.Description
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
