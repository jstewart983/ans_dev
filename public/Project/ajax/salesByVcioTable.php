
<?php
 require('../config.php');
//project hours completed last week
$projectHours = mssql_query('select sum(dbo.SO_Forecast_Dtl.revenue) as total_sales,member.last_name
from dbo.order_header left outer join
dbo.so_opportunity on dbo.order_header.opportunity_recid = dbo.so_opportunity.opportunity_recid left outer join
dbo.SO_Forecast_Dtl ON dbo.SO_Opportunity.Opportunity_RecID = SO_Forecast_Dtl.Opportunity_RecID
left outer join Member on member.member_recid = order_header.member_recid
where datediff(m,dbo.SO_Opportunity.Date_Close_Expected,getdate())=0 and
((dbo.so_forecast_dtl.Opportunity_RecID = dbo.SO_Opportunity.Opportunity_RecID) AND (SO_Forecast_Type_ID = "P" or SO_Forecast_Type_ID = "S" ) AND (ISNULL(Include_Flag, 0) = 1))
group by member.Last_Name
order by total_sales desc');


echo "<div style='width:100%;padding:0px;'class=' panel panel-default'>";

echo "<div style='width:100%;'class=panel-body>";
echo "<table id='clientTable' style='width:100%;' class='table table-hover'>";
echo "<thead>";
echo "<th>vCIO</th>";
echo "<th>Total Sales</th>";
echo "</thead>";

echo "<tbody  class='rowlink'>";
// fetch all rows from the query
//$all_rows = array();

while($row = mssql_fetch_array($projectHours)) {

	

	
	echo "<tr>";
    echo "<td>".$row['last_name']."</td>";
     echo "<td>$".number_format($row['total_sales'])."</td>";
    echo "</tr>";
    
}
echo "</tbody>";
echo "</table>";
//header("Content-Type: application/json");

echo "</div>";
?>