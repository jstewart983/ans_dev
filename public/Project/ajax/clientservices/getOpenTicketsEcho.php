 <?php
 require('../../config/config.php');
if(isset($_GET['company'])){

$company = $_GET['company'];
$company = urldecode($company);

$openTickets = mssql_query('select Count(*) as openTickets
from dbo.SR_Service
LEFT OUTER JOIN dbo.SR_Board on dbo.SR_Service.SR_Board_RecID = dbo.SR_Board.SR_Board_RecID
left outer join sr_status on sr_service.sr_status_recid = sr_status.sr_status_recid
left outer join company on sr_service.company_recid = company.company_recid
where company.company_name = "'.$company.'" and (sr_status.description <> "Closed" and sr_status.description <> "Canceled" and sr_status.description <> "Closed - First Call") and (dbo.SR_Board.Board_Name = "My Company/Service" or dbo.SR_Board.Board_Name = "Alerts - Service Delivery" or dbo.SR_Board.Board_Name = "Results Physiotherapy" or dbo.SR_Board.Board_Name="Results - Initiatives") and sr_service.date_closed is null');

}else{

$openTickets = mssql_query('select Count(*) as openTickets
from dbo.SR_Service
LEFT OUTER JOIN dbo.SR_Board on dbo.SR_Service.SR_Board_RecID = dbo.SR_Board.SR_Board_RecID
left outer join sr_status on sr_service.sr_status_recid = sr_status.sr_status_recid
where (sr_status.description <> "Closed" and sr_status.description <> "Canceled" and sr_status.description <> "Closed - First Call") and (dbo.SR_Board.Board_Name = "My Company/Service" or dbo.SR_Board.Board_Name = "Alerts - Service Delivery" or dbo.SR_Board.Board_Name = "Results Physiotherapy" or dbo.SR_Board.Board_Name="Results - Initiatives") and sr_service.date_closed is null');

}
if(!$openTickets){
  die("Error: ".mssql_get_last_message());
}


// fetch all rows from the query

while($row = mssql_fetch_assoc($openTickets)) {
    echo $row['openTickets'];
}


?>
