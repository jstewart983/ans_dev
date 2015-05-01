<?php
require('../../config/config.php');




$query = 'SELECT SR_service.summary as type,sum(time_entry.hours_actual) as typeCount
FROM cwwebapp_ans.dbo.Company Company, cwwebapp_ans.dbo.SR_Board SR_Board,dbo.member, cwwebapp_ans.dbo.SR_Service SR_Service, cwwebapp_ans.dbo.SR_Type SR_Type,cwwebapp_ans.dbo.Time_Entry
WHERE Company.Company_RecID = Time_Entry.Company_RecID AND
SR_Service.SR_Service_RecID = Time_Entry.SR_Service_RecID AND
Company.Company_RecID = SR_Service.Company_RecID AND
SR_Type.SR_Type_RecID = SR_Service.SR_Type_RecID AND
SR_Board.SR_Board_RecID = SR_Service.SR_Board_RecID AND
SR_Board.SR_Board_RecID = SR_Type.SR_Board_RecID AND SR_Service.Closed_By = Member.Member_ID


and DATEDIFF( ww, dbo.Time_Entry.Date_Entered_UTC, GETDATE() ) = 0 and (member.member_id = "plane" or member.member_id = "jmorgan" or member.member_id = "bfizer" or member.member_id = "rmillen")
group by SR_service.summary
order by typeCount desc';

$openTickets = mssql_query($query);


echo "<table id='msTypeTable' style='width:100%;width:100%;overflow-y: scroll !important;height:478px;' class='table table-hover'>";
echo "<thead>";
echo "<th>Type</th>";
echo "<th>Hours</th>";
echo "</thead>";

echo "<tbody >";
// fetch all rows from the query
//$all_rows = array();

while($row = mssql_fetch_array($openTickets)) {




	echo "<tr>";
    echo "<td>".$row['type']."</td>";
     echo "<td>".$row['typeCount']."</td>";
    echo "</tr>";

}
echo "</tbody>";
echo "</table>";
//header("Content-Type: application/json");

echo "</div>";


?>
