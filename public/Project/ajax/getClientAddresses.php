<?php
error_reporting(-1);
ini_set('display_errors', 'On');
require('../config/config.php');

$query = 'SELECT address_line1,address_line2,city,state_id,zip FROM dbo.Company_Address
left outer join dbo.Company on dbo.Company.Company_RecID = dbo.Company_Address.Company_RecID
left outer join dbo.Company_Type on dbo.Company_Type.Company_Type_RecID = dbo.Company.Company_Type_RecID
left outer join dbo.Company_Status on dbo.Company_Status.Company_Status_RecID = dbo.Company.Company_Status_RecID
WHERE (dbo.Company_Status.Description = "Active" and
dbo.Company_Type.Description = "Client" and dbo.Company_Address.Default_Flag=1) OR (dbo.Company_Status.Description = "Active - Security" and dbo.Company_Type.Description = "Client" AND dbo.Company_Address.Default_Flag=1 ) or (dbo.company.company_name = "Advanced Network Solutions") order by dbo.company.Company_Name';

$addresses = mssql_query($query);



$all_rows = array();
while($row = mssql_fetch_assoc($addresses)){

$all_rows [] = $row['address_line1']." ".$row['address_line2']." ".$row['city'].", ".$row['state_id']." ".$row['zip'];

}

header("Content-Type: application/json");
echo json_encode($all_rows);

 ?>
