<?php
require('../../config.php');
$title = "Tickets Open vs Tickets Closed - Last Year to Last Month";
$description ="This chart displays the number of tickets both created and completed as well as the number of billable hours worked, from last year to last month. The purpose of this chart is to display trends in the ";
$actual_link = $_SERVER['HTTP_REFERER'];
$path = parse_url($actual_link,PHP_URL_PATH);
//$path = strstr($path,"/service_delivery");
//echo $path;
if (strpos($path,'results') !== false) {

  $projectHours = mssql_query('
  SELECT   month(dbo.time_entry.date_entered_utc) as month,year(dbo.time_entry.date_entered_utc) as year,

  SUM(time_entry.Hours_Bill) AS Billable_Hours AS Billable_Hours
  FROM         dbo.Time_Entry LEFT OUTER JOIN
                        dbo.TE_Charge_Code ON dbo.Time_Entry.TE_Charge_Code_RecID = dbo.TE_Charge_Code.TE_Charge_Code_RecID LEFT OUTER JOIN
                        dbo.Member ON dbo.Time_Entry.Member_RecID = dbo.Member.Member_RecID
                        left outer join company on company.company_recid = time_entry.company_recid
  WHERE  company.company_name = "Results Physiotherapy" and (convert(char(6), dbo.time_entry.date_entered_utc, 112) <> convert(char(6), getdate(), 112) and year(time_entry.date_entered_utc) > year(getdate())-2)

  group by month(dbo.time_entry.date_entered_utc),year(dbo.time_entry.date_entered_utc)
  order by year(dbo.time_entry.date_entered_utc),month(dbo.time_entry.date_entered_utc)');


}else{

  $projectHours = mssql_query('
  SELECT   month(dbo.time_entry.date_entered_utc) as month,year(dbo.time_entry.date_entered_utc) as year,

  SUM(time_entry.Hours_Bill) AS Billable_Hours
  FROM         dbo.Time_Entry LEFT OUTER JOIN
                        dbo.Member ON dbo.Time_Entry.Member_RecID = dbo.Member.Member_RecID
                        left outer join company on company.company_recid = time_entry.company_recid
  WHERE
  (dbo.Member.Member_id = "bdyer" or
  dbo.Member.Member_id = "tbrown" or
  dbo.Member.Member_id = "cvarga" or
  dbo.Member.Member_id = "badams" or
  dbo.Member.Member_id = "pfotineas" or
  dbo.Member.Member_id = "dmitchell" or
  dbo.Member.Member_id = "jfelts" or
  dbo.Member.Member_id = "jsimpler" or
  dbo.Member.Member_id = "mmcburnett" or
  dbo.Member.Member_id = "mblake" or
  dbo.Member.Member_id = "sfrench" or
  dbo.Member.Member_id = "jhaltom" or
  dbo.Member.Member_id = "vhall" or
  dbo.Member.Member_id = "jhultman" or
  dbo.Member.Member_id = "nwhitaker" or
  dbo.Member.Member_id = "breynolds" or
  dbo.Member.Member_id = "jdumouchel" or
  dbo.Member.Member_id = "jfitzwater" or
  dbo.Member.Member_id = "pfrench") and
  (convert(char(6), dbo.time_entry.date_entered_utc, 112) <> convert(char(6), getdate(), 112) and year(time_entry.date_entered_utc) > year(getdate())-2)

  group by month(dbo.time_entry.date_entered_utc),year(dbo.time_entry.date_entered_utc)
  order by year(dbo.time_entry.date_entered_utc),month(dbo.time_entry.date_entered_utc)');

}

// fetch all rows from the query
$all_rows = array();
while($row = mssql_fetch_assoc($projectHours)) {
    $all_rows []= $row;
}

header("Content-Type: application/json");
echo json_encode($all_rows);
?>
