<?php
error_reporting(-1);
ini_set('display_errors', 'On');
require('../../config/config.php');

$title = "# of Hours Remaining in Queue";
$description = "This is the total of the hours budged minus hours actual on all open client projects";
$datasource = "Connectwise";


$query1 = "select pm_project.project_id,sum(pm_project.est_hours) as hours_budget from pm_project
left outer join pm_type on pm_project.pm_type_recid = pm_type.pm_type_recid
left outer join pm_status on pm_project.PM_Status_RecID = pm_status.pm_status_recid
left outer join company on pm_project.company_recid = company.company_recid
where pm_status.description <> 'Closed' and pm_type.description = 'Client Project'
group by pm_project.project_id
order by pm_project.project_id";//hours_budget query

$query2 = "select pm_project.project_id,sum(pm_project.est_hours) as hours_budget,sum(time_entry.hours_actual) as hours_actual from time_entry
right outer join pm_project on time_entry.pm_project_recid = pm_project.pm_project_recid
left outer join pm_type on pm_project.pm_type_recid = pm_type.pm_type_recid
left outer join pm_status on pm_project.PM_Status_RecID = pm_status.pm_status_recid
left outer join company on pm_project.company_recid = company.company_recid
where pm_status.description <> 'Closed' and pm_type.description = 'Client Project'
group by pm_project.project_id
order by pm_project.project_id";//hours_actual query
//



$hoursBudget = mssql_query($query1);
$hoursActual = mssql_query($query2);



$budget = array();
$actual = array();
$result = array();
$overage = 0;
$queue = 0;
$totalBudget = 0;
$totalActual = 0;
while($row1 = mssql_fetch_assoc($hoursBudget)){

  $budget [] = $row1;

}
while($row2 = mssql_fetch_assoc($hoursActual)){
  $actual [] = $row2;
}

for($i=0;$i<count($actual);$i++){
  if ($actual[$i]['hours_actual'] == null) {


    $actual[$i]['hours_actual'] = 0;
    $actual[$i]['hours_budget'] = $budget[$i]['hours_budget'];
  }
  $actual[$i]['hours_budget'] = $budget[$i]['hours_budget'];
}


for($i = 0;$i<count($actual);$i++){

  if($actual[$i]['hours_actual'] > $actual[$i]['hours_budget']){
    $totalBudget = $totalBudget + $actual[$i]['hours_budget'];
    $totalActual = $totalActual + $actual[$i]['hours_actual'];
    $overage = $overage + ($actual[$i]['hours_actual'] - $actual[$i]['hours_budget']);
    $actual[$i]['hours_actual'] = 0;
    $actual[$i]['hours_budget'] = 0;
    //$queue = $queue + ($actual[$i]['hours_budget']-$actual[$i]['hours_actual']);
  }else{
      $totalBudget = $totalBudget + $actual[$i]['hours_budget'];
      $totalActual = $totalActual + $actual[$i]['hours_actual'];
      $queue = $queue + ($actual[$i]['hours_budget']-$actual[$i]['hours_actual']);
  }


}

$result['queue'] = $queue;
$result['overage'] = $overage;
$result['totalBudget'] = $totalBudget;
$result['totalActual'] = $totalActual;

/*echo $row1['hours_budget'];
echo "<br / >";
echo $row2['hours_actual'];
echo "<br />";*/
//$all_rows_actual = $row1 - $row2;

header("Content-Type: application/json");
echo json_encode($result);
//echo $row1['hours_budget'] - $row2['hours_actual'];
//echo 1000;
//echo $queue;
?>
