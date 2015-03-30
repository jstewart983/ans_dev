<?php
 require('../config.php');
//project hours completed last week
$projectHours = mssql_query('
SELECT

                      SUM(dbo.time_entry.Hours_Actual) AS Billable_Hours
FROM         dbo.Time_Entry LEFT OUTER JOIN
                      dbo.TE_Charge_Code ON dbo.Time_Entry.TE_Charge_Code_RecID = dbo.TE_Charge_Code.TE_Charge_Code_RecID LEFT OUTER JOIN
                      dbo.Member ON dbo.Time_Entry.Member_RecID = dbo.Member.Member_RecID
WHERE (dbo.Member.Member_id = "bdyer" or
dbo.Member.Member_id = "tbrown" or
dbo.Member.Member_id = "cvarga" or
dbo.Member.Member_id = "badams" or
dbo.Member.Member_id = "pfotineas" or
dbo.Member.Member_id = "dmitchell" or
dbo.Member.Member_id = "jfelts" or
dbo.Member.Member_id = "jsimpler" or
dbo.Member.Member_id = "mmcburnett" or
dbo.Member.Member_id = "mblake" or
dbo.Member.Member_id = "sfrench" or
dbo.Member.Member_id = "jhaltom" or
dbo.Member.Member_id = "vhall" or
dbo.Member.Member_id = "jhultman" or
dbo.Member.Member_id = "nwhitaker" or
dbo.Member.Member_id = "breynolds" or
dbo.Member.Member_id = "jdumouchel" or
dbo.Member.Member_id = "jfitzwater" or
dbo.Member.Member_id = "pfrench")
and DATEDIFF( ww, dbo.Time_Entry.Date_Start, GETDATE() ) = 0

');


// fetch all rows from the query
$all_rows = array();
while($row = mssql_fetch_assoc($projectHours)) {
    $all_rows []= $row;
}

header("Content-Type: application/json");
echo json_encode($all_rows);
?>
