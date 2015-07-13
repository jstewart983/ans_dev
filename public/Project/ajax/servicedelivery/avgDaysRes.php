<?php

error_reporting(-1);
ini_set('display_errors', 'On');
require('../../config/config.php');

  $query ='select sr_type.description,sr_service.summary,CONVERT(date,sr_service.date_entered) as dateEntered,convert(date,sr_service.date_closed) as dateClosed, sr_service.sr_service_recid as ticketNo,DATEDIFF(DAY, sr_service.date_entered,sr_service.date_closed) as daysOpen
  from dbo.SR_Service left outer join dbo.sr_board on dbo.sr_service.sr_board_recid = dbo.sr_board.sr_board_recid
  left outer join member on member.member_id = sr_service.closed_by
  left outer join time_entry on SR_Service.sr_service_recid = time_entry.sr_service_recid
  left outer join sr_type on sr_service.sr_type_recid = sr_type.sr_type_recid
  where year(sr_service.date_entered) = year(getdate()) and (dbo.member.Title like "%IT Support%") and convert(date,sr_service.date_closed) <> convert(date,sr_service.date_entered)
  order by DATEDIFF(DAY, sr_service.date_entered,sr_service.date_closed) desc';

  /*$query ='select CONVERT(VARCHAR(8),sr_service.date_entered, 108) + ' ' + RIGHT(CONVERT(VARCHAR(30), sr_service.date_entered, 9), 2), sr_service.sr_service_recid as ticketNo,DATEDIFF(DAY, sr_service.date_entered,sr_service.date_closed) as daysOpen
  from dbo.SR_Service Where year(sr_service.date_entered)= 2015';*/

echo "<table>";
echo "<tr>";
echo "<th>Type</th>";
echo "<th>Summary</th>";
echo "<th>Date Entered</th>";
echo "<th>Date Closed</th>";
echo "<th>TicketNo</th>";
echo "<th>Days Open</th>";

$avgDays = mssql_query($query);
$query1 = str_replace('"',"",$query);

$tickets = 0;
$totalDays = 0;
//$avg = $totalDays / $tickets;

$all_rows = array();
while($row = mssql_fetch_assoc($avgDays)) {
    //$all_rows []= $row;
    $tickets++;
    $totalDays = $totalDays + $row['daysOpen'];
    echo "<tr>";
    echo ."<td>".$row['description']."</td><td>".$row['summary']."</td><td>".$row['dateEntered']."</td><td>".$row['dateClosed']."</td><td>".$row['ticketNo']."</td><td>".$row['daysOpen']."</td>";
    echo "</tr>";
}
echo "</table>";
echo "<br />";
echo "<p>---------</p>";
echo "Ticket Count: ".$tickets;
echo "<br />";
echo "Total Days: ".$totalDays;
echo "<br />";
echo "Average: ".$totalDays / $tickets;
//header("Content-Type: application/json");
//echo json_encode($all_rows);

?>
