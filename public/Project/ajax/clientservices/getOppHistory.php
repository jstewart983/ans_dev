
<?php
require('../../config.php');
//ini_set('memory_limit', '512M');
//project hours completed last week
if(isset($_GET['company'])){

$company = $_GET['company'];
//$company = urldecode($company);
$results = mssql_query('select dbo.so_opportunity.opportunity_name as oppName,
year(dbo.so_opportunity.date_became_lead) as yearNum,
month(dbo.so_opportunity.date_became_lead) as monthNum,
day(dbo.so_opportunity.date_became_lead) as dayNum,
year(date_closed) as yearRes,
month(date_closed) as monthRes,
day(date_closed) as dayRes,
date_closed
from dbo.so_opportunity
left outer join dbo.company on dbo.company.company_recid = dbo.so_opportunity.company_recid

WHERE dbo.company.company_name = "'.$company.'"');
}else{
  $results = mssql_query('select dbo.so_opportunity.opportunity_name,dbo.so_opportunity.date_became_lead,date_closed
  from dbo.so_opportunity
  left outer join dbo.company on dbo.company.company_recid = dbo.so_opportunity.company_recid');
}

$all_rows = array();

while($row = mssql_fetch_array($results)){
  //print_r($row);
  $all_rows [] = $row;
}




header("Content-Type: application/json");
echo json_encode($all_rows);

?>
