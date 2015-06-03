<?php
error_reporting(-1);
ini_set('display_errors', 'On');
require('../../config/config.php');

$title = "Chronic Site Identification - This Month";
$description = "These two tables are a live look at the sites that we are spending the most time on and the sites that are opening the most tickets. Both the time and tickets only look at tickets with the following service types:
Foto, Hardware, Internet, Monitoring Alerts,Network, Phone/Fax, Printer, Wireless, Workstation";
$datasource = "Connectwise";
//$path = parse_url($actual_link,PHP_URL_PATH);
//$path = strstr($path,"/service_delivery");
//echo $path;
$query = 'SELECT top 10  sum(time_entry.hours_actual), site_name from sr_service
left outer join company on sr_service.company_recid = company.company_recid
left outer join time_entry on sr_service.sr_service_recid = time_entry.sr_service_recid
left outer join sr_type on sr_service.sr_type_recid = sr_type.sr_type_recid
where company.company_name = "Results Physiotherapy" and DATEDIFF( mm, dbo.SR_Service.Date_Entered, GETDATE() ) = 0 and
(sr_type.description = "Foto" or sr_type.description = "Hardware" or sr_type.description = "Internet" or sr_type.description = "Monitoring Alerts" or
  sr_type.description = "Network" or sr_type.description = "Phone/Fax" or sr_type.description = "Printer"
  or sr_type.description = "Wireless" or sr_type.description = "Workstation")
group by site_name
order by count(sr_service.site_name) desc';
$query1 = 'SELECT top 10 count(sr_service.site_name), site_name from sr_service
left outer join company on sr_service.company_recid = company.company_recid
left outer join sr_type on sr_service.sr_type_recid = sr_type.sr_type_recid
where company.company_name = "Results Physiotherapy" and DATEDIFF( mm, dbo.SR_Service.Date_Entered, GETDATE() ) = 0
and
(sr_type.description = "Foto" or sr_type.description = "Hardware" or sr_type.description = "Internet" or sr_type.description = "Monitoring Alerts" or
  sr_type.description = "Network" or sr_type.description = "Phone/Fax" or sr_type.description = "Printer"
  or sr_type.description = "Wireless" or sr_type.description = "Workstation")
group by site_name
order by count(sr_service.site_name) desc';

$queries = $query." ".$query1;
$queries = str_replace('"',"",$queries);
echo "<div class='panel panel-default'>";
echo "<div class='panel-heading'style='text-align:center;'>";
echo "<p id='locationsTitle' style='text-align:center;'>Chronic Site Identification - This Month <span><a href='#' class='fui-info-circle'data-toggle='modal'data-target='#basicModal' data-description='".$description."' data-datasource='".$datasource."' data-query='".$queries."'
data-title='".$title."'></a></span></p>";
echo "</div>";
echo "<div style='width:100%;width:100%;overflow-y: scroll !important;height:278px;'class=panel-body>";
$openTickets = mssql_query($query);
 echo "<div class='col-md-6'>";
echo "<table class='table table-hover'>";
echo "<thead>";
echo "<th>Site</th>";
echo "<th>Actual Hours</th>";
echo "</thead>";
echo "<tbody  class='rowlink'>";
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
echo "</div>";




$openTickets1 = mssql_query($query1);
echo "<div class='col-md-6'>";
echo "<table class='table table-hover'>";
echo "<thead>";
echo "<th>Site</th>";
echo "<th>Tickets Opened</th>";
echo "</thead>";
echo "<tbody  class='rowlink'>";
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
echo "</div>";
echo "</div>";
//header("Content-Type: application/json");
//echo json_encode($all_rows);
?>
