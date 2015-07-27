<?php
require('../config/userconfig.php');
$query = 'SELECT user_id,fName,lName,user_group_id,user_name,user_email,user_logged_in,active_flag FROM users';
$results = mysqli_query($con,$query);
$query1 = str_replace('"',"",$query);
echo "<div id='userTable'>";
echo "<a href='http://intelligence.ansolutions.com/routes/admin/' class='btn btn-xs btn-default'><span class='fui-triangle-left-large'></span> back</a>";
echo "<br / >";
echo "<div style='width:100%;padding:0px;margin-top:30px;'class=' panel panel-default'>";
echo "<div style='width:100%;padding:0px;height:auto;'class=panel-body>";
echo "<table id='clientTable' style='width:100%;' class='scroll table table-row table-striped'>";
echo "<thead style='background-color:#1E90FF;color:#fff;'>";
echo "<th>User ID</th>";
echo "<th>Name</th>";
echo "<th>User Name</th>";
//echo "<th>Email</th>";
echo "<th>Active?</th>";
echo "<th>Permissions</th>";
echo "<th></th>";
echo "</thead>";
echo "<tbody style='overflow:scroll;'>";
while($row = mysqli_fetch_array($results)) {
if($row['active_flag']==1){
	$logged_in = "<span full_name='".$row['fName']." ".$row['lName']."' user_name='".$row['user_name']."' user_email='".$row['user_email']."'  id='".$row['user_id']."' href='#' style='margin:5px;text-align:center;'class='btn btn-xs btn-success yes'>yes</span>";
}else{
$logged_in = "<span  id='".$row['user_id']."' href='#' style='margin:5px;text-align:center;'class='btn btn-xs btn-danger no'>no</span>";
}
	echo "<tr class='user' id='user' value='".$row['user_id']."'>";
    echo "<td>".$row['user_id']."</td>";
		echo "<td>".$row['fName']." ".$row['lName']."</td>";
     echo "<td>".$row['user_name']."</td>";
     //echo "<td style='float:left;'><span style='float:left;'>".$row['user_email']."</span></td>";
		 echo "<td>".$logged_in."</td>";
		 $query2 = 'SELECT * from user_groups
		 left outer join user_permissions on user_groups.user_group_id = user_permissions.user_group_id
		  where user_permissions.user_id = "'.$row['user_id'].'"';


		  //echo $query;


		 $results2=mysqli_query($con,$query2);


		 //$all_rows = array();
		 echo "<td>";

		 while($row2 = mysqli_fetch_assoc($results2)){
			 if($row2['user_group_name']=="super admin"){
				  echo "<span href='#' style='background-color:#FF7F50;margin:5px;text-align:center;'class='btn btn-xs btn-default'>".$row2['user_group_name']."</span>";

			 }else if($row2['user_group_name']=="admin"){
				 echo "<span href='#' style='background-color:#708090;margin:5px;text-align:center;'class='btn btn-xs btn-default'>".$row2['user_group_name']."</span>";
				 //#00FA9A
			 }else{
				 echo "<span href='#' style='background-color:#B0C4DE;margin:5px;text-align:center;'class='btn btn-xs btn-default'>".$row2['user_group_name']."</span>";
				 //#00FA9A
			 }
			 //#FF7F50

		 }

		 echo "</td>";
		 echo "<td><span full_name='".$row['fName']." ".$row['lName']."' user_name='".$row['user_name']."' user_email='".$row['user_email']."' id='".$row['user_id']."' href='#' style='float:right;margin:5px;text-align:center;'class='btn btn-xs btn-info edit'>edit</span>";


    echo "</tr>";
}
echo "</tbody>";
echo "</table>";
echo "</div>";
echo "</div>";

?>
