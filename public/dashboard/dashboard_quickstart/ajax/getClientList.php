
<?php
 require('../config.php');

//project hours completed last week
$projectHours = mssql_query('SELECT dbo.Company_Type.Description,dbo.Company_Status.Description,dbo.Company.Company_Name,Address_Line1,Address_Line2,City,State_ID,Zip FROM dbo.Company_Address
left outer join dbo.Company on dbo.Company.Company_RecID = dbo.Company_Address.Company_RecID
left outer join dbo.Company_Type on dbo.Company_Type.Company_Type_RecID = dbo.Company.Company_Type_RecID
left outer join dbo.Company_Status on dbo.Company_Status.Company_Status_RecID = dbo.Company.Company_Status_RecID
WHERE (dbo.Company_Status.Description = 'Active' and 
dbo.Company_Type.Description = 'Client' and dbo.Company_Address.Default_Flag=1) OR (dbo.Company_Status.Description = 'Active - Security' and dbo.Company_Type.Description = 'Client' AND dbo.Company_Address.Default_Flag=1 )');


// fetch all rows from the query
$all_rows = array();
while($row = mssql_fetch_assoc($projectHours)) {
    $all_rows []= $row;
}

header("Content-Type: application/json");
echo json_encode($all_rows);
?>