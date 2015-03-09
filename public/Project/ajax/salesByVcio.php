
<?php
 require('../config.php');
//project hours completed last week
$projectHours = mssql_query('SELECT
        SUM(dbo.so_forecast_dtl.Revenue)
        as Tot_NonMRR_Revenue,member.first_name
    FROM         dbo.SO_Forecast_Dtl,dbo.SO_Opportunity INNER JOIN
                      dbo.SO_Team ON dbo.SO_Opportunity.Opportunity_RecID = dbo.SO_Team.Opportunity_RecID LEFT OUTER JOIN
                      dbo.SO_Forecast_Dtl AS SO_Forecast_Dtl_10 ON dbo.SO_Opportunity.Opportunity_RecID = SO_Forecast_Dtl_10.Opportunity_RecID LEFT OUTER JOIN
                      dbo.SO_Opp_Status ON dbo.SO_Opportunity.SO_Opp_Status_RecID = dbo.SO_Opp_Status.SO_Opp_Status_RecID LEFT OUTER JOIN
                      dbo.SO_Interest ON dbo.SO_Opportunity.SO_Interest_RecID = dbo.SO_Interest.SO_Interest_RecID LEFT OUTER JOIN
                      dbo.SO_Pipeline ON dbo.SO_Opportunity.SO_Pipeline_RecID = dbo.SO_Pipeline.SO_Pipeline_RecID LEFT OUTER JOIN
                      dbo.SO_Type ON dbo.SO_Opportunity.SO_Type_RecID = dbo.SO_Type.SO_Type_RecID LEFT OUTER JOIN
                      dbo.Member ON dbo.SO_Team.member_id = dbo.Member.Member_ID LEFT OUTER JOIN
                      dbo.Company ON dbo.SO_Opportunity.Company_RecID = dbo.Company.Company_RecID LEFT OUTER JOIN
                      dbo.Order_Header on dbo.SO_Opportunity.Company_RecID = dbo.Order_Header.Order_Header_RecID
WHERE (dbo.SO_Team.Team_Flag = 0) AND (dbo.SO_Team.Owner_Flag = 1) and dbo.SO_Opp_Status.Description = "Won" and year(dbo.SO_Opportunity.Date_Close_Expected)="2015" and DATEPART(m,dbo.SO_Opportunity.Date_Close_Expected)=DATEPART(m,dateadd(m,-1,getdate())) and (dbo.so_forecast_dtl.Opportunity_RecID = dbo.SO_Opportunity.Opportunity_RecID) AND ((dbo.so_forecast_dtl.SO_Forecast_Type_ID = "P") or (dbo.so_forecast_dtl.SO_Forecast_Type_ID = "S")) AND (dbo.so_forecast_dtl.Include_Flag = 1) AND month(dbo.SO_Opportunity.Date_Close_Expected)<=month(getdate())
 

group by dbo.member.first_name
');


// fetch all rows from the query
$all_rows = array();
while($row = mssql_fetch_assoc($projectHours)) {
    $all_rows []= $row;
  //$row["Tot_NonMRR_Revenue"];
}

header("Content-Type: application/json");
echo json_encode($all_rows);
?>