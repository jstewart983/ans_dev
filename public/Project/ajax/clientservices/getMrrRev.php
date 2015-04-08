<?php
 require('../../config.php');
//project hours completed last week
$projectHours = mssql_query('SELECT dbo.SO_Type.Description AS Type,
        SUM(dbo.so_forecast_dtl.Revenue)
        as Tot_NonMRR_Revenue
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
WHERE     dbo.SO_Type.Description = "Recurring - Upsell" AND (dbo.SO_Team.Team_Flag = 0) AND (dbo.SO_Team.Owner_Flag = 1) and dbo.SO_Opp_Status.Description = "Won" and dbo.SO_Opportunity.Date_Close_Expected  >= DATEADD(wk, DATEDIFF(wk,0,GETDATE()), -1) and  dbo.SO_Opportunity.Date_Close_Expected <= DATEADD(wk, DATEDIFF(wk,0,GETDATE()), 5) and (dbo.so_forecast_dtl.Opportunity_RecID = dbo.SO_Opportunity.Opportunity_RecID)  AND (dbo.so_forecast_dtl.Include_Flag = 1)


group by dbo.so_type.Description');


// fetch all rows from the query
//$all_rows = array();
$i = 0;
$total = 0;
while($row = mssql_fetch_assoc($projectHours)) {

   if($i>0){
    $total+=$row["Recurring_Revenue"];
    echo $total;
   }else {
     $total = $row["Recurring_Revenue"];

   }

    $i++;
  //echo $row["Tot_NonMRR_Revenue"];
}

//header("Content-Type: application/json");
//echo json_encode($all_rows);
?>
