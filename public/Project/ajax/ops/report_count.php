<?php
include('../../config/userconfig.php');
$query = "SELECT count(*) as report_count from reports where report_generated = CURDATE()";

$runquery = mysqli_query($con,$query);


$count = mysqli_fetch_assoc($runquery);



header("Content-Type: application/json");
echo json_encode($count);



 ?>
