<?php
require('../../config/config.php');
$title = "Avg Initial Response Time - Last 7 days";
$datasource = "Connectwise";
$description = "This represents the average amount of time that passes between the date and time that a ticket is entered and the date and time of the first time entry, omitting non-business hours. This number is only looking at tickets on the My Company board that were entered in the last 7 days and where the first time entry is from a member of the service desk team, not including tickets against ANS.";

$actual_link = $_SERVER['HTTP_REFERER'];
$path = parse_url($actual_link,PHP_URL_PATH);
//$path = strstr($path,"/service_delivery");
//echo $path;
if(strpos($path,'CIM') !== false) {

  $query = '
  select avg (x.IRT) as Average_IRT
  from
  (select case when dbo.udf_worktime(dbo.sr_service.Date_Entered, min(dbo.time_entry.Date_Start + dbo.time_entry.Time_Start)) > 0 then
  dbo.udf_worktime(dbo.sr_service.Date_Entered, min(dbo.time_entry.Date_Start + dbo.time_entry.Time_Start)) else 0 end
  as IRT , dbo.SR_Service.SR_Service_RecID, dbo.Company.Company_Name
  from


  (select x.FTE, x.Time_RecID
  from
  (select (min(dbo.time_entry.Date_Start + dbo.time_entry.Time_Start)) as FTE,
  min(dbo.time_entry.Time_RecID) as Time_RecID, SR_Service_RecID
  from dbo.Time_Entry
  group by SR_Service_RecID)x
  left outer join
  dbo.time_entry on x.Time_RecID = dbo.Time_Entry.Time_RecID
  left outer join
  dbo.member on dbo.Time_Entry.Member_RecID = dbo.member.Member_RecID
  where dbo.member.Title like "%Client IT%")e


  left outer join
  dbo.Time_Entry on e.Time_RecID = dbo.time_entry.Time_RecID left outer join
  dbo.SR_Service on dbo.Time_Entry.SR_Service_RecID = dbo.sr_service.SR_Service_RecID left outer join
  dbo.SR_Board on dbo.SR_Service.SR_Board_RecID = dbo.SR_Board.SR_Board_RecID left outer join
  dbo.Company on dbo.sr_service.Company_RecID = dbo.company.Company_RecID left outer join
  dbo.Member on dbo.time_entry.Member_RecID = dbo.member.Member_RecID
  where dbo.sr_service.Date_Entered >= (getdate()-7) and Board_Name = "My Company/Service" AND (Company_Name <> "Advanced Network Solutions")
  group by dbo.sr_service.Date_Entered, dbo.sr_service.SR_Service_RecID, Company_Name)
  x
';

}if(strpos($path,'fieldservices') !== false) {

  $query = '
  select avg (x.IRT) as Average_IRT
  from
  (select case when dbo.udf_worktime(dbo.sr_service.Date_Entered, min(dbo.time_entry.Date_Start + dbo.time_entry.Time_Start)) > 0 then
  dbo.udf_worktime(dbo.sr_service.Date_Entered, min(dbo.time_entry.Date_Start + dbo.time_entry.Time_Start)) else 0 end
  as IRT , dbo.SR_Service.SR_Service_RecID, dbo.Company.Company_Name
  from


  (select x.FTE, x.Time_RecID
  from
  (select (min(dbo.time_entry.Date_Start + dbo.time_entry.Time_Start)) as FTE,
  min(dbo.time_entry.Time_RecID) as Time_RecID, SR_Service_RecID
  from dbo.Time_Entry
  group by SR_Service_RecID)x
  left outer join
  dbo.time_entry on x.Time_RecID = dbo.Time_Entry.Time_RecID
  left outer join
  dbo.member on dbo.Time_Entry.Member_RecID = dbo.member.Member_RecID
  where dbo.member.Title like "%Client IT%")e


  left outer join
  dbo.Time_Entry on e.Time_RecID = dbo.time_entry.Time_RecID left outer join
  dbo.SR_Service on dbo.Time_Entry.SR_Service_RecID = dbo.sr_service.SR_Service_RecID left outer join
  dbo.SR_Board on dbo.SR_Service.SR_Board_RecID = dbo.SR_Board.SR_Board_RecID left outer join
  dbo.Company on dbo.sr_service.Company_RecID = dbo.company.Company_RecID left outer join
  dbo.Member on dbo.time_entry.Member_RecID = dbo.member.Member_RecID
  where dbo.sr_service.Date_Entered >= (getdate()-7) and Board_Name = "My Company/Service" AND (Company_Name <> "Advanced Network Solutions")
  group by dbo.sr_service.Date_Entered, dbo.sr_service.SR_Service_RecID, Company_Name)
  x
';

}else if (strpos($path,'results') !== false) {
$query ='
select avg (x.IRT) as Average_IRT
from
(select case when dbo.udf_worktime(dbo.sr_service.Date_Entered, min(dbo.time_entry.Date_Start + dbo.time_entry.Time_Start)) > 0 then
dbo.udf_worktime(dbo.sr_service.Date_Entered, min(dbo.time_entry.Date_Start + dbo.time_entry.Time_Start)) else 0 end
as IRT , dbo.SR_Service.SR_Service_RecID, dbo.Company.Company_Name
from


(select x.FTE, x.Time_RecID
from
(select (min(dbo.time_entry.Date_Start + dbo.time_entry.Time_Start)) as FTE,
min(dbo.time_entry.Time_RecID) as Time_RecID, SR_Service_RecID
from dbo.Time_Entry
group by SR_Service_RecID)x
left outer join
dbo.time_entry on x.Time_RecID = dbo.Time_Entry.Time_RecID
left outer join
dbo.member on dbo.Time_Entry.Member_RecID = dbo.member.Member_RecID
where dbo.member.Title like "%IT Support%")e


left outer join
dbo.Time_Entry on e.Time_RecID = dbo.time_entry.Time_RecID left outer join
dbo.SR_Service on dbo.Time_Entry.SR_Service_RecID = dbo.sr_service.SR_Service_RecID left outer join
dbo.SR_Board on dbo.SR_Service.SR_Board_RecID = dbo.SR_Board.SR_Board_RecID left outer join
dbo.Company on dbo.sr_service.Company_RecID = dbo.company.Company_RecID left outer join
dbo.Member on dbo.time_entry.Member_RecID = dbo.member.Member_RecID
where dbo.sr_service.Date_Entered >= (getdate()-7) AND (Company_Name = "Results Physiotherapy")
group by dbo.sr_service.Date_Entered, dbo.sr_service.SR_Service_RecID, Company_Name)
x';
}else if (strpos($path,'servicedelivery') !== false) {

  $query = '
  select avg (x.IRT) as Average_IRT
  from
  (select case when dbo.udf_worktime(dbo.sr_service.Date_Entered, min(dbo.time_entry.Date_Start + dbo.time_entry.Time_Start)) > 0 then
  dbo.udf_worktime(dbo.sr_service.Date_Entered, min(dbo.time_entry.Date_Start + dbo.time_entry.Time_Start)) else 0 end
  as IRT , dbo.SR_Service.SR_Service_RecID, dbo.Company.Company_Name
  from


  (select x.FTE, x.Time_RecID
  from
  (select (min(dbo.time_entry.Date_Start + dbo.time_entry.Time_Start)) as FTE,
  min(dbo.time_entry.Time_RecID) as Time_RecID, SR_Service_RecID
  from dbo.Time_Entry
  group by SR_Service_RecID)x
  left outer join
  dbo.time_entry on x.Time_RecID = dbo.Time_Entry.Time_RecID
  left outer join
  dbo.member on dbo.Time_Entry.Member_RecID = dbo.member.Member_RecID
  where dbo.member.Title like "%IT Support%")e


  left outer join
  dbo.Time_Entry on e.Time_RecID = dbo.time_entry.Time_RecID left outer join
  dbo.SR_Service on dbo.Time_Entry.SR_Service_RecID = dbo.sr_service.SR_Service_RecID left outer join
  dbo.SR_Board on dbo.SR_Service.SR_Board_RecID = dbo.SR_Board.SR_Board_RecID left outer join
  dbo.Company on dbo.sr_service.Company_RecID = dbo.company.Company_RecID left outer join
  dbo.Member on dbo.time_entry.Member_RecID = dbo.member.Member_RecID
  where dbo.sr_service.Date_Entered >= (getdate()-7) and Board_Name = "My Company/Service" AND (Company_Name <> "Advanced Network Solutions")
  group by dbo.sr_service.Date_Entered, dbo.sr_service.SR_Service_RecID, Company_Name)
  x
';

}else if (strpos($path,'managedservices') !== false) {

  $description = "This represents the average amount of time that passes between the date and time that a ticket is entered and the date and time of the first time entry, omitting non-business hours. This number is only looking at tickets on the BackOffice, LogicMonitor and Managed Services - Requests boards that were entered in the last 7 days and where the first time entry is from a member of the Managed Services team, not including tickets against ANS.";

  $query = '
  select avg (x.IRT) as Average_IRT
  from
  (select case when dbo.udf_worktime(dbo.sr_service.Date_Entered, min(dbo.time_entry.Date_Start + dbo.time_entry.Time_Start)) > 0 then
  dbo.udf_worktime(dbo.sr_service.Date_Entered, min(dbo.time_entry.Date_Start + dbo.time_entry.Time_Start)) else 0 end
  as IRT , dbo.SR_Service.SR_Service_RecID, dbo.Company.Company_Name
  from


  (select x.FTE, x.Time_RecID
  from
  (select (min(dbo.time_entry.Date_Start + dbo.time_entry.Time_Start)) as FTE,
  min(dbo.time_entry.Time_RecID) as Time_RecID, SR_Service_RecID
  from dbo.Time_Entry
  group by SR_Service_RecID)x
  left outer join
  dbo.time_entry on x.Time_RecID = dbo.Time_Entry.Time_RecID
  left outer join
  dbo.member on dbo.Time_Entry.Member_RecID = dbo.member.Member_RecID
  where (member.member_id = "wblakeburn" or member.member_id = "plane" or member.member_id = "jmorgan" or member.member_id = "bfizer" or member.member_id = "rmillen"))e


  left outer join
  dbo.Time_Entry on e.Time_RecID = dbo.time_entry.Time_RecID left outer join
  dbo.SR_Service on dbo.Time_Entry.SR_Service_RecID = dbo.sr_service.SR_Service_RecID left outer join
  dbo.SR_Board on dbo.SR_Service.SR_Board_RecID = dbo.SR_Board.SR_Board_RecID left outer join
  dbo.Company on dbo.sr_service.Company_RecID = dbo.company.Company_RecID left outer join
  dbo.Member on dbo.time_entry.Member_RecID = dbo.member.Member_RecID
  where dbo.sr_service.Date_Entered >= (getdate()-7) and (Board_Name = "BackOffice" or Board_Name = "LogicMonitor" or Board_Name = "Managed Services - Requests") AND (Company_Name <> "Advanced Network Solutions")
  group by dbo.sr_service.Date_Entered, dbo.sr_service.SR_Service_RecID, Company_Name)
  x
';

}
else{

  $query = '
  select avg (x.IRT) as Average_IRT
  from
  (select case when dbo.udf_worktime(dbo.sr_service.Date_Entered, min(dbo.time_entry.Date_Start + dbo.time_entry.Time_Start)) > 0 then
  dbo.udf_worktime(dbo.sr_service.Date_Entered, min(dbo.time_entry.Date_Start + dbo.time_entry.Time_Start)) else 0 end
  as IRT , dbo.SR_Service.SR_Service_RecID, dbo.Company.Company_Name
  from


  (select x.FTE, x.Time_RecID
  from
  (select (min(dbo.time_entry.Date_Start + dbo.time_entry.Time_Start)) as FTE,
  min(dbo.time_entry.Time_RecID) as Time_RecID, SR_Service_RecID
  from dbo.Time_Entry
  group by SR_Service_RecID)x
  left outer join
  dbo.time_entry on x.Time_RecID = dbo.Time_Entry.Time_RecID
  left outer join
  dbo.member on dbo.Time_Entry.Member_RecID = dbo.member.Member_RecID
  where dbo.member.Title like "%IT Support%" or dbo.member.Title like "%Client IT%")e


  left outer join
  dbo.Time_Entry on e.Time_RecID = dbo.time_entry.Time_RecID left outer join
  dbo.SR_Service on dbo.Time_Entry.SR_Service_RecID = dbo.sr_service.SR_Service_RecID left outer join
  dbo.SR_Board on dbo.SR_Service.SR_Board_RecID = dbo.SR_Board.SR_Board_RecID left outer join
  dbo.Company on dbo.sr_service.Company_RecID = dbo.company.Company_RecID left outer join
  dbo.Member on dbo.time_entry.Member_RecID = dbo.member.Member_RecID
  where dbo.sr_service.Date_Entered >= (getdate()-7) and Board_Name = "My Company/Service" AND (Company_Name <> "Advanced Network Solutions")
  group by dbo.sr_service.Date_Entered, dbo.sr_service.SR_Service_RecID, Company_Name)
  x
';

}

$projectHours = mssql_query($query);
$query1 = str_replace('"',"",$query);
// fetch all rows from the query
$all_rows = array();
while($row = mssql_fetch_assoc($projectHours)) {
  $row["Title"] =$title;
  $row["Description"] = $description;
  $row["Query"] = $query1;
  $row["Datasource"] = $datasource;
    $all_rows []= $row;
}

header("Content-Type: application/json");
echo json_encode($all_rows);
?>
