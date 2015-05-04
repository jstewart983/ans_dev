<?php
require('../config/userconfig.php');




$query = 'SELECT user_id,fName,lName,user_group_id,user_name,user_email FROM users WHERE user_logged_in = 1';




$results = mysqli_query($con,$query);
$query1 = str_replace('"',"",$query);
echo "<a href='http://intelligence.ansolutions.com/routes/admin/' class='btn btn-sm btn-info'><span class='fui-triangle-left-large'></span> back</a>";
echo "<br / >";
echo "<div style='width:100%;padding:0px;margin-top:30px;'class=' panel panel-default'>";
echo "<div style='width:100%;width:100%;'class=panel-body>";
echo "<table id='clientTable' style='width:100%;' class='table table-hover'>";
echo "<thead>";
echo "<th>User ID</th>";
echo "<th>Name</th>";
echo "<th>User Name</th>";
echo "<th>Email</th>";

echo "</thead>";

echo "<tbody>";
// fetch all rows from the query
//$all_rows = array();

while($row = mysqli_fetch_array($results)) {






	echo "<tr>";
    echo "<td>".$row['user_id']."</td>";
		echo "<td>".$row['fName']." ".$row['lName']."</td>";
     echo "<td>".$row['user_name']."</td>";
     echo "<td>".$row['user_email']."</td>";
    echo "</tr>";


}
echo "</tbody>";
echo "</table>";
//header("Content-Type: application/json");

echo "</div>";



?>
