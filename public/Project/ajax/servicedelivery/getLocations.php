<?php
error_reporting(-1);
ini_set('display_errors', 'On');
require('../../config/config.php');

//$title = "Closed First Call % - This Wk";
//$description = "This represents the percentage of tickets that were closed on the first call this week on all boards managed by the Service Delivery Team, excluding Saturday and Sunday. (CFC% = Count of Closed First Call/Total Closed)";
//$datasource = "Connectwise";
//$path = parse_url($actual_link,PHP_URL_PATH);
//$path = strstr($path,"/service_delivery");
//echo $path;
$query = 'SELECT  sum(time_entry.hours_actual), site_name from sr_service
left outer join company on sr_service.company_recid = company.company_recid
left outer join time_entry on sr_service.sr_service_recid = time_entry.sr_service_recid
left outer join sr_type on sr_service.sr_type_recid = sr_type.sr_type_recid
where company.company_name = "Results Physiotherapy" and DATEDIFF( mm, dbo.SR_Service.Date_Entered, GETDATE() ) = 0 and
(sr_type.description = "Foto" or sr_type.description = "Hardware" or sr_type.description = "Internet" or sr_type.description = "Monitoring Alerts" or
  sr_type.description = "Network" or sr_type.description = "Phone/Fax")
group by site_name
order by count(sr_service.site_name) desc';

$openTickets = mssql_query($query);

echo "<table>";
echo "<thead>";
echo "<th>Site</th>";
echo "<th>Actual Hours</th>";
echo "</thead>";
echo "<tbody>";
// fetch all rows from the query
//$all_rows = array();
while($row = mssql_fetch_assoc($openTickets)) {

    //$all_rows []= $row;

    echo "<tr>";
    echo "<td>".$row['site_name']."</td><td>".$row['computed']."</td>";
    echo "</tr>";
}
echo "</tbody>";
echo "</table>";



$query1 = 'SELECT  count(sr_service.site_name), site_name from sr_service
left outer join company on sr_service.company_recid = company.company_recid
where company.company_name = "Results Physiotherapy" and DATEDIFF( mm, dbo.SR_Service.Date_Entered, GETDATE() ) = 0
group by site_name
order by count(sr_service.site_name) desc';

$openTickets1 = mssql_query($query1);

echo "<table>";
echo "<thead>";
echo "<th>Site</th>";
echo "<th>Tickets Opened</th>";
echo "</thead>";
echo "<tbody>";
// fetch all rows from the query
//$all_rows = array();
while($row = mssql_fetch_assoc($openTickets1)) {

    //$all_rows []= $row;

    echo "<tr>";
    echo "<td>".$row['site_name']."</td><td>".$row['computed']."</td>";
    echo "</tr>";
}
echo "</tbody>";
echo "</table>";
//header("Content-Type: application/json");
//echo json_encode($all_rows);
?>
