<?php
 require('../../config/config.php');
if(isset($_GET['member'])){
  if(isset($_GET['start']) && isset($_GET['end'])){

    $start = $_GET['start'];
    $end = $_GET['end'];

    $projectHours = mssql_query('select member.member_id,sum(time_entry.hours_actual) as thisWeek from time_entry
    left outer join member on time_entry.member_recid = member.member_recid
    where member.role_id = "Technology Consultant" and time_entry.pm_project_recid is not null and
    (time_entry.date_start >= "'.$start.'" and time_entry.date_start <= "'.$end.'")
    group by member.member_id');

  }else{
    if(isset($_GET['lastweek']))
    {
      //project hours completed last week
      $projectHours = mssql_query('select member.member_id, sum(time_entry.hours_actual) as thisWeek from time_entry
      left outer join member on time_entry.member_recid = member.member_recid
      where member.role_id = "Technology Consultant" and time_entry.pm_project_recid is not null and
      datediff(ww,time_entry.date_start,getdate()) = 1
      group by member.member_id');

    }else{
      //project hours completed last week
      $projectHours = mssql_query('select member.member_id,sum(time_entry.hours_actual) as thisWeek from time_entry
      left outer join member on time_entry.member_recid = member.member_recid
      where member.role_id = "Technology Consultant" and time_entry.pm_project_recid is not null and
      datediff(ww,time_entry.date_start,getdate()) = 0
      group by member.member_id');

    }
  }


}else{
  if(isset($_GET['start']) && isset($_GET['end'])){

    $start = $_GET['start'];
    $end = $_GET['end'];

    $projectHours = mssql_query('select sum(time_entry.hours_actual) as thisWeek from time_entry
    left outer join member on time_entry.member_recid = member.member_recid
    where member.role_id = "Technology Consultant" and time_entry.pm_project_recid is not null and
    (time_entry.date_start >= "'.$start.'" and time_entry.date_start <= "'.$end.'")');

  }else{

  if(isset($_GET['lastweek']))
  {
    //project hours completed last week
    $projectHours = mssql_query('select sum(time_entry.hours_actual) as thisWeek from time_entry
    left outer join member on time_entry.member_recid = member.member_recid
    where member.role_id = "Technology Consultant" and time_entry.pm_project_recid is not null and
    datediff(ww,time_entry.date_start,getdate()) = 1');

    $projectHoursLastWeek = mssql_query('select sum(time_entry.hours_actual) as lastWeek from time_entry
    left outer join member on time_entry.member_recid = member.member_recid
    where member.role_id = "Technology Consultant" and time_entry.pm_project_recid is not null and
    datediff(ww,time_entry.date_start,getdate()) = 2 ');

  }else{
    //project hours completed last week
    $projectHours = mssql_query('select sum(time_entry.hours_actual) as thisWeek from time_entry
    left outer join member on time_entry.member_recid = member.member_recid
    where member.role_id = "Technology Consultant" and time_entry.pm_project_recid is not null and
    datediff(ww,time_entry.date_start,getdate()) = 0');

    $projectHoursLastWeek = mssql_query('select sum(time_entry.hours_actual) as lastWeek from time_entry
    left outer join member on time_entry.member_recid = member.member_recid
    where member.role_id = "Technology Consultant" and time_entry.pm_project_recid is not null and
    datediff(ww,time_entry.date_start,getdate()) = 1 ');
  }

  }
}



// fetch all rows from the query
$all_rows = array();
while($row = mssql_fetch_assoc($projectHours)) {
    $all_rows []= $row;
}
//$all_rows[0]['thisWeek'] = 67;
/*while($row2 = mssql_fetch_assoc($projectHoursLastWeek)){
  $all_rows [] = $row2;
}*/

header("Content-Type: application/json");
echo json_encode($all_rows);
?>
