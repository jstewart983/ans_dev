 <?php
 require('../config.php');
if(isset($_GET['company'])){
$company = $_GET['company'];
$openTickets = mssql_query('select  dbo.company.Company_Name, Count(*) as openTickets
from dbo.SR_Service
LEFT OUTER JOIN dbo.SR_Board on dbo.SR_Service.SR_Board_RecID = dbo.SR_Board.SR_Board_RecID
left outer join dbo.company on dbo.company.company_recid = dbo.sr_service.company_recid
where Company.Company_Name="'.$company.'"  and (dbo.SR_Board.Board_Name = "My Company/Service"
or dbo.SR_Board.Board_Name = "Results Physiotherapy"
or dbo.SR_Board.Board_Name = "Alerts - Service Delivery")
and dbo.SR_Service.Date_Closed is null  group by dbo.company.Company_Name order by openTickets desc');
}else{
$openTickets = mssql_query('select top 10 dbo.company.Company_Name, Count(*) as openTickets
from dbo.SR_Service
LEFT OUTER JOIN dbo.SR_Board on dbo.SR_Service.SR_Board_RecID = dbo.SR_Board.SR_Board_RecID
left outer join dbo.company on dbo.company.company_recid = dbo.sr_service.company_recid
where  Company.Company_name != "Advanced Network Solutions" and Company.Company_name != "Catchall (from email connector)" and company.company_name !="Results Physiotherapy" and (dbo.SR_Board.Board_Name = "My Company/Service"
or dbo.SR_Board.Board_Name = "Results Physiotherapy"
or dbo.SR_Board.Board_Name = "Alerts - Service Delivery")
and dbo.SR_Service.Date_Closed is null  group by dbo.company.Company_Name order by openTickets desc');
}
if(!$openTickets){
  die("Error: ".mssql_get_last_message());
}


// fetch all rows from the query
$all_rows = array();
while($row = mssql_fetch_assoc($openTickets)) {
    $all_rows []= $row;
}

header("Content-Type: application/json");
echo json_encode($all_rows);
?>