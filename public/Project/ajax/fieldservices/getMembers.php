<?php
 require('../../config/config.php');

//project hours completed last week
$serviceTypeList = mssql_query('SELECT member.member_id FROM member
where inactive_flag <> 1 and (dbo.member.Title like "%Client IT%" or member.member_id ="zhoover")');


while($row = mssql_fetch_array($serviceTypeList)) {

$type = $row['member_id'];



echo "<option value=".str_replace(' ','%20',$type).">";
echo $type;

echo "</option>";

}

?>
