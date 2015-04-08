
<?php
require('../../config.php');
ini_set('memory_limit', '512M');
//project hours completed last week
if(isset($_GET['company'])){

$company = $_GET['company'];
$company = urldecode($company);
$results = mssql_query('select TicketNbr,Urgency,ServiceType,month(date_entered) as monthNum,year(date_entered) as yearNum,day(date_entered) as dayNum,cast(date_entered as time) [time],month(date_resolved_utc) as monthRes,year(date_resolved_utc) as yearRes,day(date_resolved_utc) as dayRes from dbo.v_rpt_service
where company_name = "'.$company.'" and Board_Name = "My Company/Service"');
}else{
  $results = mssql_query('select TicketNbr,Urgency,ServiceType,month(date_entered) as monthNum,year(date_entered) as yearNum,day(date_entered) as dayNum,cast(date_entered as time) [time],month(date_resolved_utc) as monthRes,year(date_resolved_utc) as yearRes,day(date_resolved_utc) as dayRes from dbo.v_rpt_service
  where  Board_Name = "My Company/Service"');
}

$all_rows = array();

while($row = mssql_fetch_array($results)){
  //print_r($row);
  $all_rows [] = $row;
}




header("Content-Type: application/json");
echo json_encode($all_rows);

?>
