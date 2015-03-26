<?php
require('../config.php');

if(isset($_GET['company'])){
$company = $_GET['company'];

$mrr = mssql_query('select

cast(sum(dbo.iv_product.Extended_Price_Amount)as decimal (10,2))as AGR_Revenue
from IV_Product left outer join
Billing_Log on IV_Product.Billing_Log_RecID = Billing_Log.Billing_Log_RecID left outer join
Company on dbo.billing_log.Company_RecID = dbo.company.Company_RecID
where company.company_name="'.$company.'" and dbo.billing_log.Billing_Type_ID = "a" and dbo.IV_Product.Billable_Flag = 1 and
(dbo.iv_product.AGR_Month = month(getdate())-1 and dbo.iv_product.AGR_Year = year(getdate()))
');

}
else{
$mrr = mssql_query('select

cast(sum(dbo.iv_product.Extended_Price_Amount)as decimal (10,2))as AGR_Revenue
from IV_Product left outer join
Billing_Log on IV_Product.Billing_Log_RecID = Billing_Log.Billing_Log_RecID left outer join
Company on dbo.billing_log.Company_RecID = dbo.company.Company_RecID
where dbo.billing_log.Billing_Type_ID = "a" and dbo.IV_Product.Billable_Flag = 1 and
(dbo.iv_product.AGR_Month = month(getdate())-1 and dbo.iv_product.AGR_Year = year(getdate()))');
}

/*if(!$avgTickets){
 die("Error: ".mssql_get_last_message());
}

while($row = mssql_fetch_assoc($avgTickets)) {
   //echo $row['AGR_Revenue'];
}*/

// fetch all rows from the query
$all_rows = array();
while($row = mssql_fetch_assoc($mrr)) {
   $all_rows []= $row;
}

header("Content-Type: application/json");
echo json_encode($all_rows);
?>
