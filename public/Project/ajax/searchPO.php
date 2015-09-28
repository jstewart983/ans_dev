<?php
 require('../config/config.php');

if(isset($_GET['po'])){
  $po = $_GET['po'];

//project hours completed last week
$results = mssql_query('SELECT company.company_name from purchase_header
left outer join company on purchase_header.customer_company_recid = company.Company_RecID
where purchase_header.po_number = "'.$po.'"');
$all_rows = [];

if($results){
  $all_rows['success'] = true;
  $count = mssql_num_rows($results);
  if($count > 0){
    while($row = mssql_fetch_array($results)) {
      $all_rows['company'] =  $row['company_name'];

    }
  }else{
    $all_rows ['company'] = "no results";
  }
}else{
  $all_rows['success'] = false;
}


header("Content-Type: application/json");
echo json_encode($all_rows);
}
?>
