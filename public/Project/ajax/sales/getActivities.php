
<?php
require('../../config/config.php');
//ini_set('memory_limit', '512M');
//project hours completed last week
if(isset($_GET['company'])){

$company = $_GET['company'];
$company = urldecode($company);
$results = mssql_query('SELECT SO_Activity.assign_to,so_activity_type.description,SO_Activity.subject,SO_Activity.last_update

FROM         SO_Activity left outer join company on SO_Activity.company_recid = company.company_recid
left outer join so_activity_type on so_activity.SO_Activity_Type_RecID  = so_activity_type.SO_Activity_Type_RecID


WHERE dbo.company.company_name = "'.$company.'"
order by SO_Activity.last_update desc

'

 );
}

echo "<div style='width:100%;padding:0px;'class=' panel panel-default'>";

echo "<div style='width:100%;width:100%;overflow-y: scroll !important;height:278px;'class=panel-body>";
echo "<table id='clientTable' style='width:100%;' class='table table-hover'>";
echo "<thead>";
echo "<th>Activity Owner</th>";
echo "<th>Type</th>";
echo "<th>Subject</th>";
echo "<th>Last Updated</th>";
echo "</thead>";

echo "<tbody  class='rowlink'>";

while($row = mssql_fetch_assoc($results)) {


  echo "<tr class='co'>";
    echo "<td>".$row['assign_to']."</td>";


     echo "<td>".$row['description']."</td>";
     if (strpos($row['subject'],'DO NOT CALL') !== false || strpos($row['subject'],'Revendored') !== false){

       echo "<td style='color:#E74C3C;'>".$row['subject']."</td>";
     }else{

       echo "<td>".$row['subject']."</td>";

     }



     echo "<td>".$row['last_update']."</td>";
    echo "</tr>";

}
echo "</tbody>";
echo "</table>";
//header("Content-Type: application/json");

echo "</div>";



?>
