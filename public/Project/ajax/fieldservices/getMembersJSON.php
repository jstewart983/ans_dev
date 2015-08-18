<?php
error_reporting(-1);
ini_set('display_errors', 'On');
 require('../../config/config.php');

//project hours completed last week
$query = 'SELECT member.member_id FROM member
where inactive_flag <> 1 and (dbo.member.Title like "%Client IT%" or member.member_id ="zhoover")';


$projectHours = mssql_query($query);
//$query1 = str_replace('"',"",$query);

$all_rows = array();
while($row = mssql_fetch_assoc($projectHours)) {
    $all_rows []= $row;
}

header("Content-Type: application/json");
echo json_encode($all_rows);

?>
