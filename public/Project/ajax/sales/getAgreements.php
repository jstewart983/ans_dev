
<?php
require('../../config/config.php');
//ini_set('memory_limit', '512M');
//project hours completed last week
if(isset($_GET['company'])){

$company = $_GET['company'];
$company = urldecode($company);
$results = mssql_query('SELECT AGR_Name, AGR_Date_Cancel,AGR_Reason_Cancel,AGR_Date_Start,AGR_Date_End
from agr_header
left outer join company on agr_header.company_recid = company.company_recid
WHERE company_name = "'.$company.'"');
}

echo "<div style='width:100%;padding:0px;'class=' panel panel-default'>";

echo "<div style='width:100%;width:100%;overflow-y: scroll !important;height:278px;'class=panel-body>";
echo "<table id='clientTable' style='width:100%;' class='table table-hover'>";
echo "<thead>";
echo "<th>Agreement Name</th>";
echo "<th>Agr Start</th>";
echo "<th>Agr End</th>";
echo "<th>Agr Cancel Date</th>";
echo "<th>Reason Canceled (if agr cancel date)</th>";
echo "</thead>";

echo "<tbody  class='rowlink'>";

while($row = mssql_fetch_assoc($results)) {


  echo "<tr class='co'>";
    echo "<td>".$row['AGR_Name']."</td>";


     echo "<td>".$row['AGR_Date_Start']."</td>";

       echo "<td>".$row['AGR_Date_End']."</td>";


       echo "<td>".$row['AGR_Date_Cancel']."</td>";
       echo "<td>".$row['AGR_Reason_Cancel']."</td>";






    echo "</tr>";

}
echo "</tbody>";
echo "</table>";
//header("Content-Type: application/json");

echo "</div>";



?>
