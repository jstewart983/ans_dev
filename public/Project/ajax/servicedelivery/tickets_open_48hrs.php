<?php

error_reporting(-1);
ini_set('display_errors', 'On');

require('../../config/config.php');

function clean($string) {
   $string = str_replace(" ", "-", $string); // Replaces all spaces with hyphens.

      $string = str_replace(",", "-", $string); // Replaces all spaces with hyphens.

   $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.

   $string = str_replace(":","-",$string);

   $string = str_replace("!","-",$string);

   $string = strip_tags($string);


   return $string;
}


	$query = 'select distinct sr_service.sr_service_recid,MAX(convert(varchar(10),time_entry.date_start,10)) as lastTimeEntry,SR_Type.Description as type,company.company_name,sr_service.email_address,sr_service_calculated.nextscheduledate,sr_service_calculated.resourcelist, case sr_service.date_closed when null then DATEDIFF(DAY, sr_service.date_entered, getdate()) else DATEDIFF(DAY, sr_service.date_entered, sr_service.date_closed) end as daysOpen,sr_status.description as status, sr_service.date_entered,sr_urgency.description as urgency,sr_service.summary
  from sr_service
	left outer join sr_type on sr_type.sr_type_recid = sr_service.sr_type_recid
	left outer join sr_urgency on sr_urgency.sr_urgency_recid = sr_service.sr_urgency_recid
	left outer join sr_board on sr_board.sr_board_recid = sr_service.sr_board_recid
	left outer join sr_status on sr_status.sr_status_recid  = sr_service.sr_status_recid
  left outer join sr_service_calculated on sr_service.sr_service_recid = sr_service_calculated.sr_service_recid
  left outer join company on sr_service.company_recid = company.company_recid
  left outer join time_entry on sr_service.sr_service_recid = time_entry.sr_service_recid
  left outer join sr_task on sr_service.sr_service_recid = sr_task.sr_service_recid
  where sr_service.sr_service_recid <> sr_task.child_recid and sr_status.description <> "Duplicate Ticket" and company.company_name <> "Advanced Network Solutions" and sr_type.description <> "Scheduled Maintenance" and DATEDIFF(DAY, sr_service.date_entered, getdate()) > 2 and (sr_status.description <> "Closed" and sr_status.description <> "cancelled" and sr_status.description <> "Closed - First Call") and sr_service.date_closed is null
  group by sr_service.sr_service_recid,SR_Type.Description,company.company_name,sr_service.email_address,sr_service_calculated.nextscheduledate,sr_service_calculated.resourcelist, case sr_service.date_closed when null then DATEDIFF(DAY, sr_service.date_entered, getdate()) else DATEDIFF(DAY, sr_service.date_entered, sr_service.date_closed) end,sr_status.description, sr_service.date_entered,sr_urgency.description,sr_service.summary';

$openTickets = mssql_query($query);
$count = mssql_num_rows($openTickets);

$to = 'gsummey@ansolutions.com,kmcwhirk@ansolutions.com,jprouse@ansolutions.com,jclauer@ansolutions.com,bcrawford@ansolutions.com,plane@ansolutions.com';
//$to = 'jstewart@ansolutions.com';
$subject = $count.' Tickets Open > 48 Hrs - '.date("m/d/y");
//$headers= "From: jstewart@ansolutions.com\r\n";
//$headers.="Reply-To: jstewart@ansolutions.com\r\n";
$headers="CC: jstewart@ansolutions.com,jboyer@ansolutions.com\r\n";
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
$message.='<th>Client</th>';
$message.='<th>Priority</th>';
$message.= '<th>Status</th>';
$message.= '<th>Assigned Resource(s)</th>';
$message.= '<th>Last Engineer Activity</th>';
$message.= '<th>Summary</th>';
$message.= '<th>Days Open</th>';
$message.= '</thead>';
$message.= '<tbody>';
while($row = mssql_fetch_array($openTickets)) {

if($row['nextscheduledate'] !== null){
	$dates = explode(" ",$row['nextscheduledate']);
	$output = $dates[0] ." ".$dates[2];
}else{
	$output = "";
}

  $message.= '<tr>';
  $message.=  '<td>'.htmlentities($row['sr_service_recid']).'</td>';
   $message.='<td>'.htmlentities($row['company_name']).'</td>';
   $message.='<td>'.htmlentities($row['urgency']).'</td>';
  	 $message.=  '<td>'.htmlentities($row['status']).'</td>';
  	 $message.=  '<td>'.htmlentities($row['resourcelist']).'</td>';
      $message.=  '<td>'.htmlentities($row['lastTimeEntry']).'</td>';
  	 $message.=  '<td>'.htmlentities($row['summary']).'</td>';
  	$message.=  '<td>'.htmlentities($row['daysOpen']).'</td>';
  	$message.=  '</tr>';

}
$message.= '</tbody>';
$message.=  '</table>';
$message.= '</body></html>';

if(mail($to,$subject,$message,$headers)){
	echo "success!";
}else{
	echo "fail";
}

?>
