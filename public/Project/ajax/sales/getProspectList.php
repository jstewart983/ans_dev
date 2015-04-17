
<?php
 require('../../config/config.php');

//project hours completed last week
$clientList = mssql_query('SELECT distinct dbo.Company.Company_Name,dbo.Company_Status.Description as status,dbo.Company_Type.Description as type FROM dbo.Company_Address
left outer join dbo.Company on dbo.Company.Company_RecID = dbo.Company_Address.Company_RecID
left outer join dbo.Company_Type on dbo.Company_Type.Company_Type_RecID = dbo.Company.Company_Type_RecID
left outer join dbo.Company_Status on dbo.Company_Status.Company_Status_RecID = dbo.Company.Company_Status_RecID
order by dbo.company.Company_Name');


echo "<div style='width:100%;padding:0px;'class=' panel panel-default'>";

echo "<div style='width:100%;'class=panel-body>";
echo "<table id='clientTable' style='width:100%;' class='table table-hover'>";
echo "<thead>";
echo "<th>Company Name</th>";
echo "<th>Type</th>";
echo "<th>Status</th>";
echo "</thead>";

echo "<tbody  class='rowlink'>";

while($row = mssql_fetch_array($clientList)) {
$str = $row['Company_Name'];
$company = $row['Company_Name'];

	if (strlen($str) > 35){
		$str = substr($str, 0, 25) . '...';
	}

  echo "<tr class='co'>";
    echo "<td id='company'>".$row['Company_Name']."</td>";
    echo "<td id='status'>".$row['type']."</td>";
     echo "<td id='status'>".$row['status']."</td>";
    echo "</tr>";

}
echo "</tbody>";
echo "</table>";
//header("Content-Type: application/json");

echo "</div>";

?>
