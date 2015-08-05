<?php

error_reporting(-1);
ini_set('display_errors', 'On');
require('../../config/config.php');




	$query = 'select sr_service.site_name, SR_Type.Description as type, sr_service.email_address,sr_service_calculated.nextscheduledate,sr_service_calculated.resourcelist, case sr_service.date_closed when null then DATEDIFF(DAY, sr_service.date_entered, getdate()) else DATEDIFF(DAY, sr_service.date_entered, sr_service.date_closed) end as daysOpen,sr_service.sr_service_recid,sr_status.description as status, sr_service.date_entered,sr_urgency.description as urgency,sr_service.summary
  from sr_service
	left outer join sr_type on sr_type.sr_type_recid = sr_service.sr_type_recid
	left outer join sr_urgency on sr_urgency.sr_urgency_recid = sr_service.sr_urgency_recid
	left outer join sr_board on sr_board.sr_board_recid = sr_service.sr_board_recid
	left outer join sr_status on sr_status.sr_status_recid  = sr_service.sr_status_recid
  left outer join sr_service_calculated on sr_service.sr_service_recid = sr_service_calculated.sr_service_recid
  left outer join company on sr_service.company_recid = company.company_recid
  where sr_service.summary like "%!Problematic%" and (sr_status.description <> "Closed" and sr_status.description <> "cancelled" and sr_status.description <> "Closed - First Call") and sr_service.date_closed is null
  order by sr_service.date_entered desc';



$openTickets = mssql_query($query);

$to = 'jstewart@ansolutions.com';
$subject = 'RPT Chronic Site Tickets - '.date("m/d/y");

$headers= "From: jstewart@ansolutions.com\r\n";
$headers.="Reply-To: jstewart@ansolutions.com\r\n";
//$headers.="CC: nkimes@ansolutions.com\r\n";
$headers.="MIME-Version: 1.0\r\n";
$headers.="Content-Type: text/html; charset=ISO-8859-1\r\n";

$message='<html><head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width"/>



    <style type="text/css">

		/**********************************************
		* Ink v1.0.5 - Copyright 2013 ZURB Inc        *
		**********************************************/
		table{
			border-collapse:collapse;
		}
		table,th,td{
			border:1px solid #282828;
		}

		tr{
			backgroud-color:#c2c2c2;
		}
		tr:nth-child(even){
			backgroud-color:#fff;
		}



    </style>
    <style type="text/css">

      /* Your custom styles go here */

    </style>
  </head><body>';
$message.= '<table rules="all" style="border-color:#282828; width:100%;" cellpadding="10" class="table table-hover">';
$message.= '<thead>';
$message.= '<th>Ticket #</th>';
$message.= '<th>Site</th>';
$message.='<th>Priority</th>';
$message.= '<th>Status</th>';
$message.= '<th>Engineer(s)</th>';
$message.= '<th>Summary</th>';
$message.= '<th>Days Open</th>';
$message.= '</thead>';

$message.= '<tbody>';



echo "<div style='width:100%;padding:0px;'class=' panel panel-default'>";
echo "<div style='width:100%;'class=panel-body>";
echo "<table style='width:100%;' class='table table-hover'>";
echo "<thead>";
echo "<th>Ticket #</th>";
echo "<th>Type</th>";
echo "<th>Site</th>";
echo "<th>Contact</th>";
echo "<th>Status</th>";
echo "<th>Engineer(s)</th>";
echo "<th>Summary</th>";
echo "<th>Scheduled</th>";
echo "<th>Days Open</th>";
echo "</thead>";

echo "<tbody>";
// fetch all rows from the query
//$all_rows = array();

while($row = mssql_fetch_array($openTickets)) {


if($row['nextscheduledate'] !== null){
	$dates = explode(" ",$row['nextscheduledate']);
	$output = $dates[0] ." ".$dates[2];
}else{
	$output = "";
}
$message.= '<tr>';
$message.=  '<td>'.$row['sr_service_recid'].'</td>';
$message.=  '<td>'.$row['site_name'].'</td>';
 $message.='<td>'.$row['urgency'].'</td>';
	 $message.=  '<td>'.$row['status'].'</td>';
	 $message.=  '<td>'.$row['resourcelist'].'</td>';
	 $message.=  '<td>'.$row['summary'].'</td>';
	$message.=  '<td>'.$row['daysOpen'].'</td>';
	$message.=  '</tr>';


	echo "<tr>";
    echo "<td>".$row['sr_service_recid']."</td>";
    echo "<td>".$row['type']."</td>";
    echo "<td>".$row['site_name']."</td>";
     echo "<td>".strtok($row['email_address'], '@')."</td>";
     echo "<td>".$row['status']."</td>";
     echo "<td>".$row['resourcelist']."</td>";
     echo "<td>".$row['summary']."</td>";
		 echo "<td>".$output."</td>";
     echo "<td>".$row['daysOpen']."</td>";
    echo "</tr>";


}

$message.= '</tbody>';
$message.=  '</table>';
$message.= '</body></html>';
echo '</tbody>';
echo '</table>';
//header("Content-Type: application/json");

echo "</div>";

if(mail($to,$subject,$message,$headers)){
	echo "success!";
}else{
	echo "fail";
}

?>
