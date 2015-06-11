<?php
error_reporting(-1);
ini_set('display_errors', 'On');
require('../config/db.php');

/*if(isset($_GET['company']) && isset($_GET['report'])){

  $sql = "SELECT empID, EmpEnrollLvl, EmpIncome, IndSubEmp,FPL_Emp,StateMedicaid,IndPremEmp,enrolledFlag from employee
  left outer join tbl_company on employees.companyID = companies.company_ID
  left outer join report on company.company_ID = report.companyID";*/

//}else{

  $sql = "SELECT * from employee where companyID = 0";

//}

$query = mysqli_query($connection,$sql);

$all_rows = array();
while($row = mysqli_fetch_assoc($query)) {
    $all_rows []= $row;
}


// Get CSV File from folder
	//$file = fopen('10466656973586.csv',"r") or die("Error: unable to open census\n\n");
  //$linecount = count(file('10466656973586.csv'));
// Set row to remove header information





/*$fp = fopen('10466656973586.csv','r') or die("Error: unable to open file\n\n");
$i = 0;//skip first row
while($csv_line = fgetcsv($fp,1024)) {
  if($i == 0){ $i++; continue; } //Remove Header Row Data
  if($csv_line[0] == ""){ $i++; continue; } //Exclude blank rows of data
  if(strpos($csv_line[0],"Health") == true){ $i++; continue; } //Exclude header row at bottom of csv
  if(strpos($csv_line[0],'$') == true){ $i++; continue; } //Exclude rows at bottom of csv

    $json['json_'.$i]['empID'] = $i;
    $json['json_'.$i]['EmpEnrollLvl'] = $csv_line[1];
    $json['json_'.$i]['title'] = $csv_line[2];
    $json['json_'.$i]['outline'] = $csv_line[3];
    $i++;
}*/

/*while(! feof($file))
  {
  $employee = (fgetcsv($file));
  if($row == 1){ $row++; continue; } //Remove Header Row Data
  if($employee[0] == ""){ $row++; continue; } //Exclude blank rows of data


  $all_rows = $e

}*/




header("Content-Type: application/json");
echo json_encode($all_rows);
//fclose($fp) or die("Error: unable to close file\n\n");
mysqli_close($connection);
?>
