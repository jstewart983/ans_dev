<?php

require('../../config.php');
$title = "Billable Hrs by Member - This Week";
$description = "This represents the total billable client hours completed by the Service Delivery Team by member, by day, this week";
$datasource = "Connectwise";

$actual_link = $_SERVER['HTTP_REFERER'];
$path = parse_url($actual_link,PHP_URL_PATH);
//$path = strstr($path,"/service_delivery");
//echo $path;
if (strpos($path,'desk') !== false) {

  $query = 'select member.member_id,SUM(time_entry.Hours_Bill) as billable_hours
from Time_Entry left outer join dbo.member      on dbo.time_entry.Member_RecID = member.Member_RecID
where (dbo.member.Title like "%IT Support%")
and DATEDIFF(ww, dbo.time_entry.Date_Start, getdate())=0 and time_entry.Company_RecID <> 2
group by member.member_id';

}elseif(strpos($path,'CIM') !== false){


  $query = '
  select datename(dw,dbo.time_entry.Date_Start) as dayOfWeek,datepart(weekday,dbo.time_entry.Date_Start) as dayOfWeekNo,member.member_id,SUM(time_entry.Hours_Bill) as billable_hours
  from Time_Entry left outer join dbo.member      on dbo.time_entry.Member_RecID = member.Member_RecID
  where (dbo.member.Title like "%Client IT% or member.id ="zhoover")
  and DATEDIFF(ww, dbo.time_entry.Date_Start, getdate())=0 and time_entry.Company_RecID <> 2
  group by datename(dw,dbo.time_entry.Date_Start),datepart(weekday,dbo.time_entry.Date_Start) ,member.member_id
  order by datepart(weekday,dbo.time_entry.date_start)';

}elseif(strpos($path,'results') !== false){

  $query ='select member.member_id,SUM(time_entry.Hours_Bill) as billable_hours
  from Time_Entry left outer join dbo.member on dbo.time_entry.Member_RecID = member.Member_RecID
  left outer join company on company.company_recid = time_entry.company_recid
  where company_name = "Results Physiotherapy" and DATEDIFF(ww, dbo.time_entry.Date_Start, getdate())=0 and time_entry.Company_RecID <> 2
  group by member.member_id';

}
else{
  $query ='select member.member_id,SUM(time_entry.Hours_Bill) as billable_hours
from Time_Entry left outer join dbo.member      on dbo.time_entry.Member_RecID = member.Member_RecID
where (dbo.member.Title like "%IT Support%" or dbo.member.Title like "%Client IT%" or dbo.member.member_id="zhoover")
and DATEDIFF(ww, dbo.time_entry.Date_Start, getdate())=0 and time_entry.Company_RecID <> 2
group by member.member_id';

}
$projectHours = mssql_query($query);
$query1 = str_replace('"',"",$query);

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
