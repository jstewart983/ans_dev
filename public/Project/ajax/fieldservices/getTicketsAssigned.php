<?php

error_reporting(-1);
ini_set('display_errors', 'On');
require('../../config/config.php');
if(isset($_GET['member'])){
  $member = $_GET['member'];
  $query ='select sr_service.sr_service_recid,sr_service.summary,sr_service_calculated.resourceList,datediff(dd,sr_service.date_entered,getdate()) as daysOpen

from sr_service

left outer join sr_service_calculated on sr_service.sr_service_recid  = sr_service_calculated.sr_service_recid

left outer join member on sr_service_calculated.resourceList = member.member_id

where sr_service.date_closed is null and member.member_id = "'.$member.'"
order by datediff(dd,sr_service.date_entered,getdate()) desc';
$projectHours = mssql_query($query);
//$query1 = str_replace('"',"",$query);

//$all_rows = array();
echo "<table class='table table-striped'>";
echo "<thead>";
echo "<tr>";
echo "<th>ticket #</th>";
echo "<th>summary</th>";
echo "<th>ResourceList</th>";
echo "<th>Days Open</th>";
echo "</thead>";

echo "<tbody>";

while($row = mssql_fetch_assoc($projectHours)) {
    echo "<tr>";
    echo "<td>".$row['sr_service_recid']."</td>"."<td>".$row['summary']."</td>"."<td>".$row['resourceList']."</td>"."<td>".$row['daysOpen']."</td>";
    echo "</tr>";
}
echo "</tbody>";
echo "</table>";


}else{


$query ="select sr_service_calculated.resourceList, datediff(dd,sr_service.date_entered,getdate()) as daysOpen,count(datediff(dd,sr_service.date_entered,getdate())) as daysOpenCount

from sr_service

left outer join sr_service_calculated on sr_service.sr_service_recid  = sr_service_calculated.sr_service_recid

left outer join member on sr_service_calculated.resourceList = member.member_id

where member.inactive_flag = 0 and sr_service.date_closed is null and (member.title like '%Client IT%' or member.member_id = 'zhoover')

group by datediff(dd,sr_service.date_entered,getdate()),sr_service_calculated.resourceList";
$projectHours = mssql_query($query);
$query1 = str_replace('"',"",$query);

$all_rows = array();
while($row = mssql_fetch_assoc($projectHours)) {
    $all_rows []= $row;
}

header("Content-Type: application/json");
echo json_encode($all_rows);
}


?>
