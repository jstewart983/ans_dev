<?php

require('../../config/config.php');
$title = "Opened Tickets vs Hours Worked Analyzer";
$description ="This tool allows you to display the number of tickets created and the number of hours worked in the date range of your choosing. You have the ability to filter by company and service type. Press the apply button in the date range selector to refresh the data. The chart will not refresh if there are no results.";
$datasource = "Connectwise";
$actual_link = $_SERVER['HTTP_REFERER'];
$path = parse_url($actual_link,PHP_URL_PATH);
//$path = strstr($path,"/service_delivery");
//echo $path;
//if (strpos($path,'results') !== false) {

  if(isset($_GET['range1']) && isset($_GET['range2']) && isset($_GET['company']) && isset($_GET['type'])){

    $range1 = $_GET['range1'];
    $range2 = $_GET['range2'];
    $company = $_GET['company'];
    $type = $_GET['type'];
    $query = 'select year(sr_service.Date_Entered) as year,day(sr_service.date_entered) as day,month(sr_service.Date_Entered) as month,COUNT(distinct(sr_service.Date_Entered)) as Tickets
    from dbo.SR_Service
    left outer join dbo.sr_board on dbo.sr_service.sr_board_recid = dbo.sr_board.sr_board_recid
    left outer join company on company.company_recid = sr_service.company_recid
    left outer join sr_type on sr_service.sr_type_recid = sr_type.sr_type_recid
    where sr_type.description = "'.$type.'" and company.company_name = "'.$company.'"  and (sr_service.date_entered >="'.$range1.'" and sr_service.date_entered <= "'.$range2.'")
    group by day(sr_service.date_entered),month(sr_service.Date_Entered),year(sr_service.Date_Entered)
    order by year(sr_service.Date_Entered),month(sr_service.Date_Entered),day(sr_service.date_entered)';

  }else if(isset($_GET['range1']) && isset($_GET['range2']) && isset($_GET['type'])){

    $range1 = $_GET['range1'];
    $range2 = $_GET['range2'];
    $type = $_GET['type'];
    //$type = $_GET['type'];
    $query = 'select year(sr_service.Date_Entered) as year,day(sr_service.date_entered) as day,month(sr_service.Date_Entered) as month,COUNT(distinct(sr_service.Date_Entered)) as Tickets
    from dbo.SR_Service
    left outer join dbo.sr_board on dbo.sr_service.sr_board_recid = dbo.sr_board.sr_board_recid
    left outer join company on company.company_recid = sr_service.company_recid
    left outer join sr_type on sr_service.sr_type_recid = sr_type.sr_type_recid
    where sr_type.description = "'.$type.'" and  (sr_service.date_entered >="'.$range1.'" and sr_service.date_entered <= "'.$range2.'")
    group by day(sr_service.date_entered),month(sr_service.Date_Entered),year(sr_service.Date_Entered)
    order by year(sr_service.Date_Entered),month(sr_service.Date_Entered),day(sr_service.date_entered)';


  }else if(isset($_GET['range1']) && isset($_GET['range2']) && isset($_GET['company'])){

    $company = $_GET['company'];
    $range1 = $_GET['range1'];
    $range2 = $_GET['range2'];
    $query = 'select year(sr_service.Date_Entered) as year,day(sr_service.date_entered) as day,month(sr_service.Date_Entered) as month,COUNT(distinct(sr_service.Date_Entered)) as Tickets
    from dbo.SR_Service
    left outer join dbo.sr_board on dbo.sr_service.sr_board_recid = dbo.sr_board.sr_board_recid
    left outer join company on company.company_recid = sr_service.company_recid
    where company.company_name = "'.$company.'" and (sr_service.date_entered >="'.$range1.'" and sr_service.date_entered <= "'.$range2.'")
    group by day(sr_service.date_entered),month(sr_service.Date_Entered),year(sr_service.Date_Entered)
    order by year(sr_service.Date_Entered),month(sr_service.Date_Entered),day(sr_service.date_entered)';
  }else if(isset($_GET['range1']) && isset($_GET['range2'])){
    $range1 = $_GET['range1'];
    $range2 = $_GET['range2'];
    $query = 'select year(sr_service.Date_Entered) as year,day(sr_service.date_entered) as day,month(sr_service.Date_Entered) as month,COUNT(distinct(sr_service.Date_Entered)) as Tickets
    from dbo.SR_Service
    left outer join dbo.sr_board on dbo.sr_service.sr_board_recid = dbo.sr_board.sr_board_recid
    left outer join company on company.company_recid = sr_service.company_recid
    where (sr_service.date_entered >="'.$range1.'" and sr_service.date_entered <= "'.$range2.'")
    group by day(sr_service.date_entered),month(sr_service.Date_Entered),year(sr_service.Date_Entered)
    order by year(sr_service.Date_Entered),month(sr_service.Date_Entered),day(sr_service.date_entered)';
  }else if (strpos($path,'results') !== false) {

    $query = 'select year(sr_service.Date_Entered) as year,month(sr_service.Date_Entered) as month,COUNT(distinct(sr_service.Date_Entered)) as Tickets
    from dbo.SR_Service
    left outer join dbo.sr_board on dbo.sr_service.sr_board_recid = dbo.sr_board.sr_board_recid
    left outer join company on company.company_recid = sr_service.company_recid
    where company_name= "Results Physiotherapy" and (convert(char(6), sr_service.Date_Entered, 112) <> convert(char(6), getdate(), 112) and year(sr_service.Date_Entered) > year(getdate())-2)
    group by month(sr_service.Date_Entered),year(sr_service.Date_Entered)
    order by year(sr_service.Date_Entered),month(sr_service.Date_Entered) ';

  }
  else{
    $query = 'select year(sr_service.Date_Entered) as year,month(sr_service.Date_Entered) as month,COUNT(distinct(sr_service.Date_Entered)) as Tickets
    from dbo.SR_Service
    left outer join dbo.sr_board on dbo.sr_service.sr_board_recid = dbo.sr_board.sr_board_recid
    left outer join company on company.company_recid = sr_service.company_recid
    where (convert(char(6), sr_service.Date_Entered, 112) <> convert(char(6), getdate(), 112) and year(sr_service.Date_Entered) > year(getdate())-2)
    group by month(sr_service.Date_Entered),year(sr_service.Date_Entered)
    order by year(sr_service.Date_Entered),month(sr_service.Date_Entered) ';

}
//}

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
