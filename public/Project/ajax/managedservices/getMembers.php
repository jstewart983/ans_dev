<?php
 require('../../config/config.php');

//project hours completed last week
$serviceTypeList = mssql_query('SELECT member.member_id FROM member
where (member.member_id = "plane" or member.member_id = "jmorgan" or member.member_id = "bfizer" or member.member_id = "rmillen")');


while($row = mssql_fetch_array($serviceTypeList)) {

$type = $row['member_id'];



echo "<option value=".str_replace(' ','%20',$type).">";
echo $type;

echo "</option>";

}

?>
