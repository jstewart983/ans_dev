<?php

require('../../config.php');
$title = "Billable Hrs - This Week";
$description = "This represents the total billable client hours completed by the Service Delivery Team for the current week starting on Sunday.";
$datasource = "Connectwise";

$actual_link = $_SERVER['HTTP_REFERER'];
$path = parse_url($actual_link,PHP_URL_PATH);
//$path = strstr($path,"/service_delivery");
//echo $path;
if (strpos($path,'desk') !== false) {

  $query = 'select SUM(time_entry.Hours_Bill)
  from Time_Entry left outer join dbo.member      on dbo.time_entry.Member_RecID = member.Member_RecID
  where (dbo.member.Title like "%IT Support%")
  and DATEDIFF(ww, dbo.time_entry.Date_Start, getdate())=0 and time_entry.Company_RecID <> 2';

}elseif(strpos($path,'CIM') !== false){


  $query = '
  select SUM(time_entry.Hours_Bill)
from Time_Entry left outer join dbo.member      on dbo.time_entry.Member_RecID = member.Member_RecID
where (dbo.member.Title like "%Client IT%" or dbo.member.Member_ID = "zhoover")
and DATEDIFF(ww, dbo.time_entry.Date_Start, getdate())=0 and time_entry.Company_RecID <> 2';

}elseif(strpos($path,'results') !== false){

  $query ='select SUM(time_entry.Hours_Bill)
  from Time_Entry left outer join dbo.member on dbo.time_entry.Member_RecID = member.Member_RecID
  left outer join company on company.company_recid = time_entry.company_recid
  where company_name = "Results Physiotherapy" and DATEDIFF(ww, dbo.time_entry.Date_Start, getdate())=0 and time_entry.Company_RecID <> 2';

}
else{
  $query ='select SUM(time_entry.Hours_Bill)
  from Time_Entry left outer join dbo.member      on dbo.time_entry.Member_RecID = member.Member_RecID
  where (dbo.member.Title like "%IT Support%" or dbo.member.Title like "%Client IT%" or dbo.member.Member_ID = "zhoover")
  and DATEDIFF(ww, dbo.time_entry.Date_Start, getdate())=0 and time_entry.Company_RecID <> 2';

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
