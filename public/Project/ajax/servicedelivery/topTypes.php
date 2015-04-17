<?php
require('../../config/config.php');
$title = "Hours by Service Type (top 10) - This Week";
$description ="This chart represents the top 10 service types by hours spent on them this week, by a member of the service desk or field services team (depending on the filter selected above)";
$datasource ="Connectwise";
$actual_link = $_SERVER['HTTP_REFERER'];
$path = parse_url($actual_link,PHP_URL_PATH);
//$path = strstr($path,"/service_delivery");
//echo $path;
if (strpos($path,'results') !== false) {
$query = 'SELECT top 10 SR_Type.Description as type,sum(time_entry.hours_actual) as typeCount
FROM cwwebapp_ans.dbo.Company Company, cwwebapp_ans.dbo.SR_Board SR_Board, cwwebapp_ans.dbo.SR_Service SR_Service, cwwebapp_ans.dbo.SR_Type SR_Type,cwwebapp_ans.dbo.Time_Entry
WHERE Company.Company_RecID = Time_Entry.Company_RecID AND
SR_Service.SR_Service_RecID = Time_Entry.SR_Service_RecID AND
Company.Company_RecID = SR_Service.Company_RecID AND
SR_Type.SR_Type_RecID = SR_Service.SR_Type_RecID AND
SR_Board.SR_Board_RecID = SR_Service.SR_Board_RecID AND
SR_Board.SR_Board_RecID = SR_Type.SR_Board_RecID AND
company.company_name = "Results Physiotherapy"
and DATEDIFF( ww, dbo.Time_Entry.Date_Entered_UTC, GETDATE() ) = 0
group by Description
order by typeCount desc
';
}
else if(strpos($path,'desk') !== false){

  $query = 'SELECT top 10 SR_Type.Description as type,sum(time_entry.hours_actual) as typeCount
  FROM cwwebapp_ans.dbo.Company Company, cwwebapp_ans.dbo.SR_Board SR_Board,dbo.member, cwwebapp_ans.dbo.SR_Service SR_Service, cwwebapp_ans.dbo.SR_Type SR_Type,cwwebapp_ans.dbo.Time_Entry
  WHERE Company.Company_RecID = Time_Entry.Company_RecID AND
  SR_Service.SR_Service_RecID = Time_Entry.SR_Service_RecID AND
  Company.Company_RecID = SR_Service.Company_RecID AND
  SR_Type.SR_Type_RecID = SR_Service.SR_Type_RecID AND
  SR_Board.SR_Board_RecID = SR_Service.SR_Board_RecID AND
  SR_Board.SR_Board_RecID = SR_Type.SR_Board_RecID AND SR_Service.Closed_By = Member.Member_ID


  and DATEDIFF( ww, dbo.Time_Entry.Date_Entered_UTC, GETDATE() ) = 0 and member.title like "%IT Support%"
  group by Description
  order by typeCount desc';



}
else if(strpos($path,'CIM') !== false){

  $query = 'SELECT top 10 SR_Type.Description as type,sum(time_entry.hours_actual) as typeCount
  FROM cwwebapp_ans.dbo.Company Company, cwwebapp_ans.dbo.SR_Board SR_Board,dbo.member, cwwebapp_ans.dbo.SR_Service SR_Service, cwwebapp_ans.dbo.SR_Type SR_Type,cwwebapp_ans.dbo.Time_Entry
  WHERE Company.Company_RecID = Time_Entry.Company_RecID AND
  SR_Service.SR_Service_RecID = Time_Entry.SR_Service_RecID AND
  Company.Company_RecID = SR_Service.Company_RecID AND
  SR_Type.SR_Type_RecID = SR_Service.SR_Type_RecID AND
  SR_Board.SR_Board_RecID = SR_Service.SR_Board_RecID AND
  SR_Board.SR_Board_RecID = SR_Type.SR_Board_RecID AND SR_Service.Closed_By = Member.Member_ID and

 DATEDIFF( ww, dbo.Time_Entry.Date_Entered_UTC, GETDATE() ) = 0 and (member.title like "%Client IT%" or member.member_id = "zhoover")
  group by Description
  order by typeCount desc';



}else{

  $query = 'SELECT top 10 SR_Type.Description as type,sum(time_entry.hours_actual) as typeCount
  FROM cwwebapp_ans.dbo.Company Company, cwwebapp_ans.dbo.SR_Board SR_Board,dbo.member, cwwebapp_ans.dbo.SR_Service SR_Service, cwwebapp_ans.dbo.SR_Type SR_Type,cwwebapp_ans.dbo.Time_Entry

  WHERE Company.Company_RecID = Time_Entry.Company_RecID AND
  SR_Service.SR_Service_RecID = Time_Entry.SR_Service_RecID AND
  Company.Company_RecID = SR_Service.Company_RecID AND
  SR_Type.SR_Type_RecID = SR_Service.SR_Type_RecID AND
  SR_Board.SR_Board_RecID = SR_Service.SR_Board_RecID AND
  SR_Board.SR_Board_RecID = SR_Type.SR_Board_RecID AND
  member.member_id = sr_service.closed_by AND

  (member.title like "%IT Support%" or member.title like "%Client IT%" or member.member_id="zhoover")
  and DATEDIFF( ww, dbo.Time_Entry.Date_Entered_UTC, GETDATE() ) = 0
  group by Description
  order by typeCount desc
  ';

}
//(sr_board.board_name = "My Company/Service" or sr_board.board_name = "Alerts - Service Delivery" or sr_board.board_name = "Results Physiotherapy")
$openTickets = mssql_query($query);
$query1 = str_replace('"',"",$query);


// fetch all rows from the query
$all_rows = array();
while($row = mssql_fetch_assoc($openTickets)) {

  $row["Title"] =$title;
  $row["Description"] = $description;
  $row["Query"] = $query1;
  $row["Datasource"] = $datasource;
    $all_rows []= $row;
}


header("Content-Type: application/json");
echo json_encode($all_rows);
?>
