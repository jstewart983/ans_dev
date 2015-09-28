<?php
 require('../config/config.php');

//project hours completed last week
$serviceTypeList = mssql_query('SELECT member.member_id FROM member
where inactive_flag <> 1 order by member.member_id');


while($row = mssql_fetch_array($serviceTypeList)) {

$type = $row['member_id'];



echo "<option value=".str_replace(' ','%20',$type).">";
echo $type;

echo "</option>";

}

?>
