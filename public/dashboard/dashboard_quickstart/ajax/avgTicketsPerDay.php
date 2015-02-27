 <?php
 require('../config.php');

if(isset($_GET['company'])){
$company = $_GET['company'];

$avgTickets = mssql_query('select company.Company_Name, COUNT(*)/180 as Avg_Daily_Total_Tickets   
from SR_Service left outer join dbo.SR_Board on sr_service.SR_Board_RecID = sr_board.SR_Board_RecID
left outer join Company on sr_service.Company_RecID = company.Company_RecID
where Company.Company_Name="'.$company.'" and sr_service.Date_Entered >= DATEADD(MONTH,DATEDIFF(month,0,dateadd(m,-6,current_timestamp)),0)
group by company.Company_Name
order by company.Company_Name');

}
else{
$avgTickets = mssql_query('select COUNT(*)/180 as Avg_Daily_Total_Tickets   
from SR_Service left outer join dbo.SR_Board on sr_service.SR_Board_RecID = sr_board.SR_Board_RecID
left outer join Company on sr_service.Company_RecID = company.Company_RecID
where sr_service.Date_Entered >= DATEADD(MONTH,DATEDIFF(month,0,dateadd(m,-6,current_timestamp)),0)');
}

if(!$avgTickets){
  die("Error: ".mssql_get_last_message());
}

while($row = mssql_fetch_assoc($avgTickets)) {
    echo $row['Avg_Daily_Total_Tickets'];
}

// fetch all rows from the query
/*$all_rows = array();
while($row = mssql_fetch_assoc($avgTickets)) {
    $all_rows []= $row;
}

header("Content-Type: application/json");
echo json_encode($all_rows);*/
?>

