<?php
require('../config/userconfig.php');




$query = 'SELECT user_id,user_group_id,user_name,user_email FROM users';




$results = mysqli_query($con,$query);
$query1 = str_replace('"',"",$query);
echo "<div style='margin-top:30px;' class='row'>
      <div class='col-md-4'></div>
      <div class='col-md-4'>
      <button id='addUser'  type='button' class='btn btn-md btn-success'><span class='fui-plus'></span> Add User
      </div>
      <div class='col-md-4'></div>
      </div>";
echo "<div style='width:100%;padding:0px;margin-top:10px;'class=' panel panel-default'>";
echo "<div style='width:100%;width:100%;'class=panel-body>";
echo "<table id='clientTable' style='width:100%;' class='table table-hover'>";
echo "<thead>";
echo "<th>User ID</th>";

echo "<th>User Name</th>";
echo "<th>Email</th>";

echo "</thead>";

echo "<tbody  class='rowlink'>";
// fetch all rows from the query
//$all_rows = array();

while($row = mysqli_fetch_array($results)) {






	echo "<tr>";
    echo "<td>".$row['user_id']."</td>";

     echo "<td>".$row['user_name']."</td>";
     echo "<td>".$row['user_email']."</td>";
    echo "</tr>";


}
echo "</tbody>";
echo "</table>";
//header("Content-Type: application/json");

echo "</div>";



?>
