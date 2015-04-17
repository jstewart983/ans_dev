<?php
require('../../config/config.php');

if(isset($_GET['company'])){
$company = $_GET['company'];
$company = urldecode($company);
$mrr = mssql_query('select dbo.company.Company_Name, convert(date,dbo.billing_log.Run_Date) as Date,
case when SUM(t.time_amount+a.agr_revenue)is null then t.Time_Amount else SUM(t.time_amount+a.agr_revenue)end as MRR
from
dbo.billing_log left outer join

      (select dbo.billing_log.Billing_Log_RecID,dbo.billing_log.Time_Amount
      from dbo.Billing_Log left outer join
      dbo.Company on dbo.billing_log.Company_RecID = dbo.Company.Company_RecID
      where dbo.billing_log.Billing_Type_ID = "a") T on


dbo.billing_log.Billing_Log_RecID = t.Billing_Log_RecID
left outer join


      (select dbo.billing_log.Billing_Log_RecID,
      cast(sum(dbo.iv_product.Extended_Price_Amount)as decimal (10,2))as AGR_Revenue
      from dbo.IV_Product left outer join
      Billing_Log on IV_Product.Billing_Log_RecID = Billing_Log.Billing_Log_RecID left outer join
      dbo.iv_item on dbo.IV_Product.IV_Item_RecID = dbo.iv_item.IV_Item_RecID
      where dbo.billing_log.Billing_Type_ID = "a" and dbo.IV_Product.Billable_Flag = 1 and dbo.iv_item.Item_ID not like "Lease"
      and dbo.iv_item.Item_ID not like "Project"
      group by dbo.billing_log.Billing_Log_RecID) A on


dbo.billing_log.Billing_Log_RecID = a.Billing_Log_RecID
left outer join
dbo.Company on dbo.billing_log.Company_RecID = dbo.company.Company_RecID

where company.company_name="'.$company.'" and month(dbo.billing_log.Run_Date) = month(getdate())-1 and year(dbo.billing_log.Run_Date) = year(getdate())

group by dbo.company.Company_Name, dbo.billing_log.Run_Date, t.Time_Amount
order by dbo.company.Company_Name
');

}
else{
$mrr = mssql_query('select
case when SUM(t.time_amount+a.agr_revenue)is null then t.Time_Amount else SUM(t.time_amount+a.agr_revenue)end as MRR
from
dbo.billing_log left outer join

      (select dbo.billing_log.Billing_Log_RecID,dbo.billing_log.Time_Amount
      from dbo.Billing_Log left outer join
      dbo.Company on dbo.billing_log.Company_RecID = dbo.Company.Company_RecID
      where dbo.billing_log.Billing_Type_ID = "a") T on


dbo.billing_log.Billing_Log_RecID = t.Billing_Log_RecID
left outer join


      (select dbo.billing_log.Billing_Log_RecID,
      cast(sum(dbo.iv_product.Extended_Price_Amount)as decimal (10,2))as AGR_Revenue
      from dbo.IV_Product left outer join
      Billing_Log on IV_Product.Billing_Log_RecID = Billing_Log.Billing_Log_RecID left outer join
      dbo.iv_item on dbo.IV_Product.IV_Item_RecID = dbo.iv_item.IV_Item_RecID
      where dbo.billing_log.Billing_Type_ID = "a" and dbo.IV_Product.Billable_Flag = 1 and dbo.iv_item.Item_ID not like "Lease"
      and dbo.iv_item.Item_ID not like "Project"
      group by dbo.billing_log.Billing_Log_RecID) A on


dbo.billing_log.Billing_Log_RecID = a.Billing_Log_RecID
left outer join
dbo.Company on dbo.billing_log.Company_RecID = dbo.company.Company_RecID

where month(dbo.billing_log.Run_Date) = month(getdate())-1 and year(dbo.billing_log.Run_Date) = year(getdate())

group by t.Time_Amount');
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
