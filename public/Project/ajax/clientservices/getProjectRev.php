
<?php
 require('../../config.php');
 $description="";
 $datasource = "";
 $title = "Projects This Week";
//project hours completed last week
$projectHours = mssql_query('select sum(dbo.SO_Forecast_Dtl.revenue) as Tot_NonMRR_Revenue
from dbo.order_header left outer join
dbo.so_opportunity on dbo.order_header.opportunity_recid = dbo.so_opportunity.opportunity_recid left outer join
dbo.SO_Forecast_Dtl ON dbo.SO_Opportunity.Opportunity_RecID = SO_Forecast_Dtl.Opportunity_RecID
where dbo.SO_Opportunity.Date_Close_Expected  >= DATEADD(wk, DATEDIFF(wk,0,GETDATE()), -1) and  dbo.SO_Opportunity.Date_Close_Expected <= DATEADD(wk, DATEDIFF(wk,0,GETDATE()), 5) and
((dbo.so_forecast_dtl.Opportunity_RecID = dbo.SO_Opportunity.Opportunity_RecID) AND (SO_Forecast_Type_ID = "S") AND (ISNULL(Include_Flag, 0) = 1))');


// fetch all rows from the query
$all_rows = array();
while($row = mssql_fetch_assoc($projectHours)) {
    //$all_rows []= $row;
  echo $row["Tot_NonMRR_Revenue"];
}

//header("Content-Type: application/json");
//echo json_encode($all_rows);
?>
