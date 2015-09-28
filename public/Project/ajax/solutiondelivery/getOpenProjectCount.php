<?php

require('../../config/config.php');
$actual_link = $_SERVER['HTTP_REFERER'];
$title = "Open Client Projects";
$description = "This is a count of all client projects that are currently open";
$datasource = "Connectwise";


$query = "select count(*) as openProjects from pm_project
left outer join pm_type on pm_project.pm_type_recid = pm_type.pm_type_recid
left outer join pm_status on pm_project.PM_Status_RecID = pm_status.pm_status_recid
left outer join company on pm_project.company_recid = company.company_recid
where pm_status.description <> 'Closed' and pm_type.description = 'Client Project'";



$openProjectQuery = mssql_query($query);
$query1 = str_replace('"',"",$query);

// fetch all rows from the query
$all_rows = array();
while($row = mssql_fetch_assoc($openProjectQuery)) {
  $row["Title"] =$title;
  $row["Description"] = $description;
  $row["Query"] = $query1;
  $row["Datasource"] = $datasource;
    $all_rows []= $row;
}

header("Content-Type: application/json");
echo json_encode($all_rows);
?>
