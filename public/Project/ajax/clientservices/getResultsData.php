 <?php
 require('../../config.php');

$openTickets = mssql_query('select Count(*)
from dbo.SR_Service LEFT OUTER JOIN dbo.SR_Board on dbo.SR_Service.SR_Board_RecID = dbo.SR_Board.SR_Board_RecID
where (dbo.SR_Board.Board_Name = "Results Physiotherapy") and dbo.SR_Service.Date_Closed is null');

if(!$openTickets){
  die("Error: ".mssql_get_last_message());
}


// fetch all rows from the query
$all_rows = array();
while($row = mssql_fetch_assoc($openTickets)) {
    $all_rows []= $row;
}

header("Content-Type: application/json");
echo json_encode($all_rows);
?>
