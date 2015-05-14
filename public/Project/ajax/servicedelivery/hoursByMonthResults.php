<?php
require('../../config/config.php');
$title = "Opened Tickets vs Hours Worked Analyzer";
$description ="This tool allows you to display the number of tickets created and the number of hours worked in the date range of your choosing. You have the ability to filter by company and service type. Press the apply button in the date range selector to refresh the data. The chart will not refresh if there are no results.";
$datasource = "Connectwise";
$actual_link = $_SERVER['HTTP_REFERER'];
$path = parse_url($actual_link,PHP_URL_PATH);
//$path = strstr($path,"/service_delivery");
//echo $path;
if (strpos($path,'managedservices') !== false) {

  if(isset($_GET['range1']) && isset($_GET['range2']) && isset($_GET['company']) && isset($_GET['type'])){

    $range1 = $_GET['range1'];
    $range2 = $_GET['range2'];
    $company = $_GET['company'];
    $type = $_GET['type'];
    $query = '
    SELECT   month(dbo.time_entry.date_start) as month,day(time_entry.date_start) as day,year(dbo.time_entry.date_start) as year,

    SUM(time_entry.Hours_Actual) as Billable_Hours
    FROM         dbo.Time_Entry LEFT OUTER JOIN
                          dbo.TE_Charge_Code ON dbo.Time_Entry.TE_Charge_Code_RecID = dbo.TE_Charge_Code.TE_Charge_Code_RecID LEFT OUTER JOIN
                          dbo.Member ON dbo.Time_Entry.Member_RecID = dbo.Member.Member_RecID
                          left outer join company on time_entry.company_recid = company.company_recid
                          left outer join sr_service on time_entry.sr_service_recid = sr_service.sr_service_recid
                          left outer join  sr_type on sr_service.sr_type_recid = sr_type.sr_type_recid
                          left outer join sr_board on sr_service.sr_board_recid = sr_board.sr_board_recid
    WHERE (dbo.SR_Board.Board_Name = "BackOffice" or dbo.SR_Board.Board_Name = "Managed Services Requests" or dbo.SR_Board.Board_Name = "" or dbo.SR_Board.Board_Name="LogicMonitor") and sr_type.description = "'.$type.'" and company.company_name = "'.$company.'"  and (convert(char(10), dbo.time_entry.date_start, 120) >="'.$range1.'" and convert(char(10), dbo.time_entry.date_start, 120) <= "'.$range2.'")

    group by day(time_entry.date_start),month(time_entry.date_start),year(time_entry.date_start)
    order by year(time_entry.date_start),month(time_entry.date_start),day(time_entry.date_start) ';

  }else if(isset($_GET['range1']) && isset($_GET['range2']) && isset($_GET['type'])){
    $range1 = $_GET['range1'];
    $range2 = $_GET['range2'];
    //$company = $_GET['company'];
    $type = $_GET['type'];
    $query = '
    SELECT   month(dbo.time_entry.date_start) as month,day(time_entry.date_start) as day,year(dbo.time_entry.date_start) as year,

    SUM(time_entry.Hours_Actual) as Billable_Hours
    FROM         dbo.Time_Entry LEFT OUTER JOIN
                          dbo.TE_Charge_Code ON dbo.Time_Entry.TE_Charge_Code_RecID = dbo.TE_Charge_Code.TE_Charge_Code_RecID LEFT OUTER JOIN
                          dbo.Member ON dbo.Time_Entry.Member_RecID = dbo.Member.Member_RecID
                          left outer join company on time_entry.company_recid = company.company_recid
                          left outer join sr_service on time_entry.sr_service_recid = sr_service.sr_service_recid
                          left outer join  sr_type on sr_service.sr_type_recid = sr_type.sr_type_recid
                          left outer join sr_board on sr_service.sr_board_recid = sr_board.sr_board_recid
    WHERE (dbo.SR_Board.Board_Name = "BackOffice" or dbo.SR_Board.Board_Name = "Managed Services Requests" or dbo.SR_Board.Board_Name = "" or dbo.SR_Board.Board_Name="LogicMonitor") and sr_type.description = "'.$type.'" and  (convert(char(10), dbo.time_entry.date_start, 120) >="'.$range1.'" and convert(char(10), dbo.time_entry.date_start, 120) <= "'.$range2.'")

    group by day(time_entry.date_start),month(time_entry.date_start),year(time_entry.date_start)
    order by year(time_entry.date_start),month(time_entry.date_start),day(time_entry.date_start) ';



  }else if(isset($_GET['range1']) && isset($_GET['range2']) && isset($_GET['company'])){
    $range1 = $_GET['range1'];
    $range2 = $_GET['range2'];
    $company = $_GET['company'];
    //$type = $_GET['type'];
    $query = '
    SELECT   month(dbo.time_entry.date_start) as month,day(time_entry.date_start) as day,year(dbo.time_entry.date_start) as year,

    SUM(time_entry.Hours_Actual) as Billable_Hours
    FROM         dbo.Time_Entry LEFT OUTER JOIN
                          dbo.TE_Charge_Code ON dbo.Time_Entry.TE_Charge_Code_RecID = dbo.TE_Charge_Code.TE_Charge_Code_RecID LEFT OUTER JOIN
                          dbo.Member ON dbo.Time_Entry.Member_RecID = dbo.Member.Member_RecID
                          left outer join company on time_entry.company_recid = company.company_recid
                          left outer join sr_service on time_entry.sr_service_recid = sr_service.sr_service_recid
                          left outer join sr_type on sr_service.sr_type_recid = sr_type.sr_type_recid
                          left outer join sr_board on sr_service.sr_board_recid = sr_board.sr_board_recid
    WHERE (dbo.SR_Board.Board_Name = "BackOffice" or dbo.SR_Board.Board_Name = "Managed Services Requests" or dbo.SR_Board.Board_Name = "" or dbo.SR_Board.Board_Name="LogicMonitor") and company.company_name = "'.$company.'"  and (convert(char(10), dbo.time_entry.date_start, 120) >="'.$range1.'" and convert(char(10), dbo.time_entry.date_start, 120) <= "'.$range2.'")

    group by day(time_entry.date_start),month(time_entry.date_start),year(time_entry.date_start)
    order by year(time_entry.date_start),month(time_entry.date_start),day(time_entry.date_start) ';


  }else if(isset($_GET['range1']) && isset($_GET['range2'])){
    $range1 = $_GET['range1'];
    $range2 = $_GET['range2'];
    //$company = $_GET['company'];
    //$type = $_GET['type'];

    $query = '
    SELECT   month(dbo.time_entry.date_start) as month,day(time_entry.date_start) as day,year(dbo.time_entry.date_start) as year,

    SUM(time_entry.Hours_Actual) as Billable_Hours

    FROM         dbo.Time_Entry LEFT OUTER JOIN
                          dbo.TE_Charge_Code ON dbo.Time_Entry.TE_Charge_Code_RecID = dbo.TE_Charge_Code.TE_Charge_Code_RecID LEFT OUTER JOIN
                          dbo.Member ON dbo.Time_Entry.Member_RecID = dbo.Member.Member_RecID
                          left outer join company on time_entry.company_recid = company.company_recid
                          left outer join sr_service on time_entry.sr_service_recid = sr_service.sr_service_recid
                          left outer join sr_type on sr_service.sr_type_recid = sr_type.sr_type_recid
                          left outer join sr_board on sr_service.sr_board_recid = sr_board.sr_board_recid
    WHERE (dbo.SR_Board.Board_Name = "BackOffice" or dbo.SR_Board.Board_Name = "Managed Services Requests" or dbo.SR_Board.Board_Name = "" or dbo.SR_Board.Board_Name="LogicMonitor") and (convert(char(10), dbo.time_entry.date_start, 120) >="'.$range1.'" and convert(char(10), dbo.time_entry.date_start, 120) <= "'.$range2.'")

    group by day(time_entry.date_start),month(time_entry.date_start),year(time_entry.date_start)
    order by year(time_entry.date_start),month(time_entry.date_start),day(time_entry.date_start) ';


  }
else{
  $query = '
  SELECT   month(dbo.time_entry.date_start) as month,year(dbo.time_entry.date_start) as year,

  SUM(time_entry.Hours_Actual) AS Billable_Hours
  FROM         dbo.Time_Entry LEFT OUTER JOIN
                        dbo.TE_Charge_Code ON dbo.Time_Entry.TE_Charge_Code_RecID = dbo.TE_Charge_Code.TE_Charge_Code_RecID LEFT OUTER JOIN
                        dbo.Member ON dbo.Time_Entry.Member_RecID = dbo.Member.Member_RecID
                        left outer join company on company.company_recid = time_entry.company_recid
                        left outer join sr_service on time_entry.sr_service_recid = sr_service.sr_service_recid
                        left outer join sr_board on sr_service.sr_board_recid = sr_board.sr_board_recid
  WHERE (dbo.SR_Board.Board_Name = "BackOffice" or dbo.SR_Board.Board_Name = "Managed Services Requests" or dbo.SR_Board.Board_Name = "" or dbo.SR_Board.Board_Name="LogicMonitor") and  (convert(char(6), dbo.time_entry.date_start, 112) <> convert(char(6), getdate(), 112) and year(time_entry.date_start) > year(getdate())-2)

  group by month(dbo.time_entry.date_start),year(dbo.time_entry.date_start)
  order by year(dbo.time_entry.date_start),month(dbo.time_entry.date_start)';
}

}else if(strpos($path,'servicedelivery') !== false) {

  if(isset($_GET['range1']) && isset($_GET['range2']) && isset($_GET['company']) && isset($_GET['type'])){

    $range1 = $_GET['range1'];
    $range2 = $_GET['range2'];
    $company = $_GET['company'];
    $type = $_GET['type'];
    $query = '
    SELECT   month(dbo.time_entry.date_start) as month,day(time_entry.date_start) as day,year(dbo.time_entry.date_start) as year,

    SUM(time_entry.Hours_Actual) as Billable_Hours
    FROM         dbo.Time_Entry LEFT OUTER JOIN
                          dbo.TE_Charge_Code ON dbo.Time_Entry.TE_Charge_Code_RecID = dbo.TE_Charge_Code.TE_Charge_Code_RecID LEFT OUTER JOIN
                          dbo.Member ON dbo.Time_Entry.Member_RecID = dbo.Member.Member_RecID
                          left outer join company on time_entry.company_recid = company.company_recid
                          left outer join sr_service on time_entry.sr_service_recid = sr_service.sr_service_recid
                          left outer join  sr_type on sr_service.sr_type_recid = sr_type.sr_type_recid
                          left outer join sr_board on sr_service.sr_board_recid = sr_board.sr_board_recid
    WHERE dbo.member.Title like "%IT Support%" and (dbo.SR_Board.Board_Name = "My Company/Service" or dbo.SR_Board.Board_Name = "Alerts - Service Delivery" or dbo.SR_Board.Board_Name = "Results Physiotherapy" or dbo.SR_Board.Board_Name="Results - Initiatives") and  sr_type.description = "'.$type.'" and company.company_name =       "'.$company.'"  and (convert(char(10), dbo.time_entry.date_start, 120)     >="'.$range1.'" and convert(char(10), dbo.time_entry.date_start, 120) <= "'.$range2.'")

    group by day(time_entry.date_start),month(time_entry.date_start),year(time_entry.date_start)
    order by year(time_entry.date_start),month(time_entry.date_start),day(time_entry.date_start) ';

  }else if(isset($_GET['range1']) && isset($_GET['range2']) && isset($_GET['type'])){
    $range1 = $_GET['range1'];
    $range2 = $_GET['range2'];
    //$company = $_GET['company'];
    $type = $_GET['type'];
    $query = '
    SELECT   month(dbo.time_entry.date_start) as month,day(time_entry.date_start) as day,year(dbo.time_entry.date_start) as year,

    SUM(time_entry.Hours_Actual) as Billable_Hours
    FROM         dbo.Time_Entry LEFT OUTER JOIN
                          dbo.TE_Charge_Code ON dbo.Time_Entry.TE_Charge_Code_RecID = dbo.TE_Charge_Code.TE_Charge_Code_RecID LEFT OUTER JOIN
                          dbo.Member ON dbo.Time_Entry.Member_RecID = dbo.Member.Member_RecID
                          left outer join company on time_entry.company_recid = company.company_recid
                          left outer join sr_service on time_entry.sr_service_recid = sr_service.sr_service_recid
                          left outer join  sr_type on sr_service.sr_type_recid = sr_type.sr_type_recid
                              left outer join sr_board on sr_service.sr_board_recid = sr_board.sr_board_recid
    WHERE dbo.member.Title like "%IT Support%" and (dbo.SR_Board.Board_Name = "My Company/Service" or dbo.SR_Board.Board_Name = "Alerts - Service Delivery" or dbo.SR_Board.Board_Name = "Results Physiotherapy" or dbo.SR_Board.Board_Name="Results - Initiatives") and sr_type.description = "'.$type.'" and  (convert(char(10), dbo.time_entry.date_start, 120) >="'.$range1.'" and convert(char(10), dbo.time_entry.date_start, 120) <= "'.$range2.'")

    group by day(time_entry.date_start),month(time_entry.date_start),year(time_entry.date_start)
    order by year(time_entry.date_start),month(time_entry.date_start),day(time_entry.date_start) ';



  }else if(isset($_GET['range1']) && isset($_GET['range2']) && isset($_GET['company'])){
    $range1 = $_GET['range1'];
    $range2 = $_GET['range2'];
    $company = $_GET['company'];
    //$type = $_GET['type'];
    $query = '
    SELECT   month(dbo.time_entry.date_start) as month,day(time_entry.date_start) as day,year(dbo.time_entry.date_start) as year,

    SUM(time_entry.Hours_Actual) as Billable_Hours
    FROM         dbo.Time_Entry LEFT OUTER JOIN
                          dbo.TE_Charge_Code ON dbo.Time_Entry.TE_Charge_Code_RecID = dbo.TE_Charge_Code.TE_Charge_Code_RecID LEFT OUTER JOIN
                          dbo.Member ON dbo.Time_Entry.Member_RecID = dbo.Member.Member_RecID
                          left outer join company on time_entry.company_recid = company.company_recid
                          left outer join sr_service on time_entry.sr_service_recid = sr_service.sr_service_recid
                          left outer join sr_type on sr_service.sr_type_recid = sr_type.sr_type_recid
                             left outer join sr_board on sr_service.sr_board_recid = sr_board.sr_board_recid
    WHERE dbo.member.Title like "%IT Support%" and (dbo.SR_Board.Board_Name = "My Company/Service" or dbo.SR_Board.Board_Name = "Alerts - Service Delivery" or dbo.SR_Board.Board_Name = "Results Physiotherapy" or dbo.SR_Board.Board_Name="Results - Initiatives") and company.company_name = "'.$company.'"  and (convert(char(10), dbo.time_entry.date_start, 120) >="'.$range1.'" and convert(char(10), dbo.time_entry.date_start, 120) <= "'.$range2.'")

    group by day(time_entry.date_start),month(time_entry.date_start),year(time_entry.date_start)
    order by year(time_entry.date_start),month(time_entry.date_start),day(time_entry.date_start) ';


  }else if(isset($_GET['range1']) && isset($_GET['range2'])){
    $range1 = $_GET['range1'];
    $range2 = $_GET['range2'];
    //$company = $_GET['company'];
    //$type = $_GET['type'];

    $query = '
    SELECT   month(dbo.time_entry.date_start) as month,day(time_entry.date_start) as day,year(dbo.time_entry.date_start) as year,

    SUM(time_entry.Hours_Actual) as Billable_Hours

    FROM         dbo.Time_Entry LEFT OUTER JOIN
                          dbo.TE_Charge_Code ON dbo.Time_Entry.TE_Charge_Code_RecID = dbo.TE_Charge_Code.TE_Charge_Code_RecID LEFT OUTER JOIN
                          dbo.Member ON dbo.Time_Entry.Member_RecID = dbo.Member.Member_RecID
                          left outer join company on time_entry.company_recid = company.company_recid
                          left outer join sr_service on time_entry.sr_service_recid = sr_service.sr_service_recid
                          left outer join sr_type on sr_service.sr_type_recid = sr_type.sr_type_recid
                              left outer join sr_board on sr_service.sr_board_recid = sr_board.sr_board_recid
    WHERE dbo.member.Title like "%IT Support%" and (dbo.SR_Board.Board_Name = "My Company/Service" or dbo.SR_Board.Board_Name = "Alerts - Service Delivery" or dbo.SR_Board.Board_Name = "Results Physiotherapy" or dbo.SR_Board.Board_Name="Results - Initiatives") and (convert(char(10), dbo.time_entry.date_start, 120) >="'.$range1.'" and convert(char(10), dbo.time_entry.date_start, 120) <= "'.$range2.'")

    group by day(time_entry.date_start),month(time_entry.date_start),year(time_entry.date_start)
    order by year(time_entry.date_start),month(time_entry.date_start),day(time_entry.date_start) ';


  }
  else{
    
        $query = '
    SELECT     month(dbo.time_entry.date_start) as month,year(dbo.time_entry.date_start) as year,

    SUM(time_entry.Hours_Actual) AS Billable_Hours

    FROM         dbo.Time_Entry LEFT OUTER JOIN
                          dbo.TE_Charge_Code ON dbo.Time_Entry.TE_Charge_Code_RecID = dbo.TE_Charge_Code.TE_Charge_Code_RecID LEFT OUTER JOIN
                          dbo.Member ON dbo.Time_Entry.Member_RecID = dbo.Member.Member_RecID
                          left outer join company on time_entry.company_recid = company.company_recid
                          left outer join sr_service on time_entry.sr_service_recid = sr_service.sr_service_recid
                          left outer join sr_type on sr_service.sr_type_recid = sr_type.sr_type_recid
                              left outer join sr_board on sr_service.sr_board_recid = sr_board.sr_board_recid
    WHEREdbo.member.Title like "%IT Support%" and (dbo.SR_Board.Board_Name = "My Company/Service" or dbo.SR_Board.Board_Name = "Alerts - Service Delivery" or dbo.SR_Board.Board_Name = "Results Physiotherapy" or dbo.SR_Board.Board_Name="Results - Initiatives") and (convert(char(6), dbo.time_entry.date_start, 112) <> convert(char(6), getdate(), 112) and year(time_entry.date_start) > year(getdate())-2)

    group by month(dbo.time_entry.date_start),year(dbo.time_entry.date_start)
    order by year(dbo.time_entry.date_start),month(dbo.time_entry.date_start)';
    
  }

}
else if (strpos($path,'results') !== false) {

    $query = '
    SELECT   month(dbo.time_entry.date_start) as month,year(dbo.time_entry.date_start) as year,

    SUM(time_entry.Hours_Actual) AS Billable_Hours
    FROM         dbo.Time_Entry LEFT OUTER JOIN
                          dbo.TE_Charge_Code ON dbo.Time_Entry.TE_Charge_Code_RecID = dbo.TE_Charge_Code.TE_Charge_Code_RecID LEFT OUTER JOIN
                          dbo.Member ON dbo.Time_Entry.Member_RecID = dbo.Member.Member_RecID
                          left outer join company on company.company_recid = time_entry.company_recid
    WHERE  company_name = "Results Physiotherapy" and (convert(char(6), dbo.time_entry.date_start, 112) <> convert(char(6), getdate(), 112) and year(time_entry.date_start) > year(getdate())-2)

    group by month(dbo.time_entry.date_start),year(dbo.time_entry.date_start)
    order by year(dbo.time_entry.date_start),month(dbo.time_entry.date_start)';



  }
  /*else{


    $query = '
    SELECT   month(dbo.time_entry.date_start) as month,year(dbo.time_entry.date_start) as year,

    SUM(time_entry.Hours_Actual) AS Billable_Hours
    FROM         dbo.Time_Entry LEFT OUTER JOIN
                          dbo.TE_Charge_Code ON dbo.Time_Entry.TE_Charge_Code_RecID = dbo.TE_Charge_Code.TE_Charge_Code_RecID LEFT OUTER JOIN
                          dbo.Member ON dbo.Time_Entry.Member_RecID = dbo.Member.Member_RecID
                          left outer join company on company.company_recid = time_entry.company_recid
    WHERE  (convert(char(6), dbo.time_entry.date_start, 112) <> convert(char(6), getdate(), 112) and year(time_entry.date_start) > year(getdate())-2)

    group by month(dbo.time_entry.date_start),year(dbo.time_entry.date_start)
    order by year(dbo.time_entry.date_start),month(dbo.time_entry.date_start)';


  }*/





/*}else{

  $query = '
  SELECT   month(dbo.time_entry.date_start) as month,year(dbo.time_entry.date_start) as year,

  SUM(time_entry.Hours_Actual) AS Billable_Hours
  FROM         dbo.Time_Entry LEFT OUTER JOIN
                        dbo.Member ON dbo.Time_Entry.Member_RecID = dbo.Member.Member_RecID
                        left outer join company on company.company_recid = time_entry.company_recid
  WHERE
  (dbo.Member.Member_id = "bdyer" or
  dbo.Member.Member_id = "tbrown" or
  dbo.Member.Member_id = "cvarga" or
  dbo.Member.Member_id = "badams" or
  dbo.Member.Member_id = "pfotineas" or
  dbo.Member.Member_id = "dmitchell" or
  dbo.Member.Member_id = "jfelts" or
  dbo.Member.Member_id = "jsimpler" or
  dbo.Member.Member_id = "mmcburnett" or
  dbo.Member.Member_id = "mblake" or
  dbo.Member.Member_id = "sfrench" or
  dbo.Member.Member_id = "jhaltom" or
  dbo.Member.Member_id = "vhall" or
  dbo.Member.Member_id = "jhultman" or
  dbo.Member.Member_id = "nwhitaker" or
  dbo.Member.Member_id = "breynolds" or
  dbo.Member.Member_id = "jdumouchel" or
  dbo.Member.Member_id = "jfitzwater" or
  dbo.Member.Member_id = "pfenech" or dbo.Member.Member_id = "zhoover") and
  (convert(char(6), dbo.time_entry.date_start, 112) <> convert(char(6), getdate(), 112) and year(time_entry.date_start) > year(getdate())-2)

  group by month(dbo.time_entry.date_start),year(dbo.time_entry.date_start)
  order by year(dbo.time_entry.date_start),month(dbo.time_entry.date_start)';

}*/

$projectHours = mssql_query($query);
$query1 = str_replace('"',"",$query);
// fetch all rows from the query
$all_rows = array();

while($row = mssql_fetch_assoc($projectHours)) {

  $row["Title"] =$title;
  $row["Description"] = $description;
  $row["Query"] = $query1;
  $row["Datasource"] = $datasource;
  $all_rows []= $row;


}

header("Content-Type: application/json");
echo json_encode($all_rows);
?>
