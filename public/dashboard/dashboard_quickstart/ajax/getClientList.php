
<?php
 require('../config.php');

//project hours completed last week
$clientList = mssql_query('SELECT dbo.Company.Company_Name FROM dbo.Company_Address
left outer join dbo.Company on dbo.Company.Company_RecID = dbo.Company_Address.Company_RecID
left outer join dbo.Company_Type on dbo.Company_Type.Company_Type_RecID = dbo.Company.Company_Type_RecID
left outer join dbo.Company_Status on dbo.Company_Status.Company_Status_RecID = dbo.Company.Company_Status_RecID
WHERE (dbo.Company_Status.Description = "Active" and 
dbo.Company_Type.Description = "Client" and dbo.Company_Address.Default_Flag=1) OR (dbo.Company_Status.Description = "Active - Security" and dbo.Company_Type.Description = "Client" AND dbo.Company_Address.Default_Flag=1 ) order by dbo.company.Company_Name');

echo "<div style='width:100%;padding:0px;margin-left:10px; margin-top:10px;'class=' panel panel-default'>";
echo "<div class='panel-heading'>Clients</div>";
echo "<div style='width:100%;overflow-y: scroll !important;height:500px'class=panel-body>";
echo "<table id='clientTable' style='width:100%;' class='table table-hover'>";
echo "<thead>";
echo "<th></th>";
echo "</thead>";

echo "<tbody  class='rowlink'>";
// fetch all rows from the query
//$all_rows = array();
$id=0;
while($row = mssql_fetch_array($clientList)) {

	$str = $row['Company_Name'];

	if (strlen($str) > 30){
		$str = substr($str, 0, 25) . '...';
	}
   
	echo "<tr>";
    echo "<td><input type='submit' id='colink".$id."'href='?company=".$row['Company_Name']."'value='".$str."'/></td>";
    echo "</tr>";
    $id++;
}
echo "</tbody>";
echo "</table>";
//header("Content-Type: application/json");
//echo json_encode($all_rows);
echo "</div>";
echo "</div>";
?>