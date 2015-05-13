<?php
error_reporting(-1);
ini_set('display_errors', 'On');
require('../../config/config.php');
$title = "Hours by Service Type (top 10) - This Week";
//$description ="This chart represents the top 10 service types by hours spent on them this week, by a member of the service desk or field services team (depending on the filter selected above)";
$datasource ="Connectwise";
//$actual_link = $_SERVER['HTTP_REFERER'];
//$path = parse_url($actual_link,PHP_URL_PATH);
//$path = strstr($path,"/service_delivery");
//echo $path;

  $description ="This chart represents the top 10 service types by hours spent on them this week, by a member of the managed services team";

if(isset($_GET['range1']) && isset($_GET['range2']) && isset($_GET['company']) && isset($_GET['member'])){

    $range1 = $_GET['range1'];
    $range2 = $_GET['range2'];
    $company = $_GET['company'];
    $type = $_GET['member'];
    $title = "Hours by Service Type (top 10) - ".$range1. " - ".$range2;

    $backupQuery = 'SELECT sum(time_entry.hours_actual) as backupHours
                    FROM Time_Entry
                    left outer join company on time_entry.company_recid = company.company_recid
                    left outer join sr_service on time_Entry.sr_service_recid = sr_service.sr_service_recid
                    left outer join member on time_entry.member_recid = member.member_recid
                    WHERE
                    member.member_id = "'.$type.'"
                    and sr_service.summary NOT LIKE "%AV%" and sr_service.summary NOT LIKE "%ESET%" and sr_service.summary NOT LIKE "%BU%" and sr_service.summary NOT LIKE "%\[Warning]%" and sr_service.summary NOT LIKE "%Syncback%" and sr_service.summary NOT LIKE "%Accelerite%" and sr_service.summary NOT LIKE "%ImageManager%"
                    and (dbo.Time_Entry.Date_Start >="'.$range1.'" and dbo.Time_Entry.Date_Start <= "'.$range2.'")

    ';

    $avQuery = 'SELECT sum(time_entry.hours_actual) as avHours
    FROM cwwebapp_ans.dbo.Company Company, cwwebapp_ans.dbo.SR_Board SR_Board,dbo.member, cwwebapp_ans.dbo.SR_Service SR_Service, cwwebapp_ans.dbo.SR_Type SR_Type,cwwebapp_ans.dbo.Time_Entry
    WHERE Company.Company_RecID = Time_Entry.Company_RecID AND
    SR_Service.SR_Service_RecID = Time_Entry.SR_Service_RecID AND
    Company.Company_RecID = SR_Service.Company_RecID AND
    SR_Type.SR_Type_RecID = SR_Service.SR_Type_RecID AND
    member.member_recid = time_entry.member_recid AND
    SR_Board.SR_Board_RecID = SR_Service.SR_Board_RecID AND
    SR_Board.SR_Board_RecID = SR_Type.SR_Board_RecID
    and member.member_id = "'.$type.'" and company.company_name = "'.$company.'"
    and (sr_service.summary like "%AV%" or sr_service.summary like "%ESET%") and

    (dbo.Time_Entry.Date_Start >="'.$range1.'" and dbo.Time_Entry.Date_Start <= "'.$range2.'")

    ';

    $bobQuery = 'SELECT sum(time_entry.hours_actual) as bobHours
    FROM cwwebapp_ans.dbo.Company Company, cwwebapp_ans.dbo.SR_Board SR_Board,dbo.member, cwwebapp_ans.dbo.SR_Service SR_Service, cwwebapp_ans.dbo.SR_Type SR_Type,cwwebapp_ans.dbo.Time_Entry
    WHERE Company.Company_RecID = Time_Entry.Company_RecID AND
    SR_Service.SR_Service_RecID = Time_Entry.SR_Service_RecID AND
    Company.Company_RecID = SR_Service.Company_RecID AND
    SR_Type.SR_Type_RecID = SR_Service.SR_Type_RecID AND
    member.member_recid = time_entry.member_recid AND
    SR_Board.SR_Board_RecID = SR_Service.SR_Board_RecID AND
    SR_Board.SR_Board_RecID = SR_Type.SR_Board_RecID
    and member.member_id = "'.$type.'" and company.company_name = "'.$company.'"
    and sr_service.summary NOT LIKE "%AV%" and sr_service.summary NOT LIKE "%ESET%" and sr_service.summary NOT LIKE "%BU%" and sr_service.summary NOT LIKE "%\[Warning]%" and sr_service.summary NOT LIKE "%Syncback%" and sr_service.summary NOT LIKE "%Accelerite%" and sr_service.summary NOT LIKE "%ImageManager%"
    and (dbo.Time_Entry.Date_Start >="'.$range1.'" and dbo.Time_Entry.Date_Start <= "'.$range2.'")
    ';

    $adminQuery = 'SELECT sum(time_entry.hours_actual) as adminHours
    FROM time_entry
    left outer join member on time_entry.member_recid = member.member_recid
    left outer join te_charge_code on time_entry.te_charge_code_recid = te_charge_code.te_charge_code_recid
    WHERE te_charge_code.description = "Admin" and member.member_id = "'.$type.'"
    and (dbo.Time_Entry.Date_Start >="'.$range1.'" and dbo.Time_Entry.Date_Start <= "'.$range2.'")';

    $meetingQuery = 'SELECT sum(time_entry.hours_actual) as meetingHours
    FROM time_entry
    left outer join member on time_entry.member_recid = member.member_recid
    left outer join te_charge_code on time_entry.te_charge_code_recid = te_charge_code.te_charge_code_recid
    WHERE te_charge_code.description = "Meeting" and member.member_id = "'.$type.'"
    and (dbo.Time_Entry.Date_Start >="'.$range1.'" and dbo.Time_Entry.Date_Start <= "'.$range2.'") ';


}else if(isset($_GET['range1']) && isset($_GET['range2']) && isset($_GET['member'])){

    $range1 = $_GET['range1'];
    $range2 = $_GET['range2'];
    $type = $_GET['member'];
    $title = "Hours by Service Type (top 10) - ".$range1. " - ".$range2;

    $backupQuery = 'SELECT sum(time_entry.hours_actual) as backupHours
                  FROM cwwebapp_ans.dbo.Company Company, cwwebapp_ans.dbo.SR_Board SR_Board,dbo.member, cwwebapp_ans.dbo.SR_Service SR_Service, cwwebapp_ans.dbo.SR_Type SR_Type,cwwebapp_ans.dbo.Time_Entry
                  WHERE Company.Company_RecID = Time_Entry.Company_RecID AND
                  SR_Service.SR_Service_RecID = Time_Entry.SR_Service_RecID AND
                  Company.Company_RecID = SR_Service.Company_RecID AND
                  SR_Type.SR_Type_RecID = SR_Service.SR_Type_RecID AND
                  member.member_recid = time_entry.member_recid AND
                  SR_Board.SR_Board_RecID = SR_Service.SR_Board_RecID AND
                  SR_Board.SR_Board_RecID = SR_Type.SR_Board_RecID and
                  sr_board.board_name <> "Managed Services - Requests"
                  and member.member_id = "'.$type.'"
                  and (sr_service.summary like "%ImageManager%" or sr_service.summary like "%BU - %" or sr_service.summary like "%Accelerite%" or sr_service.summary like "%Syncback%" or sr_service.summary like "%\[Warning]%")
                  and (dbo.Time_Entry.Date_Start >="'.$range1.'" and dbo.Time_Entry.Date_Start <= "'.$range2.'")


                  ';

    $avQuery = 'SELECT sum(time_entry.hours_actual) as avHours
                FROM Time_Entry
                left outer join company on time_entry.company_recid = company.company_recid
                left outer join sr_service on time_Entry.sr_service_recid = sr_service.sr_service_recid
                left outer join member on time_entry.member_recid = member.member_recid
                left outer join sr_board on sr_service.sr_board_recid = sr_board.sr_board_recid
                WHERE
                sr_board.board_name <> "Managed Services - Requests" and
                member.member_id = "'.$type.'"
                and (sr_service.summary LIKE "%ESET - %" or sr_service.summary LIKE "%AV - %")
                and (dbo.Time_Entry.Date_Start >="'.$range1.'" and dbo.Time_Entry.Date_Start <= "'.$range2.'")


    ';

    $bobQuery = 'SELECT sum(time_entry.hours_actual) as bobHours
                    FROM Time_Entry
                    left outer join company on time_entry.company_recid = company.company_recid
                    left outer join sr_service on time_Entry.sr_service_recid = sr_service.sr_service_recid
                    left outer join member on time_entry.member_recid = member.member_recid
                    left outer join te_charge_code on time_entry.te_charge_code_recid = te_charge_code.te_charge_code_recid
                    left outer join sr_board on sr_service.sr_board_recid = sr_board.sr_board_recid
                    WHERE
                    sr_board.board_name <> "Managed Services - Requests" and (sr_board.board_name = "BackOffice" or sr_board.board_name = "LogicMonitor" or sr_board.board_name = "My Company/Service" or sr_board.board_name = "Results Physiotherapy") and

                    member.member_id = "'.$type.'"
                    and sr_service.summary NOT LIKE "%AV - %" and sr_service.summary NOT LIKE "%ESET - %" and sr_service.summary NOT LIKE "%BU - %" and sr_service.summary NOT LIKE "%\[Warning]%" and sr_service.summary NOT LIKE "%Syncback%" and sr_service.summary NOT LIKE "%Accelerite%" and sr_service.summary NOT LIKE "%ImageManager%"
                    and (dbo.Time_Entry.Date_Start >="'.$range1.'" and dbo.Time_Entry.Date_Start <= "'.$range2.'")

    ';


    $adminQuery = 'SELECT sum(time_entry.hours_actual) as adminHours
                  FROM time_entry
                  left outer join member on time_entry.member_recid = member.member_recid
                  left outer join te_charge_code on time_entry.te_charge_code_recid = te_charge_code.te_charge_code_recid
                  WHERE te_charge_code.description = "Admin" and member.member_id = "'.$type.'"
                  and (dbo.Time_Entry.Date_Start >="'.$range1.'" and dbo.Time_Entry.Date_Start <= "'.$range2.'")';

    $meetingQuery = 'SELECT sum(time_entry.hours_actual) as meetingHours
                    FROM time_entry
                    left outer join member on time_entry.member_recid = member.member_recid
                    left outer join te_charge_code on time_entry.te_charge_code_recid = te_charge_code.te_charge_code_recid
                    WHERE te_charge_code.description = "Meeting" and member.member_id = "'.$type.'"
                    and (dbo.Time_Entry.Date_Start >="'.$range1.'" and dbo.Time_Entry.Date_Start <= "'.$range2.'")';

    $ptoQuery = 'SELECT sum(time_entry.hours_actual) as ptoHours
                FROM time_entry
                left outer join member on time_entry.member_recid = member.member_recid
                left outer join te_charge_code on time_entry.te_charge_code_recid = te_charge_code.te_charge_code_recid
                WHERE te_charge_code.description = "PTO" and member.member_id = "'.$type.'"
                and (dbo.Time_Entry.Date_Start >="'.$range1.'" and dbo.Time_Entry.Date_Start <= "'.$range2.'")';

    $otherChargeQuery = 'SELECT sum(time_entry.hours_actual) as otherChargeHours
                        FROM time_entry
                        left outer join company on time_entry.company_recid = company.company_recid
                        left outer join member on time_entry.member_recid = member.member_recid
                        left outer join te_charge_code on time_entry.te_charge_code_recid = te_charge_code.te_charge_code_recid
                        left outer join sr_service on time_entry.sr_service_recid = sr_service.sr_service_recid
                        left outer join sr_board on sr_service.sr_board_recid = sr_board.sr_board_recid
                        WHERE te_charge_code.description <> "PTO" and te_charge_code.description <> "Admin"and te_charge_code.description <> "Meeting" and member.member_id = "'.$type.'"
                        and (dbo.Time_Entry.Date_Start >="'.$range1.'" and dbo.Time_Entry.Date_Start <= "'.$range2.'")';

    $otherQuery = 'SELECT sum(time_entry.hours_actual) as internalHours
                  FROM time_entry
                  left outer join member on time_entry.member_recid = member.member_recid
                  left outer join sr_service on time_entry.sr_service_recid = sr_service.sr_service_recid
                  left outer join te_charge_code on time_entry.te_charge_code_recid = te_charge_code.te_charge_code_recid
                  left outer join company on time_entry.company_recid = company.company_recid
                  left outer join sr_board on sr_service.sr_board_recid = sr_board.sr_board_recid
                  WHERE  company_name = "Advanced Network Solutions" and member.member_id = "'.$type.'" and (dbo.Time_Entry.Date_Start >="'.$range1.'" and dbo.Time_Entry.Date_Start <= "'.$range2.'")';

    $projectQuery = 'SELECT SUM(CASE WHEN dbo.time_entry.PM_Project_RecID IS NOT NULL THEN dbo.time_entry.Hours_Actual ELSE 0 END) AS projectHours
                      FROM dbo.Time_Entry LEFT OUTER JOIN
                          dbo.TE_Charge_Code ON dbo.Time_Entry.TE_Charge_Code_RecID = dbo.TE_Charge_Code.TE_Charge_Code_RecID LEFT OUTER JOIN
                          dbo.Member ON dbo.Time_Entry.Member_RecID = dbo.Member.Member_RecID
                      WHERE member.member_id = "'.$type.'" and (dbo.Time_Entry.Date_Start >="'.$range1.'" and dbo.Time_Entry.Date_Start <= "'.$range2.'")';

    $requestQuery = 'SELECT sum(time_entry.hours_actual) as requestHours
                    FROM Time_Entry
                    left outer join company on time_entry.company_recid = company.company_recid
                    left outer join sr_service on time_Entry.sr_service_recid = sr_service.sr_service_recid
                    left outer join member on time_entry.member_recid = member.member_recid
                    left outer join te_charge_code on time_entry.te_charge_code_recid = te_charge_code.te_charge_code_recid
                    left outer join sr_board on sr_service.sr_board_recid = sr_board.sr_board_recid
                    WHERE
                    member.member_id = "'.$type.'" and sr_board.board_name = "Managed Services - Requests"
                    and (dbo.Time_Entry.Date_Start >="'.$range1.'" and dbo.Time_Entry.Date_Start <= "'.$range2.'")';

}else if(isset($_GET['range1']) && isset($_GET['range2']) && isset($_GET['company'])){

    $company = $_GET['company'];
    $range1 = $_GET['range1'];
    $range2 = $_GET['range2'];
    $title = "Hours by Service Type (top 10) - ".$range1. " - ".$range2;

    $backupQuery = 'SELECT sum(time_entry.hours_actual) as backupHours
    FROM cwwebapp_ans.dbo.Company Company, cwwebapp_ans.dbo.SR_Board SR_Board,dbo.member, cwwebapp_ans.dbo.SR_Service SR_Service, cwwebapp_ans.dbo.SR_Type SR_Type,cwwebapp_ans.dbo.Time_Entry
    WHERE Company.Company_RecID = Time_Entry.Company_RecID AND
    SR_Service.SR_Service_RecID = Time_Entry.SR_Service_RecID AND
    Company.Company_RecID = SR_Service.Company_RecID AND
    member.member_recid = time_entry.member_recid AND
    SR_Type.SR_Type_RecID = SR_Service.SR_Type_RecID AND
    SR_Board.SR_Board_RecID = SR_Service.SR_Board_RecID AND
    SR_Board.SR_Board_RecID = SR_Type.SR_Board_RecID
    and company.company_name = "'.$company.'"
    and (sr_service.summary like "%ImageManager%" or sr_service.summary like "%BU%" or sr_service.summary like "%Accelerite%" or sr_service.summary like "%Syncback%" or sr_service.summary like "%\[Warning]%")
    and (dbo.Time_Entry.Date_Start >="'.$range1.'" and dbo.Time_Entry.Date_Start <= "'.$range2.'")
     and (member.member_id = "wblakeburn" or member.member_id = "plane" or member.member_id = "jmorgan" or member.member_id = "bfizer" or member.member_id = "rmillen")

    ';

    $avQuery = 'SELECT sum(time_entry.hours_actual) as avHours
    FROM cwwebapp_ans.dbo.Company Company, cwwebapp_ans.dbo.SR_Board SR_Board,dbo.member, cwwebapp_ans.dbo.SR_Service SR_Service, cwwebapp_ans.dbo.SR_Type SR_Type,cwwebapp_ans.dbo.Time_Entry
    WHERE Company.Company_RecID = Time_Entry.Company_RecID AND
    SR_Service.SR_Service_RecID = Time_Entry.SR_Service_RecID AND
    Company.Company_RecID = SR_Service.Company_RecID AND
    member.member_recid = time_entry.member_recid AND
    SR_Type.SR_Type_RecID = SR_Service.SR_Type_RecID AND
    SR_Board.SR_Board_RecID = SR_Service.SR_Board_RecID AND
    SR_Board.SR_Board_RecID = SR_Type.SR_Board_RecID
    and company.company_name = "'.$company.'"
    and (sr_service.summary like "%AV%" or sr_service.summary like "%ESET%") and

    (dbo.Time_Entry.Date_Start >="'.$range1.'" and dbo.Time_Entry.Date_Start <= "'.$range2.'") and
     (member.member_id = "wblakeburn" or member.member_id = "plane" or member.member_id = "jmorgan" or member.member_id = "bfizer" or member.member_id = "rmillen")

    ';

    $bobQuery = 'SELECT sum(time_entry.hours_actual) as bobHours
    FROM cwwebapp_ans.dbo.Company Company, cwwebapp_ans.dbo.SR_Board SR_Board,dbo.member, cwwebapp_ans.dbo.SR_Service SR_Service, cwwebapp_ans.dbo.SR_Type SR_Type,cwwebapp_ans.dbo.Time_Entry
    WHERE Company.Company_RecID = Time_Entry.Company_RecID AND
    SR_Service.SR_Service_RecID = Time_Entry.SR_Service_RecID AND
    Company.Company_RecID = SR_Service.Company_RecID AND
    member.member_recid = time_entry.member_recid AND
    SR_Type.SR_Type_RecID = SR_Service.SR_Type_RecID AND
    SR_Board.SR_Board_RecID = SR_Service.SR_Board_RecID AND
    SR_Board.SR_Board_RecID = SR_Type.SR_Board_RecID
    and company.company_name = "'.$company.'"
    and sr_service.summary NOT LIKE "%AV%" and sr_service.summary NOT LIKE "%ESET%" and sr_service.summary NOT LIKE "%BU%" and sr_service.summary NOT LIKE "%\[Warning]%" and sr_service.summary NOT LIKE "%Syncback%" and sr_service.summary NOT LIKE "%Accelerite%" and sr_service.summary NOT LIKE "%ImageManager%"
    and (dbo.Time_Entry.Date_Start >="'.$range1.'" and dbo.Time_Entry.Date_Start <= "'.$range2.'") and
     (member.member_id = "wblakeburn" or member.member_id = "plane" or member.member_id = "jmorgan" or member.member_id = "bfizer" or member.member_id = "rmillen")
    ';

    $adminQuery = 'SELECT sum(time_entry.hours_actual) as adminHours
    FROM time_entry
    left outer join member on time_entry.member_recid = member.member_recid
    left outer join te_charge_code on time_entry.te_charge_code_recid = te_charge_code.te_charge_code_recid
    WHERE te_charge_code.description = "Admin"
    and (dbo.Time_Entry.Date_Start >="'.$range1.'" and dbo.Time_Entry.Date_Start <= "'.$range2.'") and (member.member_id = "wblakeburn" or member.member_id = "plane" or member.member_id = "jmorgan" or member.member_id = "bfizer" or member.member_id = "rmillen")';

    $meetingQuery = 'SELECT sum(time_entry.hours_actual) as meetingHours
    FROM time_entry
    left outer join member on time_entry.member_recid = member.member_recid
    left outer join te_charge_code on time_entry.te_charge_code_recid = te_charge_code.te_charge_code_recid
    WHERE te_charge_code.description = "Meeting"
    and (dbo.Time_Entry.Date_Start >="'.$range1.'" and dbo.Time_Entry.Date_Start <= "'.$range2.'") and (member.member_id = "wblakeburn" or member.member_id = "plane" or member.member_id = "jmorgan" or member.member_id = "bfizer" or member.member_id = "rmillen")';

    $projectQuery = 'SELECT SUM(CASE WHEN dbo.time_entry.PM_Project_RecID IS NOT NULL THEN dbo.time_entry.Hours_Actual ELSE 0 END) AS projectHours
    FROM         dbo.Time_Entry LEFT OUTER JOIN
                          dbo.TE_Charge_Code ON dbo.Time_Entry.TE_Charge_Code_RecID = dbo.TE_Charge_Code.TE_Charge_Code_RecID LEFT OUTER JOIN
                          dbo.Member ON dbo.Time_Entry.Member_RecID = dbo.Member.Member_RecID
                          left outer join company on time_entry.company_recid = company.company_recid
    WHERE and company.company_name = "'.$company.'" and (dbo.Time_Entry.Date_Start >="'.$range1.'" and dbo.Time_Entry.Date_Start <= "'.$range2.'") and (member.member_id = "wblakeburn" or member.member_id = "plane" or member.member_id = "jmorgan" or member.member_id = "bfizer" or member.member_id = "rmillen")';



}else if(isset($_GET['range1']) && isset($_GET['range2'])){
    $range1 = $_GET['range1'];
    $range2 = $_GET['range2'];
    $title = "Hours by Service Type (top 10) - ".$range1. " - ".$range2;
    $backupQuery = 'SELECT sum(time_entry.hours_actual) as backupHours
                  FROM cwwebapp_ans.dbo.Company Company, cwwebapp_ans.dbo.SR_Board SR_Board,dbo.member, cwwebapp_ans.dbo.SR_Service SR_Service, cwwebapp_ans.dbo.SR_Type SR_Type,cwwebapp_ans.dbo.Time_Entry
                  WHERE Company.Company_RecID = Time_Entry.Company_RecID AND
                  SR_Service.SR_Service_RecID = Time_Entry.SR_Service_RecID AND
                  Company.Company_RecID = SR_Service.Company_RecID AND
                  SR_Type.SR_Type_RecID = SR_Service.SR_Type_RecID AND
                  member.member_recid = time_entry.member_recid AND
                  SR_Board.SR_Board_RecID = SR_Service.SR_Board_RecID AND
                  SR_Board.SR_Board_RecID = SR_Type.SR_Board_RecID and
                  sr_board.board_name <> "Managed Services - Requests"

                  and (sr_service.summary like "%ImageManager%" or sr_service.summary like "%BU - %" or sr_service.summary like "%Accelerite%" or sr_service.summary like "%Syncback%" or sr_service.summary like "%\[Warning]%")
                  and (dbo.Time_Entry.Date_Start >="'.$range1.'" and dbo.Time_Entry.Date_Start <= "'.$range2.'") and (member.member_id = "wblakeburn" or member.member_id = "plane" or member.member_id = "jmorgan" or member.member_id = "bfizer" or member.member_id = "rmillen")


                  ';

    $avQuery = 'SELECT sum(time_entry.hours_actual) as avHours
                FROM Time_Entry
                left outer join company on time_entry.company_recid = company.company_recid
                left outer join sr_service on time_Entry.sr_service_recid = sr_service.sr_service_recid
                left outer join member on time_entry.member_recid = member.member_recid
                left outer join sr_board on sr_service.sr_board_recid = sr_board.sr_board_recid
                WHERE
                sr_board.board_name <> "Managed Services - Requests"

                and (sr_service.summary LIKE "%ESET - %" or sr_service.summary LIKE "%AV - %")
                and (dbo.Time_Entry.Date_Start >="'.$range1.'" and dbo.Time_Entry.Date_Start <= "'.$range2.'") and (member.member_id = "wblakeburn" or member.member_id = "plane" or member.member_id = "jmorgan" or member.member_id = "bfizer" or member.member_id = "rmillen")


    ';

    $bobQuery = 'SELECT sum(time_entry.hours_actual) as bobHours
                    FROM Time_Entry
                    left outer join company on time_entry.company_recid = company.company_recid
                    left outer join sr_service on time_Entry.sr_service_recid = sr_service.sr_service_recid
                    left outer join member on time_entry.member_recid = member.member_recid
                    left outer join te_charge_code on time_entry.te_charge_code_recid = te_charge_code.te_charge_code_recid
                    left outer join sr_board on sr_service.sr_board_recid = sr_board.sr_board_recid
                    WHERE
                    sr_board.board_name <> "Managed Services - Requests" and (sr_board.board_name = "BackOffice" or sr_board.board_name = "LogicMonitor" or sr_board.board_name = "My Company/Service" or sr_board.board_name = "Results Physiotherapy") and


                     sr_service.summary NOT LIKE "%AV - %" and sr_service.summary NOT LIKE "%ESET - %" and sr_service.summary NOT LIKE "%BU - %" and sr_service.summary NOT LIKE "%\[Warning]%" and sr_service.summary NOT LIKE "%Syncback%" and sr_service.summary NOT LIKE "%Accelerite%" and sr_service.summary NOT LIKE "%ImageManager%"
                    and (dbo.Time_Entry.Date_Start >="'.$range1.'" and dbo.Time_Entry.Date_Start <= "'.$range2.'") and (member.member_id = "wblakeburn" or member.member_id = "plane" or member.member_id = "jmorgan" or member.member_id = "bfizer" or member.member_id = "rmillen")

    ';


    $adminQuery = 'SELECT sum(time_entry.hours_actual) as adminHours
                  FROM time_entry
                  left outer join member on time_entry.member_recid = member.member_recid
                  left outer join te_charge_code on time_entry.te_charge_code_recid = te_charge_code.te_charge_code_recid
                  WHERE te_charge_code.description = "Admin"
                  and (dbo.Time_Entry.Date_Start >="'.$range1.'" and dbo.Time_Entry.Date_Start <= "'.$range2.'") and (member.member_id = "wblakeburn" or member.member_id = "plane" or member.member_id = "jmorgan" or member.member_id = "bfizer" or member.member_id = "rmillen")';

    $meetingQuery = 'SELECT sum(time_entry.hours_actual) as meetingHours
                    FROM time_entry
                    left outer join member on time_entry.member_recid = member.member_recid
                    left outer join te_charge_code on time_entry.te_charge_code_recid = te_charge_code.te_charge_code_recid
                    WHERE te_charge_code.description = "Meeting"
                    and (dbo.Time_Entry.Date_Start >="'.$range1.'" and dbo.Time_Entry.Date_Start <= "'.$range2.'") and (member.member_id = "wblakeburn" or member.member_id = "plane" or member.member_id = "jmorgan" or member.member_id = "bfizer" or member.member_id = "rmillen") ';

    $ptoQuery = 'SELECT sum(time_entry.hours_actual) as ptoHours
                FROM time_entry
                left outer join member on time_entry.member_recid = member.member_recid
                left outer join te_charge_code on time_entry.te_charge_code_recid = te_charge_code.te_charge_code_recid
                WHERE te_charge_code.description = "PTO"
                and (dbo.Time_Entry.Date_Start >="'.$range1.'" and dbo.Time_Entry.Date_Start <= "'.$range2.'") and (member.member_id = "wblakeburn" or member.member_id = "plane" or member.member_id = "jmorgan" or member.member_id = "bfizer" or member.member_id = "rmillen")';

    $otherChargeQuery = 'SELECT sum(time_entry.hours_actual) as otherChargeHours
                        FROM time_entry
                        left outer join company on time_entry.company_recid = company.company_recid
                        left outer join member on time_entry.member_recid = member.member_recid
                        left outer join te_charge_code on time_entry.te_charge_code_recid = te_charge_code.te_charge_code_recid
                        left outer join sr_service on time_entry.sr_service_recid = sr_service.sr_service_recid
                        left outer join sr_board on sr_service.sr_board_recid = sr_board.sr_board_recid
                        WHERE te_charge_code.description <> "PTO" and te_charge_code.description <> "Admin"and te_charge_code.description <> "Meeting"
                        and (dbo.Time_Entry.Date_Start >="'.$range1.'" and dbo.Time_Entry.Date_Start <= "'.$range2.'") and (member.member_id = "wblakeburn" or member.member_id = "plane" or member.member_id = "jmorgan" or member.member_id = "bfizer" or member.member_id = "rmillen")';

    $otherQuery = 'SELECT sum(time_entry.hours_actual) as internalHours
                  FROM time_entry
                  left outer join member on time_entry.member_recid = member.member_recid
                  left outer join sr_service on time_entry.sr_service_recid = sr_service.sr_service_recid
                  left outer join te_charge_code on time_entry.te_charge_code_recid = te_charge_code.te_charge_code_recid
                  left outer join company on time_entry.company_recid = company.company_recid
                  left outer join sr_board on sr_service.sr_board_recid = sr_board.sr_board_recid
                  WHERE  company_name = "Advanced Network Solutions" and  (dbo.Time_Entry.Date_Start >="'.$range1.'" and dbo.Time_Entry.Date_Start <= "'.$range2.'") and (member.member_id = "wblakeburn" or member.member_id = "plane" or member.member_id = "jmorgan" or member.member_id = "bfizer" or member.member_id = "rmillen")';

    $projectQuery = 'SELECT SUM(CASE WHEN dbo.time_entry.PM_Project_RecID IS NOT NULL THEN dbo.time_entry.Hours_Actual ELSE 0 END) AS projectHours
                      FROM dbo.Time_Entry LEFT OUTER JOIN
                          dbo.TE_Charge_Code ON dbo.Time_Entry.TE_Charge_Code_RecID = dbo.TE_Charge_Code.TE_Charge_Code_RecID LEFT OUTER JOIN
                          dbo.Member ON dbo.Time_Entry.Member_RecID = dbo.Member.Member_RecID
                      WHERE  (dbo.Time_Entry.Date_Start >="'.$range1.'" and dbo.Time_Entry.Date_Start <= "'.$range2.'") and (member.member_id = "wblakeburn" or member.member_id = "plane" or member.member_id = "jmorgan" or member.member_id = "bfizer" or member.member_id = "rmillen") ';

    $requestQuery = 'SELECT sum(time_entry.hours_actual) as requestHours
                    FROM Time_Entry
                    left outer join company on time_entry.company_recid = company.company_recid
                    left outer join sr_service on time_Entry.sr_service_recid = sr_service.sr_service_recid
                    left outer join member on time_entry.member_recid = member.member_recid
                    left outer join te_charge_code on time_entry.te_charge_code_recid = te_charge_code.te_charge_code_recid
                    left outer join sr_board on sr_service.sr_board_recid = sr_board.sr_board_recid
                    WHERE
                     sr_board.board_name = "Managed Services - Requests"
                    and (dbo.Time_Entry.Date_Start >="'.$range1.'" and dbo.Time_Entry.Date_Start <= "'.$range2.'") and (member.member_id = "wblakeburn" or member.member_id = "plane" or member.member_id = "jmorgan" or member.member_id = "bfizer" or member.member_id = "rmillen")';


}
  else{



        $backupQuery = 'SELECT sum(time_entry.hours_actual) as backupHours
                      FROM cwwebapp_ans.dbo.Company Company, cwwebapp_ans.dbo.SR_Board SR_Board,dbo.member, cwwebapp_ans.dbo.SR_Service SR_Service, cwwebapp_ans.dbo.SR_Type SR_Type,cwwebapp_ans.dbo.Time_Entry
                      WHERE Company.Company_RecID = Time_Entry.Company_RecID AND
                      SR_Service.SR_Service_RecID = Time_Entry.SR_Service_RecID AND
                      Company.Company_RecID = SR_Service.Company_RecID AND
                      SR_Type.SR_Type_RecID = SR_Service.SR_Type_RecID AND
                      member.member_recid = time_entry.member_recid AND
                      SR_Board.SR_Board_RecID = SR_Service.SR_Board_RecID AND
                      SR_Board.SR_Board_RecID = SR_Type.SR_Board_RecID and
                      sr_board.board_name <> "Managed Services - Requests"

                      and (sr_service.summary like "%ImageManager%" or sr_service.summary like "%BU - %" or sr_service.summary like "%Accelerite%" or sr_service.summary like "%Syncback%" or sr_service.summary like "%\[Warning]%")
                      and DATEDIFF( ww, dbo.Time_Entry.Date_Start, GETDATE() ) = 0 and (member.member_id = "wblakeburn" or member.member_id = "plane" or member.member_id = "jmorgan" or member.member_id = "bfizer" or member.member_id = "rmillen")


                      ';

        $avQuery = 'SELECT sum(time_entry.hours_actual) as avHours
                    FROM Time_Entry
                    left outer join company on time_entry.company_recid = company.company_recid
                    left outer join sr_service on time_Entry.sr_service_recid = sr_service.sr_service_recid
                    left outer join member on time_entry.member_recid = member.member_recid
                    left outer join sr_board on sr_service.sr_board_recid = sr_board.sr_board_recid
                    WHERE
                    sr_board.board_name <> "Managed Services - Requests"
                    and (sr_service.summary LIKE "%ESET - %" or sr_service.summary LIKE "%AV - %")
                    and DATEDIFF( ww, dbo.Time_Entry.Date_Start, GETDATE() ) = 0 and (member.member_id = "wblakeburn" or member.member_id = "plane" or member.member_id = "jmorgan" or member.member_id = "bfizer" or member.member_id = "rmillen")


        ';

        $bobQuery = 'SELECT sum(time_entry.hours_actual) as bobHours
                        FROM Time_Entry
                        left outer join company on time_entry.company_recid = company.company_recid
                        left outer join sr_service on time_Entry.sr_service_recid = sr_service.sr_service_recid
                        left outer join member on time_entry.member_recid = member.member_recid
                        left outer join te_charge_code on time_entry.te_charge_code_recid = te_charge_code.te_charge_code_recid
                        left outer join sr_board on sr_service.sr_board_recid = sr_board.sr_board_recid
                        WHERE
                        sr_board.board_name <> "Managed Services - Requests" and (sr_board.board_name = "BackOffice" or sr_board.board_name = "LogicMonitor" or sr_board.board_name = "My Company/Service" or sr_board.board_name = "Results Physiotherapy") and


                         sr_service.summary NOT LIKE "%AV - %" and sr_service.summary NOT LIKE "%ESET - %" and sr_service.summary NOT LIKE "%BU - %" and sr_service.summary NOT LIKE "%\[Warning]%" and sr_service.summary NOT LIKE "%Syncback%" and sr_service.summary NOT LIKE "%Accelerite%" and sr_service.summary NOT LIKE "%ImageManager%"
                        and DATEDIFF( ww, dbo.Time_Entry.Date_Start, GETDATE() ) = 0 and (member.member_id = "wblakeburn" or member.member_id = "plane" or member.member_id = "jmorgan" or member.member_id = "bfizer" or member.member_id = "rmillen")

        ';


        $adminQuery = 'SELECT sum(time_entry.hours_actual) as adminHours
                      FROM time_entry
                      left outer join member on time_entry.member_recid = member.member_recid
                      left outer join te_charge_code on time_entry.te_charge_code_recid = te_charge_code.te_charge_code_recid
                      WHERE te_charge_code.description = "Admin"
                      and DATEDIFF( ww, dbo.Time_Entry.Date_Start, GETDATE() ) = 0 and (member.member_id = "wblakeburn" or member.member_id = "plane" or member.member_id = "jmorgan" or member.member_id = "bfizer" or member.member_id = "rmillen")';

        $meetingQuery = 'SELECT sum(time_entry.hours_actual) as meetingHours
                        FROM time_entry
                        left outer join member on time_entry.member_recid = member.member_recid
                        left outer join te_charge_code on time_entry.te_charge_code_recid = te_charge_code.te_charge_code_recid
                        WHERE te_charge_code.description = "Meeting"
                        and DATEDIFF( ww, dbo.Time_Entry.Date_Start, GETDATE() ) = 0 and (member.member_id = "wblakeburn" or member.member_id = "plane" or member.member_id = "jmorgan" or member.member_id = "bfizer" or member.member_id = "rmillen")';

        $ptoQuery = 'SELECT sum(time_entry.hours_actual) as ptoHours
                    FROM time_entry
                    left outer join member on time_entry.member_recid = member.member_recid
                    left outer join te_charge_code on time_entry.te_charge_code_recid = te_charge_code.te_charge_code_recid
                    WHERE te_charge_code.description = "PTO"
                    and DATEDIFF( ww, dbo.Time_Entry.Date_Start, GETDATE() ) = 0 and (member.member_id = "wblakeburn" or member.member_id = "plane" or member.member_id = "jmorgan" or member.member_id = "bfizer" or member.member_id = "rmillen")';

        $otherChargeQuery = 'SELECT sum(time_entry.hours_actual) as otherChargeHours
                            FROM time_entry
                            left outer join company on time_entry.company_recid = company.company_recid
                            left outer join member on time_entry.member_recid = member.member_recid
                            left outer join te_charge_code on time_entry.te_charge_code_recid = te_charge_code.te_charge_code_recid
                            left outer join sr_service on time_entry.sr_service_recid = sr_service.sr_service_recid
                            left outer join sr_board on sr_service.sr_board_recid = sr_board.sr_board_recid
                            WHERE te_charge_code.description <> "PTO" and te_charge_code.description <> "Admin"and te_charge_code.description <> "Meeting"
                            and DATEDIFF( ww, dbo.Time_Entry.Date_Start, GETDATE() ) = 0 and (member.member_id = "wblakeburn" or member.member_id = "plane" or member.member_id = "jmorgan" or member.member_id = "bfizer" or member.member_id = "rmillen")';

        $otherQuery = 'SELECT sum(time_entry.hours_actual) as internalHours
                      FROM time_entry
                      left outer join member on time_entry.member_recid = member.member_recid
                      left outer join sr_service on time_entry.sr_service_recid = sr_service.sr_service_recid
                      left outer join te_charge_code on time_entry.te_charge_code_recid = te_charge_code.te_charge_code_recid
                      left outer join company on time_entry.company_recid = company.company_recid
                      left outer join sr_board on sr_service.sr_board_recid = sr_board.sr_board_recid
                      WHERE  company_name = "Advanced Network Solutions" and  DATEDIFF( ww, dbo.Time_Entry.Date_Start, GETDATE() ) = 0 and (member.member_id = "wblakeburn" or member.member_id = "plane" or member.member_id = "jmorgan" or member.member_id = "bfizer" or member.member_id = "rmillen")';

        $projectQuery = 'SELECT SUM(CASE WHEN dbo.time_entry.PM_Project_RecID IS NOT NULL THEN dbo.time_entry.Hours_Actual ELSE 0 END) AS projectHours
                          FROM dbo.Time_Entry LEFT OUTER JOIN
                              dbo.TE_Charge_Code ON dbo.Time_Entry.TE_Charge_Code_RecID = dbo.TE_Charge_Code.TE_Charge_Code_RecID LEFT OUTER JOIN
                              dbo.Member ON dbo.Time_Entry.Member_RecID = dbo.Member.Member_RecID
                          WHERE  DATEDIFF( ww, dbo.Time_Entry.Date_Start, GETDATE() ) = 0 and (member.member_id = "wblakeburn" or member.member_id = "plane" or member.member_id = "jmorgan" or member.member_id = "bfizer" or member.member_id = "rmillen")';

        $requestQuery = 'SELECT sum(time_entry.hours_actual) as requestHours
                        FROM Time_Entry
                        left outer join company on time_entry.company_recid = company.company_recid
                        left outer join sr_service on time_Entry.sr_service_recid = sr_service.sr_service_recid
                        left outer join member on time_entry.member_recid = member.member_recid
                        left outer join te_charge_code on time_entry.te_charge_code_recid = te_charge_code.te_charge_code_recid
                        left outer join sr_board on sr_service.sr_board_recid = sr_board.sr_board_recid
                        WHERE
                         sr_board.board_name = "Managed Services - Requests"
                        and DATEDIFF( ww, dbo.Time_Entry.Date_Start, GETDATE() ) = 0 and (member.member_id = "wblakeburn" or member.member_id = "plane" or member.member_id = "jmorgan" or member.member_id = "bfizer" or member.member_id = "rmillen")';


      }

//DATEDIFF( ww, dbo.Time_Entry.Date_Start, GETDATE() ) = 0

$backupHours = mssql_query($backupQuery);
$avHours = mssql_query($avQuery);
$bobHours = mssql_query($bobQuery);
$adminHours = mssql_query($adminQuery);
$meetingHours = mssql_query($meetingQuery);
$projectHours = mssql_query($projectQuery);
$ptoHours = mssql_query($ptoQuery);
$otherChargeHours = mssql_query($otherChargeQuery);
$otherHours = mssql_query($otherQuery);
$requestHours = mssql_query($requestQuery);
//$query1 = str_replace('"',"",$backupQuery+$avQuery+$bobQuery);


// fetch all rows from the query
$all_rows = array();
while($row = mssql_fetch_assoc($backupHours)) {
  $row["Title"] =$title;
  $row["Description"] = $description;
  //$row["Query"] = $query1;
  $row["Datasource"] = $datasource;
//$backup = $row['backupHours'];
  $all_rows [] = $row;
}
while($row = mssql_fetch_assoc($avHours)) {

    $all_rows [] = $row;
}
while($row = mssql_fetch_assoc($bobHours)) {


    $all_rows [] = $row;
}
while($row = mssql_fetch_assoc($adminHours)) {


    $all_rows [] = $row;
}while($row = mssql_fetch_assoc($meetingHours)) {


    $all_rows [] = $row;
}while($row = mssql_fetch_assoc($projectHours)) {


    $all_rows [] = $row;
}
while($row = mssql_fetch_assoc($ptoHours)) {


    $all_rows [] = $row;
}
while($row = mssql_fetch_assoc($otherChargeHours)) {


    $all_rows [] = $row;
}
while($row = mssql_fetch_assoc($otherHours)) {


    $all_rows [] = $row;
}
while($row = mssql_fetch_assoc($requestHours)) {


    $all_rows [] = $row;
}

header("Content-Type: application/json");
echo json_encode($all_rows);
?>
