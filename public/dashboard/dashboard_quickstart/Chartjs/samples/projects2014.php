 <?php
 require('config.php');

if(isset($_GET['company'])){
	$company = $_GET['company'];
			$openTickets = mssql_query('select count(*) as projectsCreated, dbo.company.company_name,datename(month,pm_project.date_entered),month(pm_project.date_entered) as monthNumber from PM_Project
left outer join company on dbo.company.company_recid = dbo.PM_Project.company_recid
left outer join PM_Status on pm_status.PM_Status_RecID = pm_project.pm_status_recid
where year(pm_project.date_entered) = "2014" and  company.company_name = "'.$company.'" group by dbo.company.company_name,datename(month,pm_project.date_entered),month(pm_project.date_entered) order by monthNumber');
		}else{
						$openTickets = mssql_query('select count(*) as projectsCreated,datename(month,pm_project.date_entered),month(pm_project.date_entered) as monthNumber from PM_Project
left outer join company on dbo.company.company_recid = dbo.PM_Project.company_recid
left outer join PM_Status on pm_status.PM_Status_RecID = pm_project.pm_status_recid
where year(pm_project.date_entered) = "2014"  group by datename(month,pm_project.date_entered),month(pm_project.date_entered) order by monthNumber');
		}





if(!$openTickets){
  die("Error: ".mssql_get_last_message());
}


// fetch all rows from the query
$all_rows = array();
while($row = mssql_fetch_assoc($openTickets)) {
    $all_rows []= $row;
}

header("Content-Type: application/json");
echo json_encode($all_rows);
//echo$company;
?>