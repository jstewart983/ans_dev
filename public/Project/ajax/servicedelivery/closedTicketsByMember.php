<?php
error_reporting(-1);
ini_set('display_errors', 'On');
require('../../config/config.php');
$title = "Tickets Closed by Member - This Wk";
$description = "This represents the total tickets closed by the Service Delivery Team, by member, by day, this week";
$datasource = "Connectwise";

$actual_link = $_SERVER['HTTP_REFERER'];
$path = parse_url($actual_link,PHP_URL_PATH);
//$path = strstr($path,"/service_delivery");
//echo $path;
if (strpos($path,'servicedelivery') !== false) {

  //If date range is selected do this stuff below
  if(isset($_GET['range1']) && isset($_GET['range2'])){

    $range1 = $_GET['range1'];
    $range2 = $_GET['range2'];
    //if a member is clicked in billable hours by member chart
    if(isset($_GET['member'])){
      //if the datetype set in the url is day then group by day
      if($_GET['datetype']=='day'){
            $member = $_GET['member'];
            $query ='select count(distinct(sr_service.sr_service_recid)) as ticketsMember,DATENAME(dw,dbo.sr_service.date_closed) as day,day(dbo.sr_service.date_closed)
          from sr_service left outer join dbo.member on dbo.sr_service.closed_by = member.member_id
          left outer join dbo.company on dbo.sr_service.company_recid = company.company_recid left outer join time_entry on sr_service.sr_service_recid = time_entry.sr_service_recid
          left outer join time_entry on sr_service.sr_service_recid = time_entry.sr_service_recid
          where  time_entry.hours_actual > 0 and dbo.member.member_id = "'.$member.'"
          and (dbo.sr_service.date_closed >="'.$range1.'" and dbo.sr_service.date_closed <= "'.$range2.'")
          group by DATENAME(dw,dbo.sr_service.date_closed),day(dbo.sr_service.date_closed)
          order by day(dbo.sr_service.date_closed)
          ';
          //otherwise if the datetype set in the url is month then group by month
          }else{
            $member = $_GET['member'];
            $query ='select count(distinct(sr_service.sr_service_recid)) as ticketsMember,DATENAME(month,dbo.sr_service.date_closed) as day,month(dbo.sr_service.date_closed) as month,year(dbo.sr_service.date_closed) as year
          from sr_service left outer join dbo.member  on dbo.sr_service.closed_by = member.member_id
          left outer join dbo.company on dbo.sr_service.company_recid = company.company_recid left outer join time_entry on sr_service.sr_service_recid = time_entry.sr_service_recid
          where  time_entry.hours_actual > 0 and dbo.member.member_id = "'.$member.'"
          and (dbo.sr_service.date_closed >="'.$range1.'" and dbo.sr_service.date_closed <= "'.$range2.'")
          group by DATENAME(month,dbo.sr_service.date_closed),month(dbo.sr_service.date_closed),year(dbo.sr_service.date_closed)
          order by month(dbo.sr_service.date_closed)
          ';
            }
        }else{
            $query = 'select member.member_id,count(distinct(sr_service.sr_service_recid)) as ticketsMember
          from sr_service left outer join dbo.member on dbo.sr_service.closed_by = member.member_id
          left outer join time_entry on sr_service.sr_service_recid = time_entry.sr_service_recid
          where  time_entry.hours_actual > 0  and (dbo.member.Title like "%IT Support%")
          and (dbo.sr_service.date_closed >="'.$range1.'" and dbo.sr_service.date_closed <= "'.$range2.'")
          group by member.member_id
          order by member.member_id desc';
            }
  }else  if(isset($_GET['member'])){
      //if the datetype set in the url is day then group by day
      if($_GET['datetype']=='day'){
            $member = $_GET['member'];
            $query ='select count(distinct(sr_service.sr_service_recid)) as ticketsMember,DATENAME(dw,dbo.sr_service.date_closed) as day,day(dbo.sr_service.date_closed)
          from sr_service left outer join dbo.member  on dbo.sr_service.closed_by = member.member_id
          left outer join dbo.company on dbo.sr_service.company_recid = company.company_recid left outer join time_entry on sr_service.sr_service_recid = time_entry.sr_service_recid
          where  time_entry.hours_actual > 0 and dbo.member.member_id = "'.$member.'"
          and DATEDIFF(ww, dbo.sr_service.date_closed, getdate())=0
          group by DATENAME(dw,dbo.sr_service.date_closed),day(dbo.sr_service.date_closed)
          order by day(dbo.sr_service.date_closed)
          ';
          //otherwise if the datetype set in the url is month then group by month
          }else{
            $member = $_GET['member'];
            $query ='select count(distinct(sr_service.sr_service_recid)) as ticketsMember,month(dbo.sr_service.date_closed) as month,year(dbo.sr_service.date_closed) as year
          from sr_service left outer join dbo.member  on dbo.sr_service.closed_by = member.member_id
          left outer join dbo.company on dbo.sr_service.company_recid = company.company_recid left outer join time_entry on sr_service.sr_service_recid = time_entry.sr_service_recid
          where  time_entry.hours_actual > 0 and dbo.member.member_id = "'.$member.'"
          and DATEDIFF(ww, dbo.sr_service.date_closed, getdate())=0
          group by month(dbo.sr_service.date_closed),year(dbo.sr_service.date_closed)
          order by month(dbo.sr_service.date_closed)
          ';
            }
        }else{

    $query = 'select member.member_id,count(distinct(sr_service.sr_service_recid)) as ticketsMember
  from sr_service left outer join dbo.member      on dbo.sr_service.closed_by = member.member_id
  left outer join time_entry on sr_service.sr_service_recid = time_entry.sr_service_recid
  where  time_entry.hours_actual > 0  and (dbo.member.Title like "%IT Support%")
  and DATEDIFF(ww, dbo.sr_service.date_closed, getdate())=0
  group by member.member_id
  order by member.member_id desc';

  }////////END Date range selection check///////////
//if a member is clicked in billable hours by member chart
  /*else if(isset($_GET['member'])){
    //if the datetype set in the url is day then group by day
    if($_GET['datetype']=='day'){
      $member = $_GET['member'];
      $query ='select count(distinct(sr_service.sr_service_recid)) as ticketsMember,DATENAME(dw,dbo.sr_service.date_closed) as day,day(dbo.sr_service.date_closed)
    from sr_service left outer join dbo.member  on dbo.sr_service.closed_by = member.member_id
    left outer join dbo.company on dbo.sr_service.company_recid = company.company_recid left outer join time_entry on sr_service.sr_service_recid = time_entry.sr_service_recid
    where  time_entry.hours_actual > 0 and dbo.member.member_id = "'.$member.'"
    and DATEDIFF(ww, dbo.sr_service.date_closed, getdate())=0
    group by DATENAME(dw,dbo.sr_service.date_closed),day(dbo.sr_service.date_closed)
    order by day(dbo.sr_service.date_closed)
    ';

  //otherwise if the datetype set in the url is month then group by month
  }else{
    $member = $_GET['member'];
    $query ='select count(distinct(sr_service.sr_service_recid)) as ticketsMember,DATENAME(dw,dbo.sr_service.date_closed) as day,day(dbo.sr_service.date_closed)
  from sr_service left outer join dbo.member  on dbo.sr_service.closed_by = member.member_id
  left outer join dbo.company on dbo.sr_service.company_recid = company.company_recid left outer join time_entry on sr_service.sr_service_recid = time_entry.sr_service_recid
  where  time_entry.hours_actual > 0 and dbo.member.member_id = "'.$member.'"
  and DATEDIFF(ww, dbo.sr_service.date_closed, getdate())=0
  group by DATENAME(dw,dbo.sr_service.date_closed),day(dbo.sr_service.date_closed)
  order by day(dbo.sr_service.date_closed)
  ';

  }


}else{
  $query = 'select member.member_id,count(distinct(sr_service.sr_service_recid)) as ticketsMember
from sr_service left outer join dbo.member      on dbo.sr_service.closed_by = member.member_id
where  time_entry.hours_actual > 0  and (dbo.member.Title like "%IT Support%")
and (dbo.sr_service.date_closed >="'.$range1.'" and dbo.sr_service.date_closed <= "'.$range2.'")
group by member.member_id
order by member.member_id desc';
  }
*//////////////END SERVICE DELIVERY////////////


}elseif(strpos($path,'fieldservices') !== false){
  //If date range is selected do this stuff below
  if(isset($_GET['range1']) && isset($_GET['range2'])){

    $range1 = $_GET['range1'];
    $range2 = $_GET['range2'];
    //if a member is clicked in billable hours by member chart
    if(isset($_GET['member'])){
      //if the datetype set in the url is day then group by day
      if($_GET['datetype']=='day'){
            $member = $_GET['member'];
            $query ='select count(distinct(sr_service.sr_service_recid)) as ticketsMember,DATENAME(dw,dbo.sr_service.date_closed) as day,day(dbo.sr_service.date_closed)
          from sr_service left outer join dbo.member  on dbo.sr_service.closed_by = member.member_id
          left outer join dbo.company on dbo.sr_service.company_recid = company.company_recid left outer join time_entry on sr_service.sr_service_recid = time_entry.sr_service_recid
          where  sr_service.date_closed not null and time_entry.hours_actual > 0 and dbo.member.member_id = "'.$member.'"
          and (dbo.sr_service.date_closed >="'.$range1.'" and dbo.sr_service.date_closed <= "'.$range2.'")
          group by DATENAME(dw,dbo.sr_service.date_closed),day(dbo.sr_service.date_closed)
          order by day(dbo.sr_service.date_closed)
          ';
          //otherwise if the datetype set in the url is month then group by month
          }else{
            $member = $_GET['member'];
            $query ='select count(distinct(sr_service.sr_service_recid)) as ticketsMember,DATENAME(month,dbo.sr_service.date_closed) as day,month(dbo.sr_service.date_closed) as month,year(dbo.sr_service.date_closed) as year
          from sr_service left outer join dbo.member  on dbo.sr_service.closed_by = member.member_id
          left outer join dbo.company on dbo.sr_service.company_recid = company.company_recid left outer join time_entry on sr_service.sr_service_recid = time_entry.sr_service_recid
          where  time_entry.hours_actual > 0 and dbo.member.member_id = "'.$member.'"
          and (dbo.sr_service.date_closed >="'.$range1.'" and dbo.sr_service.date_closed <= "'.$range2.'")
          group by DATENAME(month,dbo.sr_service.date_closed),month(dbo.sr_service.date_closed),year(dbo.sr_service.date_closed)
          order by month(dbo.sr_service.date_closed)
          ';
            }
        }else{
            $query = 'select member.member_id,count(distinct(sr_service.sr_service_recid)) as ticketsMember
          from sr_service left outer join dbo.member on dbo.sr_service.closed_by = member.member_id
          where  time_entry.hours_actual > 0  and (dbo.member.Title like "%Client IT%" or member.member_id = "zhoover")
          and (dbo.sr_service.date_closed >="'.$range1.'" and dbo.sr_service.date_closed <= "'.$range2.'")
          group by member.member_id
          order by member.member_id desc';
            }
  }else  if(isset($_GET['member'])){
      //if the datetype set in the url is day then group by day
      if($_GET['datetype']=='day'){
            $member = $_GET['member'];
            $query ='select count(distinct(sr_service.sr_service_recid)) as ticketsMember,DATENAME(dw,dbo.sr_service.date_closed) as day,day(dbo.sr_service.date_closed)
          from sr_service left outer join dbo.member  on dbo.sr_service.closed_by = member.member_id
          left outer join dbo.company on dbo.sr_service.company_recid = company.company_recid left outer join time_entry on sr_service.sr_service_recid = time_entry.sr_service_recid
          where  time_entry.hours_actual > 0 and dbo.member.member_id = "'.$member.'"
          and DATEDIFF(ww, dbo.sr_service.date_closed, getdate())=0
          group by DATENAME(dw,dbo.sr_service.date_closed),day(dbo.sr_service.date_closed)
          order by day(dbo.sr_service.date_closed)
          ';
          //otherwise if the datetype set in the url is month then group by month
          }else{
            $member = $_GET['member'];
            $query ='select count(distinct(sr_service.sr_service_recid)) as ticketsMember,month(dbo.sr_service.date_closed) as month,year(dbo.sr_service.date_closed) as year
          from sr_service left outer join dbo.member  on dbo.sr_service.closed_by = member.member_id
          left outer join dbo.company on dbo.sr_service.company_recid = company.company_recid left outer join time_entry on sr_service.sr_service_recid = time_entry.sr_service_recid
          where  time_entry.hours_actual > 0 and dbo.member.member_id = "'.$member.'"
          and DATEDIFF(ww, dbo.sr_service.date_closed, getdate())=0
          group by month(dbo.sr_service.date_closed),year(dbo.sr_service.date_closed)
          order by month(dbo.sr_service.date_closed)
          ';
            }
        }

else{
  $query = '
  select member.member_id,count(distinct(sr_service.sr_service_recid)) as ticketsMember
  from sr_service left outer join dbo.member  on dbo.sr_service.closed_by = member.member_id
  where  time_entry.hours_actual > 0  and (dbo.member.Title like "%Client IT%" or member.member_id ="zhoover")
  and DATEDIFF(ww, dbo.sr_service.date_closed, getdate())=0
  group by member.member_id
  order by member.member_id desc
  ';
  }
}
elseif(strpos($path,'managedservices') !== false){
  $description = "This represents the total billable client hours completed by the Managed Services Team by member, by day, this week";

  //If date range is selected do this stuff below
  if(isset($_GET['range1']) && isset($_GET['range2'])){

    $range1 = $_GET['range1'];
    $range2 = $_GET['range2'];
    //if a member is clicked in billable hours by member chart
    if(isset($_GET['member'])){
      //if the datetype set in the url is day then group by day
      if($_GET['datetype']=='day'){
            $member = $_GET['member'];
            $query ='select count(distinct(sr_service.sr_service_recid)) as ticketsMember,DATENAME(dw,dbo.sr_service.date_closed) as day,day(dbo.sr_service.date_closed)
          from sr_service left outer join dbo.member  on dbo.sr_service.closed_by = member.member_id
          left outer join dbo.company on dbo.sr_service.company_recid = company.company_recid left outer join time_entry on sr_service.sr_service_recid = time_entry.sr_service_recid
          where  time_entry.hours_actual > 0 and dbo.member.member_id = "'.$member.'"
          and (dbo.sr_service.date_closed >="'.$range1.'" and dbo.sr_service.date_closed <= "'.$range2.'")
          group by DATENAME(dw,dbo.sr_service.date_closed),day(dbo.sr_service.date_closed)
          order by day(dbo.sr_service.date_closed)
          ';
          //otherwise if the datetype set in the url is month then group by month
          }else{
            $member = $_GET['member'];
            $query ='select count(distinct(sr_service.sr_service_recid)) as ticketsMember,DATENAME(month,dbo.sr_service.date_closed) as day,month(dbo.sr_service.date_closed) as month,year(dbo.sr_service.date_closed) as year
          from sr_service left outer join dbo.member  on dbo.sr_service.closed_by = member.member_id
          left outer join dbo.company on dbo.sr_service.company_recid = company.company_recid left outer join time_entry on sr_service.sr_service_recid = time_entry.sr_service_recid
          where  time_entry.hours_actual > 0 and dbo.member.member_id = "'.$member.'"
          and (dbo.sr_service.date_closed >="'.$range1.'" and dbo.sr_service.date_closed <= "'.$range2.'")
          group by DATENAME(month,dbo.sr_service.date_closed),month(dbo.sr_service.date_closed),year(dbo.sr_service.date_closed)
          order by month(dbo.sr_service.date_closed)
          ';
            }
        }else{
            $query = 'select member.member_id,count(distinct(sr_service.sr_service_recid)) as ticketsMember
          from sr_service left outer join dbo.member on dbo.sr_service.closed_by = member.member_id
          where  time_entry.hours_actual > 0  and (member.member_id = "wblakeburn" or member.member_id = "plane" or member.member_id = "jmorgan" or member.member_id = "bfizer" or member.member_id = "rmillen")
          and (dbo.sr_service.date_closed >="'.$range1.'" and dbo.sr_service.date_closed <= "'.$range2.'")
          group by member.member_id
          order by member.member_id desc';
            }
  }else  if(isset($_GET['member'])){
      //if the datetype set in the url is day then group by day
      if($_GET['datetype']=='day'){
            $member = $_GET['member'];
            $query ='select count(distinct(sr_service.sr_service_recid)) as ticketsMember,DATENAME(dw,dbo.sr_service.date_closed) as day,day(dbo.sr_service.date_closed)
          from sr_service left outer join dbo.member  on dbo.sr_service.closed_by = member.member_id
          left outer join dbo.company on dbo.sr_service.company_recid = company.company_recid left outer join time_entry on sr_service.sr_service_recid = time_entry.sr_service_recid
          where  time_entry.hours_actual > 0 and dbo.member.member_id = "'.$member.'"
          and DATEDIFF(ww, dbo.sr_service.date_closed, getdate())=0
          group by DATENAME(dw,dbo.sr_service.date_closed),day(dbo.sr_service.date_closed)
          order by day(dbo.sr_service.date_closed)
          ';
          //otherwise if the datetype set in the url is month then group by month
          }else{
            $member = $_GET['member'];
            $query ='select count(distinct(sr_service.sr_service_recid)) as ticketsMember,month(dbo.sr_service.date_closed) as month,year(dbo.sr_service.date_closed) as year
          from sr_service left outer join dbo.member  on dbo.sr_service.closed_by = member.member_id
          left outer join dbo.company on dbo.sr_service.company_recid = company.company_recid left outer join time_entry on sr_service.sr_service_recid = time_entry.sr_service_recid
          where  time_entry.hours_actual > 0 and dbo.member.member_id = "'.$member.'"
          and DATEDIFF(ww, dbo.sr_service.date_closed, getdate())=0
          group by month(dbo.sr_service.date_closed),year(dbo.sr_service.date_closed)
          order by month(dbo.sr_service.date_closed)
          ';
            }
        }

  else{
  $query = '
  select member.member_id,count(distinct(sr_service.sr_service_recid)) as ticketsMember
  from sr_service left outer join dbo.member      on dbo.sr_service.closed_by = member.member_id
  where  time_entry.hours_actual > 0  and (member.member_id = "wblakeburn" or member.member_id = "plane" or member.member_id = "jmorgan" or member.member_id = "bfizer" or member.member_id = "rmillen")
  and DATEDIFF(ww, dbo.sr_service.date_closed, getdate())=0
  group by member.member_id
  order by member.member_id desc
  ';
  }

//(member.member_id = "wblakeburn" or member.member_id = "plane" or member.member_id = "jmorgan" or member.member_id = "bfizer" or member.member_id = "rmillen")

}elseif(strpos($path,'results') !== false){


  //If date range is selected do this stuff below
  if(isset($_GET['range1']) && isset($_GET['range2'])){

    $range1 = $_GET['range1'];
    $range2 = $_GET['range2'];
    //if a member is clicked in billable hours by member chart
    if(isset($_GET['member'])){
      //if the datetype set in the url is day then group by day
      if($_GET['datetype']=='day'){
            $member = $_GET['member'];
            $query ='select count(distinct(sr_service.sr_service_recid)) as ticketsMember,DATENAME(dw,dbo.sr_service.date_closed) as day,day(dbo.sr_service.date_closed)
          from sr_service left outer join dbo.member  on dbo.sr_service.closed_by = member.member_id
          left outer join dbo.company on dbo.sr_service.company_recid = company.company_recid left outer join time_entry on sr_service.sr_service_recid = time_entry.sr_service_recid
          where  time_entry.hours_actual > 0 and company_name = "Results Physiotherapy" and dbo.member.member_id = "'.$member.'"
          and (dbo.sr_service.date_closed >="'.$range1.'" and dbo.sr_service.date_closed <= "'.$range2.'")
          group by DATENAME(dw,dbo.sr_service.date_closed),day(dbo.sr_service.date_closed)
          order by day(dbo.sr_service.date_closed)
          ';
          //otherwise if the datetype set in the url is month then group by month
          }else{
            $member = $_GET['member'];
            $query ='select count(distinct(sr_service.sr_service_recid)) as ticketsMember,DATENAME(month,dbo.sr_service.date_closed) as day,month(dbo.sr_service.date_closed) as month,year(dbo.sr_service.date_closed) as year
          from sr_service left outer join dbo.member  on dbo.sr_service.closed_by = member.member_id
          left outer join dbo.company on dbo.sr_service.company_recid = company.company_recid left outer join time_entry on sr_service.sr_service_recid = time_entry.sr_service_recid
          where  time_entry.hours_actual > 0 and company_name = "Results Physiotherapy" and dbo.member.member_id = "'.$member.'"
          and (dbo.sr_service.date_closed >="'.$range1.'" and dbo.sr_service.date_closed <= "'.$range2.'")
          group by DATENAME(month,dbo.sr_service.date_closed),month(dbo.sr_service.date_closed),year(dbo.sr_service.date_closed)
          order by month(dbo.sr_service.date_closed)
          ';
            }
        }else{
            $query = 'select member.member_id,count(distinct(sr_service.sr_service_recid)) as ticketsMember
          from sr_service left outer join dbo.member on dbo.sr_service.closed_by = member.member_id
          left outer join dbo.company on dbo.sr_service.company_recid = company.company_recid left outer join time_entry on sr_service.sr_service_recid = time_entry.sr_service_recid
          where  time_entry.hours_actual > 0 and company_name = "Results Physiotherapy"
          and (dbo.sr_service.date_closed >="'.$range1.'" and dbo.sr_service.date_closed <= "'.$range2.'")
          group by member.member_id
          order by member.member_id desc';
            }
  }else  if(isset($_GET['member'])){
      //if the datetype set in the url is day then group by day
      if($_GET['datetype']=='day'){
            $member = $_GET['member'];
            $query ='select count(distinct(sr_service.sr_service_recid)) as ticketsMember,DATENAME(dw,dbo.sr_service.date_closed) as day,day(dbo.sr_service.date_closed)
          from sr_service left outer join dbo.member  on dbo.sr_service.closed_by = member.member_id
          left outer join dbo.company on dbo.sr_service.company_recid = company.company_recid left outer join time_entry on sr_service.sr_service_recid = time_entry.sr_service_recid
          where  time_entry.hours_actual > 0 and company_name = "Results Physiotherapy" and dbo.member.member_id = "'.$member.'"
          and DATEDIFF(ww, dbo.sr_service.date_closed, getdate())=0
          group by DATENAME(dw,dbo.sr_service.date_closed),day(dbo.sr_service.date_closed)
          order by day(dbo.sr_service.date_closed)
          ';
          //otherwise if the datetype set in the url is month then group by month
          }else{
            $member = $_GET['member'];
            $query ='select count(distinct(sr_service.sr_service_recid)) as ticketsMember,month(dbo.sr_service.date_closed) as month,year(dbo.sr_service.date_closed) as year
          from sr_service left outer join dbo.member  on dbo.sr_service.closed_by = member.member_id
          left outer join dbo.company on dbo.sr_service.company_recid = company.company_recid left outer join time_entry on sr_service.sr_service_recid = time_entry.sr_service_recid
          where  time_entry.hours_actual > 0 and company_name = "Results Physiotherapy" and dbo.member.member_id = "'.$member.'"
          and DATEDIFF(ww, dbo.sr_service.date_closed, getdate())=0
          group by month(dbo.sr_service.date_closed),year(dbo.sr_service.date_closed)
          order by month(dbo.sr_service.date_closed)
          ';
            }
        }

  else{
  $query = '
  select member.member_id,count(distinct(sr_service.sr_service_recid)) as ticketsMember
  from sr_service left outer join dbo.member      on dbo.sr_service.closed_by = member.member_id
  left outer join dbo.company on dbo.sr_service.company_recid = company.company_recid left outer join time_entry on sr_service.sr_service_recid = time_entry.sr_service_recid
  where  time_entry.hours_actual > 0  and company_name = "Results Physiotherapy"
  and DATEDIFF(ww, dbo.sr_service.date_closed, getdate())=0
  group by member.member_id
  order by member.member_id desc
  ';
  }



}
else{

  if(isset($_GET['member'])){
    $member = $_GET['member'];
    $query ='select count(distinct(sr_service.sr_service_recid)) as ticketsMember,DATENAME(dw,dbo.sr_service.date_closed) as day,day(dbo.sr_service.date_closed)
  from sr_service left outer join dbo.member  on dbo.sr_service.closed_by = member.member_id
  where  time_entry.hours_actual > 0 and dbo.member.member_id = "'.$member.'"
  and DATEDIFF(ww, dbo.sr_service.date_closed, getdate())=0
  group by DATENAME(dw,dbo.sr_service.date_closed),day(dbo.sr_service.date_closed)
  order by day(dbo.sr_service.date_closed)
  ';

  }else{

    $query ='select member.member_id,count(distinct(sr_service.sr_service_recid)) as ticketsMember
  from sr_service left outer join dbo.member  on dbo.sr_service.closed_by = member.member_id
  where  time_entry.hours_actual > 0  and (dbo.member.Title like "%IT Support%" or dbo.member.Title like "%Client IT%" or dbo.member.member_id="zhoover")
  and DATEDIFF(ww, dbo.sr_service.date_closed, getdate())=0
  group by member.member_id
  order by member.member_id desc';

  }



}

$projectHours = mssql_query($query);
$query1 = str_replace('"',"",$query);

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
