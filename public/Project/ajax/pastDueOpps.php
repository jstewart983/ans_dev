
<?php
 require('../config.php');
//project hours completed last week
$projectHours = mssql_query('
SELECT dbo.Member.First_Name, dbo.Member.Last_Name, dbo.Company.Company_Name, dbo.SO_Opportunity.Opportunity_RecID, dbo.SO_Opportunity.Opportunity_Name,
                      dbo.SO_Type.Description AS Type, dbo.SO_Opp_Status.Description AS Status, dbo.SO_Pipeline.Description AS Stage, dbo.SO_Interest.Description AS Rating,
                      dbo.SO_Opportunity.Probability_to_Close AS Probability, dbo.SO_Opportunity.Date_Close_Expected




FROM         dbo.SO_Opportunity INNER JOIN
                      dbo.SO_Team ON dbo.SO_Opportunity.Opportunity_RecID = dbo.SO_Team.Opportunity_RecID LEFT OUTER JOIN
                      dbo.SO_Forecast_Dtl AS SO_Forecast_Dtl_10 ON dbo.SO_Opportunity.Opportunity_RecID = SO_Forecast_Dtl_10.Opportunity_RecID LEFT OUTER JOIN
                      dbo.SO_Opp_Status ON dbo.SO_Opportunity.SO_Opp_Status_RecID = dbo.SO_Opp_Status.SO_Opp_Status_RecID LEFT OUTER JOIN
                      dbo.SO_Interest ON dbo.SO_Opportunity.SO_Interest_RecID = dbo.SO_Interest.SO_Interest_RecID LEFT OUTER JOIN
                      dbo.SO_Pipeline ON dbo.SO_Opportunity.SO_Pipeline_RecID = dbo.SO_Pipeline.SO_Pipeline_RecID LEFT OUTER JOIN
                      dbo.SO_Type ON dbo.SO_Opportunity.SO_Type_RecID = dbo.SO_Type.SO_Type_RecID LEFT OUTER JOIN
                      dbo.Member ON dbo.SO_Team.member_id = dbo.Member.Member_ID LEFT OUTER JOIN
                      dbo.Company ON dbo.SO_Opportunity.Company_RecID = dbo.Company.Company_RecID LEFT OUTER JOIN
                      dbo.Order_Header on dbo.SO_Opportunity.Opportunity_RecID = dbo.Order_Header.Opportunity_RecID
WHERE     (dbo.SO_Team.Team_Flag = 0) AND (dbo.SO_Team.Owner_Flag = 1) and year(dbo.SO_Opportunity.Date_Close_Expected) = year(getdate()) and dbo.SO_Opp_Status.Description = "Open" and dbo.SO_Opportunity.Date_Close_Expected < getdate() and company.company_name <> "Advanced Network Solutions"
group by dbo.SO_Opportunity.Opportunity_RecID,dbo.member.First_Name,dbo.member.Last_Name,dbo.company.Company_Name,dbo.SO_Opportunity.Opportunity_Name,dbo.so_type.Description,dbo.SO_Opp_Status.Description, dbo.SO_Pipeline.Description, dbo.SO_Interest.Description,
                      dbo.SO_Opportunity.Probability_to_Close, dbo.SO_Opportunity.Date_Close_Expected, SO_Opp_Status.Closed_Flag, dbo.Order_Header.Order_Header_RecID, dbo.Order_Header.Total, dbo.order_header.Order_Date
order by dbo.SO_Opportunity.Date_Close_Expected');


echo "<div style='width:100%;padding:0px;'class=' panel panel-default'>";

echo "<div style='width:100%;'class=panel-body>";
echo "<table id='clientTable' style='width:100%;' class='table table-hover'>";
echo "<thead>";
echo "<th>vCIO Name</th>";
echo "<th>Client</th>";
echo "<th>Opp Name</th>";
echo "<th>Type</th>";
echo "<th>Stage</th>";
echo "<th>Probability</th>";
echo "<th>Est. Close Date</th>";
echo "</thead>";

echo "<tbody  class='rowlink'>";
// fetch all rows from the query
//$all_rows = array();

while($row = mssql_fetch_array($projectHours)) {




	echo "<tr>";
    echo "<td>".$row['First_Name']." ".$row['Last_Name']."</td>";
    echo "<td>".$row['Company_Name']."</td>";
	echo "<td>".$row['Opportunity_Name']."</td>";
	echo "<td>".$row['Type']."</td>";
	echo "<td>".$row['Stage']."</td>";
	echo "<td>".$row['Probability']."%</td>";
	echo "<td>".$row['Date_Close_Expected']."</td>";
    echo "</tr>";

}
echo "</tbody>";
echo "</table>";
//header("Content-Type: application/json");

echo "</div>";
?>
