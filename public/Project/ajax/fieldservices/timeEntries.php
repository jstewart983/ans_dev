<?php
error_reporting(-1);
ini_set('display_errors', 'On');
 require('../../config/config.php');
 require('../../classes/time_entry.php');

$query = "select member.member_id,DAY(time_entry.date_start) as day,DATEPART(m,time_entry.date_start) as month,year(time_entry.date_start) as year,time_entry.hours_actual as billable_hours
from Time_Entry
left outer join dbo.member on dbo.time_entry.Member_RecID = member.Member_RecID
where member.inactive_flag = 0 and time_entry.te_charge_code_recid is null and (dbo.member.Title like '%Client IT%' or member.member_id ='zhoover')
and year(time_entry.date_start) = year(getdate()) and time_entry.Company_RecID <> 2
order by member.member_id desc";


$cimHours = mssql_query($query);
//$query1 = str_replace('"',"",$query);

$all_rows = array();
while($row = mssql_fetch_assoc($cimHours)) {
    $obj = new TimeEntry($row['member_id'],$row['day'],$row['month'],$row['year'],$row['billable_hours']);
    array_push($all_rows,$obj);
}

header("Content-Type: application/json");
echo json_encode($all_rows,JSON_UNESCAPED_SLASHES);

 ?>
