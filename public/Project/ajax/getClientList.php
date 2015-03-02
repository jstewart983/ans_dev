
<?php
 require('../config.php');

//project hours completed last week
$clientList = mssql_query('SELECT distinct dbo.Company.Company_Name FROM dbo.Company_Address
left outer join dbo.Company on dbo.Company.Company_RecID = dbo.Company_Address.Company_RecID
left outer join dbo.Company_Type on dbo.Company_Type.Company_Type_RecID = dbo.Company.Company_Type_RecID
left outer join dbo.Company_Status on dbo.Company_Status.Company_Status_RecID = dbo.Company.Company_Status_RecID
WHERE (dbo.Company_Status.Description = "Active" and 
dbo.Company_Type.Description = "Client" and dbo.Company_Address.Default_Flag=1) OR (dbo.Company_Status.Description = "Active - Security" and dbo.Company_Type.Description = "Client" AND dbo.Company_Address.Default_Flag=1 ) or (dbo.company.company_name = "Advanced Network Solutions") order by dbo.company.Company_Name');

echo "<div style='width:100%;padding:0px;margin-left:10px; margin-top:10px;'class=' panel panel-default'>";
echo "<div class='panel-heading'>Clients</div>";
echo "<div style='width:100%;overflow-y: scroll !important;height:495px'class=panel-body>";
echo "<table id='clientTable' style='width:100%;' class='table table-hover'>";
echo "<tbody  class='rowlink'>";
echo "<tr>";
echo "<td><a href='../client services/'><b>All Clients</b></a></td>";
echo "</tr>";


// fetch all rows from the query
//$all_rows = array();
$id=0;
while($row = mssql_fetch_array($clientList)) {

	$str = $row['Company_Name'];

	if (strlen($str) > 15){
		$str = substr($str, 0, 17) . '...';
	}
   
	echo "<tr>";
    echo "<td><input type='submit' id='colink' href='?company=".$row['Company_Name']."'value='".$str."'/></td>";
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