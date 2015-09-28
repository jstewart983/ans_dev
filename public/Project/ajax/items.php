<?php
include('../config/userconfig.php');


  $query ='SELECT * FROM item order by date_stamp desc';
$results=mysqli_query($con,$query);


echo "<table class='table table-striped'>";
echo "<thead>";
echo "<tr>";
echo "<th>Employee</th>";
echo "<th>Client</th>";
echo "<th>Bar Code</th>";
echo "<th>In or Out?</th>";
echo "<th>Date</th>";
echo "</thead>";

echo "<tbody>";

while($row = mysqli_fetch_assoc($results)){
  $check ="";
  if ($row['in_out'] == "1") {
    $check = "in";
  }else{$check = "out";}
    echo "<tr>";
    echo "<td>".$row['member_id']."</td><td>".$row['company_name']."</td><td>".$row['bar_code']."</td>"."<td>".$check."</td>"."<td>".$row['date_stamp']."</td>";
    echo "</tr>";
}
echo "</tbody>";
echo "</table>";



?>
