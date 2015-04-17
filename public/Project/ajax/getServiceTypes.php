<?php
 require('../config.php');

//project hours completed last week
$serviceTypeList = mssql_query('SELECT distinct sr_type.description FROM sr_type');


while($row = mssql_fetch_array($serviceTypeList)) {

$type = $row['description'];



echo "<option value=".str_replace(' ','%20',$type).">";
echo $type;

echo "</option>";

}

?>
