
<?php
 require('../../config/config.php');
 $description = "";
 $title = "";

//project hours completed last week
$projectHours = mssql_query('select sum(dbo.SO_Forecast_Dtl.revenue) as total_sales,member.last_name
from dbo.order_header left outer join
dbo.so_opportunity on dbo.order_header.opportunity_recid = dbo.so_opportunity.opportunity_recid left outer join
dbo.SO_Forecast_Dtl ON dbo.SO_Opportunity.Opportunity_RecID = SO_Forecast_Dtl.Opportunity_RecID
left outer join Member on member.member_recid = order_header.member_recid
where datediff(m,dbo.SO_Opportunity.Date_Close_Expected,getdate())=0 and
((dbo.so_forecast_dtl.Opportunity_RecID = dbo.SO_Opportunity.Opportunity_RecID) AND (SO_Forecast_Type_ID = "P" or SO_Forecast_Type_ID = "S" ) AND (ISNULL(Include_Flag, 0) = 1))
group by member.Last_Name');


// fetch all rows from the query
$all_rows = array();
while($row = mssql_fetch_assoc($projectHours)) {
    $all_rows []= $row;
  //$row["Tot_NonMRR_Revenue"];
}

header("Content-Type: application/json");
echo json_encode($all_rows);
?>
