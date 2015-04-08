
<?php
 require('../../config.php');

//project hours completed last week
$clientList = mssql_query('SELECT distinct dbo.Company.Company_Name FROM dbo.Company_Address
left outer join dbo.Company on dbo.Company.Company_RecID = dbo.Company_Address.Company_RecID
left outer join dbo.Company_Type on dbo.Company_Type.Company_Type_RecID = dbo.Company.Company_Type_RecID
left outer join dbo.Company_Status on dbo.Company_Status.Company_Status_RecID = dbo.Company.Company_Status_RecID
WHERE (dbo.Company_Status.Description = "Active" and
dbo.Company_Type.Description = "Client" and dbo.Company_Address.Default_Flag=1) OR (dbo.Company_Status.Description = "Active - Security" and dbo.Company_Type.Description = "Client" AND dbo.Company_Address.Default_Flag=1 ) or (dbo.company.company_name = "Advanced Network Solutions") order by dbo.company.Company_Name');



while($row = mssql_fetch_array($clientList)) {
$str = $row['Company_Name'];
$company = $row['Company_Name'];

	if (strlen($str) > 15){
		$str = substr($str, 0, 17) . '...';
	}

echo "<li role='presentation' >";
echo "<a style='text:decoration:none;' class='client' role='menuitem' tabindex='-1'";
echo"href=?company=";
echo str_replace(' ','%20',$company);
echo ">".$str."</a></li>";

}

?>
