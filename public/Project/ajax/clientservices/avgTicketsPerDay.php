 <?php
 $title = "Avgerage Tickets/Day - Last 6 Months";
 $description = "This represents the average number of tickets created per day for a given company";
 $datasource = "Connectwise";
 require('../../config/config.php');

if(isset($_GET['company'])){

$company = $_GET['company'];
$company = urldecode($company);

$query = 'select company.Company_Name, COUNT(*)/180 as Avg_Daily_Total_Tickets
from SR_Service left outer join dbo.SR_Board on sr_service.SR_Board_RecID = sr_board.SR_Board_RecID
left outer join Company on sr_service.Company_RecID = company.Company_RecID
where Company.Company_Name="'.$company.'" and sr_service.Date_Entered >= DATEADD(MONTH,DATEDIFF(month,0,dateadd(m,-6,current_timestamp)),0)
group by company.Company_Name
order by company.Company_Name';

}
else{
$query = 'select COUNT(*)/180 as Avg_Daily_Total_Tickets
from SR_Service left outer join dbo.SR_Board on sr_service.SR_Board_RecID = sr_board.SR_Board_RecID
left outer join Company on sr_service.Company_RecID = company.Company_RecID
where sr_service.Date_Entered >= DATEADD(MONTH,DATEDIFF(month,0,dateadd(m,-6,current_timestamp)),0)';
}

$avgTickets = mssql_query($query);

$query1 = str_replace('"',"",$query);

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
