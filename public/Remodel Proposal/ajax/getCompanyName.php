<?php
error_reporting(-1);
ini_set('display_errors', 'On');
require('../config/db.php');

if(isset($_GET['company']) && isset($_GET['report'])){

  $sql = "SELECT empID, EmpEnrollLvl, EmpIncome, IndSubEmp,FPL_Emp,StateMedicaid,IndPremEmp,enrolledFlag from employee
  left outer join tbl_company on employees.companyID = companies.company_ID
  left outer join report on company.company_ID = report.companyID";

//}else{

  $sql = "SELECT * from employee";

//}

$query = mysqli_query($connection,$sql);

$all_rows = array();
while($row = mysqli_fetch_assoc($query)) {
    $all_rows []= $row;
}





header("Content-Type: application/json");
echo json_encode($all_rows);
//mysqli_close($connection);
?>
