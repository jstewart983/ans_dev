<?php
 require('../../config/config.php');

//project hours completed last week
$projectHours = mssql_query('DECLARE @Date_Start DATETIME
SET @Date_Start = DATEADD(wk, DATEDIFF(wk, 7, CURRENT_TIMESTAMP), 7)



SELECT SUM(CASE WHEN dbo.time_entry.PM_Project_RecID IS NOT NULL THEN dbo.time_entry.Hours_Actual ELSE 0 END) AS Project_Hours
FROM         dbo.Time_Entry LEFT OUTER JOIN
                      dbo.TE_Charge_Code ON dbo.Time_Entry.TE_Charge_Code_RecID = dbo.TE_Charge_Code.TE_Charge_Code_RecID LEFT OUTER JOIN
                      dbo.Member ON dbo.Time_Entry.Member_RecID = dbo.Member.Member_RecID
WHERE     (dbo.Member.Role_ID = "Technology Consultant") AND (dbo.Time_Entry.Date_Start > CONVERT(DATETIME, "2015-01-01 00:00:00", 102))
and (dbo.Time_Entry.Date_Start >= (@Date_Start))


');


// fetch all rows from the query
$all_rows = array();
while($row = mssql_fetch_assoc($projectHours)) {
    $all_rows []= $row;
}

header("Content-Type: application/json");
echo json_encode($all_rows);
?>
