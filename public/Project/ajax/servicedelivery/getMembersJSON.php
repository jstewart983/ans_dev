<?php
 require('../../config/config.php');

//project hours completed last week
$serviceTypeList = mssql_query('SELECT member.member_id FROM member
where inactive_flag <> 1 and (dbo.member.Title like "%IT Support%")');

$all_rows = [];
while($row = mssql_fetch_array($serviceTypeList)) {

$all_rows [] = $row['member_id'];


}

header("Content-Type: application/json");
echo json_encode($all_rows);

?>
