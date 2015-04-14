
<?php
require('../config.php');
//ini_set('memory_limit', '512M');
//project hours completed last week


$results = mssql_query('SELECT     sys.objects.name AS [TABLE Name], sys.COLUMNS.name AS [COLUMN Name], sys.types.name AS [DATA TYPE], sys.COLUMNS.max_length AS LENGTH,
                      sys.COLUMNS.is_nullable AS [Allow NULLS], sys.COLUMNS.is_identity AS [IDENTITY]
FROM         sys.objects INNER JOIN
                      sys.COLUMNS ON sys.objects.object_id = sys.COLUMNS.object_id INNER JOIN
                      sys.types ON sys.COLUMNS.user_type_id = sys.types.user_type_id
WHERE     (sys.objects.TYPE = "u")
ORDER BY [TABLE Name]');

echo "<div style='width:100%;padding:0px;'class=' panel panel-default'>";

echo "<div style='width:100%;'class=panel-body>";
echo "<table id='clientTable' style='width:100%;' class='table table-hover'>";
echo "<thead>";
echo "<th>Table Name</th>";
echo "<th>Columns</th>";
echo "</thead>";

echo "<tbody  class='rowlink'>";

while($row = mssql_fetch_array($results)) {


  echo "<tr class='co'>";
    echo "<td id='company'>".$row['TABLE Name']."</td>";
     echo "<td id='status'>".$row['COLUMN Name']."</td>";
    echo "</tr>";

}
echo "</tbody>";
echo "</table>";
//header("Content-Type: application/json");

echo "</div>";





?>
