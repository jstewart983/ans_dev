
<?php
 require('../../config/config.php');
//project hours completed last week
$projectHours = mssql_query('
SELECT  count(dbo.SO_Opp_Status.Description) as count





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

');




while($row = mssql_fetch_assoc($projectHours)) {
    echo $row['count'];
}




?>
