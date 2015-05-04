<?php

require('../../config/config.php');
$title = "Billable Hrs by Member - This Wk";
$description = "This represents the total billable client hours completed by the Service Delivery Team by member, by day, this week";
$datasource = "Connectwise";

$actual_link = $_SERVER['HTTP_REFERER'];
$path = parse_url($actual_link,PHP_URL_PATH);
//$path = strstr($path,"/service_delivery");
//echo $path;
if (strpos($path,'servicedelivery') !== false) {
  if(isset($_GET['member'])){
    $member = $_GET['member'];
    $query ='select SUM(time_entry.Hours_Actual) as billable_hours,DATENAME(dw,dbo.time_entry.Date_Start) as day,day(dbo.time_entry.Date_Start)
  from Time_Entry left outer join dbo.member  on dbo.time_entry.Member_RecID = member.Member_RecID
  left outer join dbo.company on dbo.time_entry.company_recid = company.company_recid
  where dbo.member.member_id = "'.$member.'" and time_entry.billable_flag = 1
  and DATEDIFF(ww, dbo.time_entry.Date_Start, getdate())=0 and time_entry.Company_RecID <> 2
  group by DATENAME(dw,dbo.time_entry.Date_Start),day(dbo.time_entry.Date_Start)
  order by day(dbo.time_entry.Date_Start)
  ';

}else{
  $query = 'select member.member_id,SUM(time_entry.Hours_Actual) as billable_hours
from Time_Entry left outer join dbo.member      on dbo.time_entry.Member_RecID = member.Member_RecID
where (dbo.member.Title like "%IT Support%")
and DATEDIFF(ww, dbo.time_entry.Date_Start, getdate())=0 and time_entry.Company_RecID <> 2
group by member.member_id
order by member.member_id desc';
  }
}elseif(strpos($path,'CIM') !== false){

  $query = '
  select member.member_id,SUM(time_entry.Hours_Actual) as billable_hours
  from Time_Entry left outer join dbo.member      on dbo.time_entry.Member_RecID = member.Member_RecID
  where time_entry.billable_flag = 1 and (dbo.member.Title like "%Client IT%" or member.member_id ="zhoover")
  and DATEDIFF(ww, dbo.time_entry.Date_Start, getdate())=0 and time_entry.Company_RecID <> 2
  group by member.member_id
  order by member.member_id desc
  ';

}
elseif(strpos($path,'fieldservices') !== false){
  if(isset($_GET['member'])){
    $member = $_GET['member'];
    $query ='select SUM(time_entry.Hours_Actual) as billable_hours,DATENAME(dw,dbo.time_entry.Date_Start) as day,day(dbo.time_entry.Date_Start)
  from Time_Entry left outer join dbo.member  on dbo.time_entry.Member_RecID = member.Member_RecID
  left outer join dbo.company on dbo.time_entry.company_recid = company.company_recid
  where dbo.member.member_id = "'.$member.'" and time_entry.billable_flag = 1
  and DATEDIFF(ww, dbo.time_entry.Date_Start, getdate())=0 and time_entry.Company_RecID <> 2
  group by DATENAME(dw,dbo.time_entry.Date_Start),day(dbo.time_entry.Date_Start)
  order by day(dbo.time_entry.Date_Start)
  ';

}else{
  $query = '
  select member.member_id,SUM(time_entry.Hours_Actual) as billable_hours
  from Time_Entry left outer join dbo.member      on dbo.time_entry.Member_RecID = member.Member_RecID
  where time_entry.billable_flag = 1 and (dbo.member.Title like "%Client IT%" or member.member_id ="zhoover")
  and DATEDIFF(ww, dbo.time_entry.Date_Start, getdate())=0 and time_entry.Company_RecID <> 2
  group by member.member_id
  order by member.member_id desc
  ';
}
}
elseif(strpos($path,'managedservices') !== false){
  $description = "This represents the total billable client hours completed by the Managed Services Team by member, by day, this week";
  if(isset($_GET['member'])){
    $member = $_GET['member'];
    $query ='select SUM(time_entry.Hours_Actual) as billable_hours,DATENAME(dw,dbo.time_entry.Date_Start) as day,day(dbo.time_entry.Date_Start)
  from Time_Entry left outer join dbo.member  on dbo.time_entry.Member_RecID = member.Member_RecID
  where dbo.member.member_id = "'.$member.'" and time_entry.billable_flag = 1
  and DATEDIFF(ww, dbo.time_entry.Date_Start, getdate())=0 and time_entry.Company_RecID <> 2
  group by DATENAME(dw,dbo.time_entry.Date_Start),day(dbo.time_entry.Date_Start)
  order by day(dbo.time_entry.Date_Start)
  ';

}else{
  $query = '
  select member.member_id,SUM(time_entry.Hours_Actual) as billable_hours
  from Time_Entry left outer join dbo.member      on dbo.time_entry.Member_RecID = member.Member_RecID
  where time_entry.billable_flag = 1 and (member.member_id = "plane" or member.member_id = "jmorgan" or member.member_id = "bfizer" or member.member_id = "rmillen")
  and DATEDIFF(ww, dbo.time_entry.Date_Start, getdate())=0 and time_entry.Company_RecID <> 2
  group by member.member_id
  order by member.member_id desc
  ';
}


}elseif(strpos($path,'results') !== false){
  if(isset($_GET['member'])){
    $member = $_GET['member'];
    $query ='select SUM(time_entry.Hours_Actual) as billable_hours,DATENAME(dw,dbo.time_entry.Date_Start) as day,day(dbo.time_entry.Date_Start)
  from Time_Entry left outer join dbo.member  on dbo.time_entry.Member_RecID = member.Member_RecID
  left outer join dbo.company on dbo.time_entry.company_recid = company.company_recid
  where company.company_name="Results Physiotherapy" and dbo.member.member_id = "'.$member.'" and time_entry.billable_flag = 1
  and DATEDIFF(ww, dbo.time_entry.Date_Start, getdate())=0 and time_entry.Company_RecID <> 2
  group by DATENAME(dw,dbo.time_entry.Date_Start),day(dbo.time_entry.Date_Start)
  order by day(dbo.time_entry.Date_Start)
  ';

}else{
  $query ='select member.member_id,SUM(time_entry.Hours_Actual) as billable_hours
  from Time_Entry left outer join dbo.member on dbo.time_entry.Member_RecID = member.Member_RecID
  left outer join company on company.company_recid = time_entry.company_recid
  where time_entry.billable_flag = 1 and company_name = "Results Physiotherapy" and DATEDIFF(ww, dbo.time_entry.Date_Start, getdate())=0 and time_entry.Company_RecID <> 2
  group by member.member_id
  order by member.member_id desc';
}



}
else{

  if(isset($_GET['member'])){
    $member = $_GET['member'];
    $query ='select SUM(time_entry.Hours_Actual) as billable_hours,DATENAME(dw,dbo.time_entry.Date_Start) as day,day(dbo.time_entry.Date_Start)
  from Time_Entry left outer join dbo.member  on dbo.time_entry.Member_RecID = member.Member_RecID
  where dbo.member.member_id = "'.$member.'" and time_entry.billable_flag = 1
  and DATEDIFF(ww, dbo.time_entry.Date_Start, getdate())=0 and time_entry.Company_RecID <> 2
  group by DATENAME(dw,dbo.time_entry.Date_Start),day(dbo.time_entry.Date_Start)
  order by day(dbo.time_entry.Date_Start)
  ';

  }else{

    $query ='select member.member_id,SUM(time_entry.Hours_Actual) as billable_hours
  from Time_Entry left outer join dbo.member      on dbo.time_entry.Member_RecID = member.Member_RecID
  where time_entry.billable_flag = 1 and (dbo.member.Title like "%IT Support%" or dbo.member.Title like "%Client IT%" or dbo.member.member_id="zhoover")
  and DATEDIFF(ww, dbo.time_entry.Date_Start, getdate())=0 and time_entry.Company_RecID <> 2
  group by member.member_id
  order by member.member_id desc';

  }



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
