<?php
require('../config/userconfig.php');




$query = 'SELECT COUNT(*) AS users_in FROM users WHERE user_logged_in = 1';




$results=mysqli_query($con,$query);


$all_rows = array();
$row = mysqli_fetch_assoc($results);
$all_rows [] = $row;


header("Content-Type: application/json");
echo json_encode($all_rows);
mysqli_close($con);



?>
