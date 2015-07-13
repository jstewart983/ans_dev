
<?php
error_reporting(-1);
ini_set('display_errors', 'On');
require('../../config/config.php');

$query = 'SELECT datepart(wk,sr_service.date_closed) as weekNo,year(sr_service.date_closed) as year,COUNT(distinct(sr_service.sr_service_recid)) AS Count
  FROM SR_Service
  LEFT OUTER JOIN dbo.SR_Board on dbo.SR_Service.SR_Board_RecID = dbo.SR_Board.SR_Board_RecID
  left outer join member on member.member_id = sr_service.closed_by
  left outer join time_entry on SR_Service.sr_service_recid = time_entry.sr_service_recid
  where year(sr_service.date_closed) = year(getdate()) and time_entry.Hours_Actual > 0 and dbo.member.Title like "%IT Support%"
GROUP BY datepart(wk,sr_service.date_closed),year(sr_service.date_closed)
order by datepart(wk,sr_service.date_closed)';

$avgQuery = mssql_query($query);

$total = 0;
$count = 0;

while($avgClosed = mssql_fetch_assoc($avgQuery)){
  $count++;
  $total = $total + $avgClosed['Count'];
  print_r($avgClosed);
}
echo "<br />";
echo $count;
echo "<br />";
echo $total;
echo "<br />";
echo $total / $count;


?>
