<?php

require('../../config/config.php');
$title = "Billable Hrs - This Wk";
$description = "This represents the total billable client hours completed by the Service Delivery Team for the current week starting on Sunday.";
$datasource = "Connectwise";

$actual_link = $_SERVER['HTTP_REFERER'];
$path = parse_url($actual_link,PHP_URL_PATH);
//$path = strstr($path,"/service_delivery");
//echo $path;
if (strpos($path,'servicedelivery') !== false) {

  $query = 'select SUM(time_entry.Hours_Actual)
  from Time_Entry left outer join dbo.member      on dbo.time_entry.Member_RecID = member.Member_RecID
  where time_entry.billable_flag = 1 and (dbo.member.Title like "%IT Support%")
  and DATEDIFF(ww, dbo.time_entry.Date_Start, getdate())=0 and time_entry.Company_RecID <> 2';
  $query2 ='select SUM(time_entry.Hours_Actual) as hoursLastWeek
    from Time_Entry left outer join dbo.member      on dbo.time_entry.Member_RecID = member.Member_RecID
    where time_entry.billable_flag = 1 and (dbo.member.Title like "%IT Support%")
    and (DATEDIFF( ww,  dbo.time_entry.Date_Start, GETDATE() ) = 1 and (datepart(weekday,GETDATE()) >= datepart(weekday, dbo.time_entry.Date_Start))) and time_entry.Company_RecID <> 2';

}elseif(strpos($path,'CIM') !== false){


  $query = '
  select SUM(time_entry.Hours_Actual)
from Time_Entry left outer join dbo.member      on dbo.time_entry.Member_RecID = member.Member_RecID
where time_entry.billable_flag = 1 and (dbo.member.Title like "%Client IT%" or dbo.member.Member_ID = "zhoover")
and DATEDIFF(ww, dbo.time_entry.Date_Start, getdate())=0 and time_entry.Company_RecID <> 2';
$query2 ='select SUM(time_entry.Hours_Actual) as hoursLastWeek
  from Time_Entry left outer join dbo.member      on dbo.time_entry.Member_RecID = member.Member_RecID
  where time_entry.billable_flag = 1 and (dbo.member.Title like "%Client IT%" or dbo.member.Member_ID = "zhoover")
  and DATEDIFF(ww, dbo.time_entry.Date_Start, getdate())=1 and time_entry.Company_RecID <> 2';

}elseif(strpos($path,'fieldservices') !== false){


  $query = '
  select SUM(time_entry.Hours_Actual)
from Time_Entry left outer join dbo.member      on dbo.time_entry.Member_RecID = member.Member_RecID
where time_entry.billable_flag = 1 and (dbo.member.Title like "%Client IT%" or dbo.member.Member_ID = "zhoover")
and DATEDIFF(ww, dbo.time_entry.Date_Start, getdate())=0 and time_entry.Company_RecID <> 2';
$query2 ='select SUM(time_entry.Hours_Actual) as hoursLastWeek
  from Time_Entry left outer join dbo.member      on dbo.time_entry.Member_RecID = member.Member_RecID
  where time_entry.billable_flag = 1 and (dbo.member.Title like "%Client IT%" or dbo.member.Member_ID = "zhoover")
  and DATEDIFF(ww, dbo.time_entry.Date_Start, getdate())=1 and time_entry.Company_RecID <> 2';

}elseif(strpos($path,'results') !== false){

  $query ='select SUM(time_entry.Hours_Actual)
  from Time_Entry left outer join dbo.member on dbo.time_entry.Member_RecID = member.Member_RecID
  left outer join company on company.company_recid = time_entry.company_recid
  where time_entry.billable_flag = 1 and company_name = "Results Physiotherapy" and DATEDIFF(ww, dbo.time_entry.Date_Start, getdate())=0 and time_entry.Company_RecID <> 2';
  $query2 ='select SUM(time_entry.Hours_Actual) as hoursLastWeek
  from Time_Entry left outer join dbo.member on dbo.time_entry.Member_RecID = member.Member_RecID
  left outer join company on company.company_recid = time_entry.company_recid
  where time_entry.billable_flag = 1 and company_name = "Results Physiotherapy" and DATEDIFF(ww, dbo.time_entry.Date_Start, getdate())=1 and time_entry.Company_RecID <> 2';
}
elseif(strpos($path,'managedservices') !== false){
  $description = "This represents the total billable client hours completed by the Managed Services Team for the current week starting on Sunday.";

  $query = '
  select SUM(time_entry.Hours_Actual)
from Time_Entry left outer join dbo.member      on dbo.time_entry.Member_RecID = member.Member_RecID
where time_entry.billable_flag = 1 and (member.member_id = "wblakeburn" or member.member_id = "plane" or member.member_id = "jmorgan" or member.member_id = "bfizer" or member.member_id = "rmillen")
and DATEDIFF(ww, dbo.time_entry.Date_Start, getdate())=0 and time_entry.Company_RecID <> 2';
$query2 ='select SUM(time_entry.Hours_Actual) as hoursLastWeek
  from Time_Entry left outer join dbo.member      on dbo.time_entry.Member_RecID = member.Member_RecID
  where time_entry.billable_flag = 1 and (member.member_id = "wblakeburn" or member.member_id = "plane" or member.member_id = "jmorgan" or member.member_id = "bfizer" or member.member_id = "rmillen")
  and DATEDIFF(ww, dbo.time_entry.Date_Start, getdate())=1 and time_entry.Company_RecID <> 2';
}
else{
  $query ='select SUM(time_entry.Hours_Actual)
  from Time_Entry left outer join dbo.member      on dbo.time_entry.Member_RecID = member.Member_RecID
  where time_entry.billable_flag = 1 and (dbo.member.Title like "%IT Support%" or dbo.member.Title like "%Client IT%" or dbo.member.Member_ID = "zhoover")
  and DATEDIFF(ww, dbo.time_entry.Date_Start, getdate())=0 and time_entry.Company_RecID <> 2';
  $query2 ='select SUM(time_entry.Hours_Actual) as hoursLastWeek
    from Time_Entry left outer join dbo.member      on dbo.time_entry.Member_RecID = member.Member_RecID
    where time_entry.billable_flag = 1 and (dbo.member.Title like "%IT Support%" or dbo.member.Title like "%Client IT%" or dbo.member.Member_ID = "zhoover")
    and DATEDIFF(ww, dbo.time_entry.Date_Start, getdate())=1 and time_entry.Company_RecID <> 2';
}
$projectHours = mssql_query($query);
if($query2){
  $projectHours2 = mssql_query($query2);
  $last_week = '';
  while($row = mssql_fetch_assoc($projectHours2)) {
  $last_week = $row['hoursLastWeek'];

  }
}


$query1 = str_replace('"',"",$query);
$query3 = str_replace('"',"",$query2);
$all_rows = array();
while($row = mssql_fetch_assoc($projectHours)) {
  $row["Title"] =$title;
  $row["Description"] = $description;
  $row["Query"] = $query1."---------".$query3;
  $row["Datasource"] = $datasource;
  $row["Difference"] = $row['computed'] - $last_week;
    $all_rows []= $row;
}

header("Content-Type: application/json");
echo json_encode($all_rows);
?>
