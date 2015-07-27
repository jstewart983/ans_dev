<?php
 require('../../config/config.php');

if(isset($_GET['start']) && isset($_GET['end']))
{
  $start = $_GET['start'];
  $end = $_GET['end'];
  $projectHours = mssql_query('select company.company_name,pm_project.project_id,sum(time_entry.hours_actual) as hours from time_entry
left outer join member on time_entry.member_recid = member.member_recid
left outer join pm_project on time_entry.pm_project_recid = pm_project.pm_project_recid
left outer join pm_type on pm_project.pm_type_recid = pm_type.pm_type_recid
left outer join company on pm_project.company_recid = company.company_recid
where pm_type.description = "Client Project" and member.role_id = "Technology Consultant" and time_entry.pm_project_recid is not null and
(time_entry.date_start >= "'.$start.'" and time_entry.date_start <= "'.$end.'")
group by pm_project.project_id,company.company_name
order by sum(time_entry.hours_actual) desc');

}else{


  if(isset($_GET['lastweek']))
  {
    //project hours completed last week
    $projectHours = mssql_query('select company.company_name,pm_project.project_id,sum(time_entry.hours_actual) as hours from time_entry
left outer join member on time_entry.member_recid = member.member_recid
left outer join pm_project on time_entry.pm_project_recid = pm_project.pm_project_recid
left outer join pm_type on pm_project.pm_type_recid = pm_type.pm_type_recid
left outer join company on pm_project.company_recid = company.company_recid
where pm_type.description = "Client Project" and member.role_id = "Technology Consultant" and time_entry.pm_project_recid is not null and
datediff(ww,time_entry.date_start,getdate()) = 1
group by pm_project.project_id,company.company_name
order by sum(time_entry.hours_actual) desc');



  }else{
    //project hours completed last week
    $projectHours = mssql_query('select company.company_name,pm_project.project_id,sum(time_entry.hours_actual) as hours from time_entry
left outer join member on time_entry.member_recid = member.member_recid
left outer join pm_project on time_entry.pm_project_recid = pm_project.pm_project_recid
left outer join pm_type on pm_project.pm_type_recid = pm_type.pm_type_recid
left outer join company on pm_project.company_recid = company.company_recid
where pm_type.description = "Client Project" and member.role_id = "Technology Consultant" and time_entry.pm_project_recid is not null and
datediff(ww,time_entry.date_start,getdate()) = 0
group by pm_project.project_id,company.company_name
order by sum(time_entry.hours_actual) desc');


  }

}
echo "<table class='table table-striped'>";
echo "<thead>";
echo  "<th>Client</th>";
echo  "<th>Project</th>";
echo  "<th>Hours Executed</th>";
echo "</thead>";
echo "<tbody>";
while($row = mssql_fetch_assoc($projectHours)) {
echo  "<tr>";
echo    "<td>".$row['company_name']."</td><td>".$row['project_id']."</td><td>".$row['hours']."</td>";
echo  "</tr>";
}
echo "</tbody>";
echo "</table>";
// fetch all rows from the query
/*$all_rows = array();
while($row = mssql_fetch_assoc($projectHours)) {
    $all_rows []= $row;
}
while($row2 = mssql_fetch_assoc($projectHoursLastWeek)){
  $all_rows [] = $row2;
}*/

//header("Content-Type: application/json");
//echo json_encode($all_rows);
?>
