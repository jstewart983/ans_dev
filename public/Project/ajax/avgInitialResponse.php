<?php
 require('../config.php');
//project hours completed last week
$projectHours = mssql_query('
select avg (x.IRT) as Average_IRT
from
(select case when dbo.udf_worktime(dbo.sr_service.Date_Entered, min(dbo.time_entry.Date_Start + dbo.time_entry.Time_Start)) > 0 then
dbo.udf_worktime(dbo.sr_service.Date_Entered, min(dbo.time_entry.Date_Start + dbo.time_entry.Time_Start)) else 0 end
as IRT
from


(select (min(dbo.time_entry.Date_Start + dbo.time_entry.Time_Start)) as FTE,
min(dbo.time_entry.Time_RecID) as Time_RecID, SR_Service_RecID from dbo.Time_Entry
left outer join
dbo.Member on dbo.time_entry.Member_RecID = dbo.member.Member_RecID
where dbo.member.title like "%IT Support%"
group by SR_Service_RecID) e left outer join
dbo.Time_Entry on e.Time_RecID = dbo.time_entry.Time_RecID


left outer join
dbo.SR_Service on dbo.Time_Entry.SR_Service_RecID = dbo.sr_service.SR_Service_RecID
left outer join
dbo.SR_Board on dbo.SR_Service.SR_Board_RecID = dbo.SR_Board.SR_Board_RecID left outer join
dbo.Company on dbo.sr_service.Company_RecID = dbo.company.Company_RecID left outer join
dbo.Member on dbo.time_entry.Member_RecID = dbo.member.Member_RecID
where convert(date,dbo.sr_service.Date_entered) >= convert(date,GETDATE()-7)
and CONVERT(date,dbo.sr_service.Date_entered) <> CONVERT(date,getdate())
and datename(dw,convert(date,dbo.sr_service.Date_entered)) <> "Saturday"
and datename(dw,convert(date,dbo.sr_service.Date_entered)) <> "Sunday" and Board_Name = "My Company/Service" AND (Company_Name <> "Advanced Network Solutions")
group by dbo.sr_service.Date_Entered, dbo.sr_service.SR_Service_RecID) x');


// fetch all rows from the query
$all_rows = array();
while($row = mssql_fetch_assoc($projectHours)) {
    $all_rows []= $row;
}

header("Content-Type: application/json");
echo json_encode($all_rows);
?>
