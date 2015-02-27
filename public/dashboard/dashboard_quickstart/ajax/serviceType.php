 <?php
 require('../config.php');
if(isset($_GET['company'])){
$company = $_GET['company'];
$openTickets = mssql_query('SELECT top 10 SR_Type.Description,count(*) as typeCount
FROM cwwebapp_ans.dbo.Company Company, cwwebapp_ans.dbo.SR_Board SR_Board, cwwebapp_ans.dbo.SR_Service SR_Service, cwwebapp_ans.dbo.SR_Type SR_Type
WHERE Company.Company_RecID = SR_Service.Company_RecID AND
SR_Type.SR_Type_RecID = SR_Service.SR_Type_RecID AND
SR_Board.SR_Board_RecID = SR_Service.SR_Board_RecID AND
SR_Board.SR_Board_RecID = SR_Type.SR_Board_RecID AND 
SR_Type.Description != "Break-fix" AND
Company.Company_Name = "'.$company.'"
group by Description
order by typeCount desc
');
}else{
$openTickets = mssql_query('SELECT top 10   SR_Type.Description,count(*) as typeCount
FROM cwwebapp_ans.dbo.Company Company, cwwebapp_ans.dbo.SR_Board SR_Board, cwwebapp_ans.dbo.SR_Service SR_Service, cwwebapp_ans.dbo.SR_Type SR_Type
WHERE Company.Company_RecID = SR_Service.Company_RecID AND
SR_Type.SR_Type_RecID = SR_Service.SR_Type_RecID AND
SR_Board.SR_Board_RecID = SR_Service.SR_Board_RecID AND
SR_Board.SR_Board_RecID = SR_Type.SR_Board_RecID AND 
SR_Type.Description != "Break-fix"
group by Description
order by typeCount desc');
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


