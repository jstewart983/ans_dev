<?php
error_reporting(-1);
ini_set('display_errors', 'On');
require('../../config/config.php');

$title = "Chronic Site Identification - This Month";
$description = "These two tables are a live look at the sites that we are spending the most time on and the sites that are opening the most tickets. Both the time and tickets only look at tickets with the following service types:
Foto, Hardware, Internet, Monitoring Alerts,Network, Phone/Fax, Printer, Wireless, Workstation";
$datasource = "Connectwise";


if(isset($_GET['range1']) && isset($_GET['range2'])){
$range1 = $_GET['range1'];
$range2 = $_GET['range2'];

$query = 'SELECT sum(time_entry.hours_actual), site_name from sr_service
left outer join company on sr_service.company_recid = company.company_recid
left outer join time_entry on sr_service.sr_service_recid = time_entry.sr_service_recid
left outer join sr_type on sr_service.sr_type_recid = sr_type.sr_type_recid
where company.company_name = "Results Physiotherapy" and (dbo.SR_Service.Date_Entered >="'.$range1.'" and dbo.SR_Service.Date_Entered <= "'.$range2.'") and
(sr_type.description = "Foto" or sr_type.description = "Hardware" or sr_type.description = "Internet" or sr_type.description = "Monitoring Alerts" or
  sr_type.description = "Network" or sr_type.description = "Phone/Fax" or sr_type.description = "Printer"
  or sr_type.description = "Wireless" or sr_type.description = "Workstation")
group by site_name
order by count(sr_service.site_name) desc';
$query1 = 'SELECT count(sr_service.site_name), site_name from sr_service
left outer join company on sr_service.company_recid = company.company_recid
left outer join sr_type on sr_service.sr_type_recid = sr_type.sr_type_recid
where company.company_name = "Results Physiotherapy" and (dbo.SR_Service.Date_Entered >="'.$range1.'" and dbo.SR_Service.Date_Entered <= "'.$range2.'")
and
(sr_type.description = "Hardware" or sr_type.description = "Internet" or sr_type.description = "Monitoring Alerts" or
  sr_type.description = "Network" or sr_type.description = "Phone/Fax" or sr_type.description = "Printer"
  or sr_type.description = "Wireless" or sr_type.description = "Workstation")
group by site_name
order by count(sr_service.site_name) desc';

}else{

  $query = 'SELECT sum(time_entry.hours_actual), site_name from sr_service
left outer join company on sr_service.company_recid = company.company_recid
left outer join time_entry on sr_service.sr_service_recid = time_entry.sr_service_recid
left outer join sr_type on sr_service.sr_type_recid = sr_type.sr_type_recid
where company.company_name = "Results Physiotherapy" and DATEDIFF( ww, dbo.SR_Service.Date_Entered, GETDATE() ) = 4  and
(sr_type.description = "Hardware" or sr_type.description = "Internet" or sr_type.description = "Monitoring Alerts" or
  sr_type.description = "Network" or sr_type.description = "Phone/Fax" or sr_type.description = "Printer"
  or sr_type.description = "Wireless" or sr_type.description = "Workstation")
group by site_name
order by count(sr_service.site_name) desc';
$query1 = 'SELECT count(sr_service.site_name), site_name from sr_service
left outer join company on sr_service.company_recid = company.company_recid
left outer join sr_type on sr_service.sr_type_recid = sr_type.sr_type_recid
where company.company_name = "Results Physiotherapy" and DATEDIFF( ww, dbo.SR_Service.Date_Entered, GETDATE() ) = 4
and
(sr_type.description = "Hardware" or sr_type.description = "Internet" or sr_type.description = "Monitoring Alerts" or
  sr_type.description = "Network" or sr_type.description = "Phone/Fax" or sr_type.description = "Printer"
  or sr_type.description = "Wireless" or sr_type.description = "Workstation")
group by site_name
order by count(sr_service.site_name) desc';
}


$queries = $query." ".$query1;
$queries = str_replace('"',"",$queries);
echo "<div class='panel panel-default'>";
echo "<div style='width:100%;'class=panel-body>";
$openTickets = mssql_query($query);
 echo "<div style='border-right:solid;border-style:thick double #282828;' id='hours' class='col-md-6'>";
echo "<table id='locationsTable' class='table table-hover'>";
echo "<thead>";
echo "<th>Site</th>";
echo "<th>Actual Hours</th>";
echo "</thead>";
echo "<tbody  class='rowlink'>";

while($row = mssql_fetch_assoc($openTickets)) {

    echo "<tr data-toggle='tooltip' title='Click to drilldown' class='co' site='".$row['site_name']."'>";
      echo "<td>".$row['site_name']."</td><td>".$row['computed']."</td>";
    echo "</tr>";
}
echo "</tbody>";
echo "</table>";
echo "</div>";

//echo "<div class='col-md-2' style='height:100%;width:5px;background-color:#282828;'></div>";


$openTickets1 = mssql_query($query1);
echo "<div id='tickets' class='col-md-6'>";
echo "<table id='locationsTable' class='table table-hover'>";
echo "<thead>";
echo "<th>Site</th>";
echo "<th>Tickets Opened</th>";
echo "</thead>";
echo "<tbody  class='rowlink'>";

while($row = mssql_fetch_assoc($openTickets1)) {


    echo "<tr data-toggle='tooltip' title='Click to drilldown' class='co2' site='".$row['site_name']."'>";
      	echo "<td>".$row['site_name']."</td><td>".$row['computed']."</td>";
    echo "</tr>";
}
echo "</tbody>";
echo "</table>";
echo "</div>";
echo "</div>";

?>
