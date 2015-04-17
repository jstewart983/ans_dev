<!doctype html >
<html lang="en">
    <head>
        <meta charset="UTF-8" />

        <meta name="viewport" content="width=device-width, initial-scale=1.0">



        <title>Service Delivery | Service Desk</title>
        <link rel="stylesheet" type="text/css" href="../../css/demo.css">
        <link rel="stylesheet" type="text/css" href="../../css/razorflow.min.css">
        <link rel="stylesheet" type="text/css" href="../../css/navbar.css">
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">

        <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
        <link rel="stylesheet" href="../../Flat-UI-master/dist/css/flat-ui.min.css">
        <link rel="stylesheet" href="../../Flat-UI-master/fonts/glyphicons/flat-ui-icons-regular.svg">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">



        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>
        <script type="text/javascript" src="../../js/service_desk.js"></script>
        <script type="text/javascript" src="../../js/Chart.js"></script>
        <script type="text/javascript" src="../../js/legend.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>
        <script>$('.navmenu').offcanvas()</script>
        <script>
            function myFunction() {

            var x = document.title;
            document.getElementById("title").innerHTML = x;

            }
            window.onload = myFunction;
        </script>
    </head>
    <style type="text/css">
    div{
      font-size:15px !important;
    }
    th{
      font-size:15px !important;
    }
    p{
      font-size:12px !important;
    }
    .container{

      width:95% !important;

    }
    .navmenu .navmenu-default{
        background-color: #fff;
        }
        </style>
    <body class="canvas">
<div style="background-color:#fff;" class="navmenu navmenu-default navmenu-fixed-left offcanvas">
      <a class="navmenu-brand" href="#">ANS Reporting</a>
      <ul class="nav navmenu-nav">
        <li><a href="../../">Overview</a></li>
        <li><a href="../../solutiondelivery/">Solution Delivery</a></li>
        <li class="active"><a href="#">Service Delivery</a></li>
        <li><a href="../../clientservices/">Client Services</a></li>
        <li><a href="../../resultsphysiotherapy/">Results Physiotherapy</a></li>
        <li><a href="../../sales/">Sales</a></li>
        <li><a href="../../finance/">Finance</a></li>

      </ul>
      <ul class="nav navmenu-nav">
        <li><a href="../../admin/">Admin</a></li>
      </ul>
    </div>

    <div class="navbar navbar-default navbar-fixed-top">
      <button style="display: block;float: left; margin-left: 15px;" type="button" class="navbar-toggle" data-toggle="offcanvas" data-target=".navmenu" data-canvas="body">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <h2 style="margin-top:12px;text-align:center;font-size:20px;"id="title"></h2>
    </div>
    <div style="margin-top:52px;"class="container">
        <!--nav pill row -->
        <div class="row">
            <div style="border-top:1px solid #ddd;border-left:1px solid #ddd;border-right:1px solid #ddd;border-bottom:1px solid #ddd;border-radius: 4px;background-color:#fff;"class="col-md-6">
                <div style="padding:5px;">
                    <ul class="nav nav-pills">
                        <li role="presentation" ><a style="color:#414141;" href="../">Overview</a></li>
                        <li role="presentation"class="active"><a style="background-color:#F78E1E;color:#fff;"href="servicedesk/">Service Desk</a></li>
                        <li role="presentation"><a style="color:#414141;"href="../CIMs">Client IT Managers</a></li>
                        <li role="presentation"><a style="color:#414141;"target="_blank"href="../leaderboard">Help Desk Leaderboard</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!--KPIs-->
        <div id="title"style="margin-top:10px;" class="row">
            <div class="col-md-2">
                <div class="panel panel-default">
                  <div class="panel-heading">
                        <p id="closedTicketsTitle" style="text-align:center;">Tickets Closed - This Week <span>      <a href="#" class="fui-info-circle"data-toggle="modal"data-target="#basicModal"></a></span></p>
                  </div>
                  <div class="panel-body">
                    <h1 id="ticketsClosed"style="text-align:center;">0</h1>
                  </div>
                </div>
            </div>
            <div id="title" class="col-md-2">
                <div class="panel panel-default">
                  <div class="panel-heading">
                        <p id="openTicketsTitle"  style="text-align:center;">Open Tickets <span><a href="#" class="fui-info-circle"data-toggle="modal"data-target="#basicModal"></a></span></p>
                  </div>
                  <div class="panel-body">
                    <h1 id="openTickets" style="text-align:center;">0</h1>
                  </div>
                </div>
            </div>
            <div id="title" class="col-md-2">
                <div class="panel panel-default">
                  <div class="panel-heading">
                        <p id="closedFirstTitle" style="text-align:center;">Closed First Call % <span><a href="#" class="fui-info-circle"data-toggle="modal"data-target="#basicModal"></a></span></p>
                  </div>
                  <div class="panel-body">
                    <h1 id="closedFirst"style="text-align:center;">0%</h1>
                  </div>
                </div>
            </div>
            <div id="title" class="col-md-2">
                <div class="panel panel-default">
                  <div class="panel-heading">
                        <p id="totalBillableTitle" style="text-align:center;">Billable Hrs - This Week <span><a href="#" class="fui-info-circle"data-toggle="modal"data-target="#basicModal"></a></span></p>
                  </div>
                  <div id="title"class="panel-body">
                    <h1 id="totalBillable"style="text-align:center;">0 hrs</h1>
                  </div>
                </div>
            </div>
            <div id="title" class="col-md-4">
                <div class="panel panel-default">
                  <div class="panel-heading">
                        <p id="avgResponseTitle" style="text-align:center;">Avg Initial Response Time - Last 7 days <span><a href="#" class="fui-info-circle"data-toggle="modal"data-target="#basicModal"></a></span></p>
                  </div>
                  <div id="title"class="panel-body">
                    <h1 id="avgResponse"style="text-align:center;">0 minutes</h1>
                  </div>
                </div>
            </div>
          </div>
            <!--<div class="col-md-2">
                <div class="panel panel-default">
                  <div class="panel-heading">
                        <p style="text-align:center;">Avg Initial Response Time</p>
                  </div>
                  <div id="title"class="panel-body">
                    <h1 style="text-align:center;">0%</h1>
                  </div>
                </div>
            </div>
        </div>-->
        <!--Billable hours and new tickets vs closed tickets this week charts-->
        <div class="row">
            <div id="title" class="col-md-6">
                <div class="panel panel-default">
                  <div class="panel-heading">
                        <p id ="billableDayTitle" style="text-align:center;">Billable Hrs/Member - This Week <span><a href="#" class="fui-info-circle"data-toggle="modal"data-target="#basicModal"></a></span></p>
                  </div>
                  <div id="title"class="panel-body">
                    <div style="text-align:center"class="col-md-2">
                          <div style="padding:5px;" id="billableDayLegend">
                          </div>
                        </div>
                        <canvas id ="billableDay"style="margin-left:-2px;padding:15px;width:90%;height:200px;"></canvas>
                  </div>
                </div>
            </div>

        <div id="title" class="col-md-6">
                <div class="panel panel-default">
                  <div class="panel-heading">
                        <p id="newOldTitle" style="text-align:center;">New Tickets vs Tickets Closed - Last 5 days <span><a href="#" class="fui-info-circle"data-toggle="modal"data-target="#basicModal"></a></span></p>
                  </div>
                  <div id="title"class="panel-body">
                    <div style="text-align:center"class="col-md-2">
                          <div style="padding:5px;" id="newOldLegend">
                          </div>
                        </div>
                        <canvas id ="newOld"style="margin-left:-2px;padding:15px;width:90%;height:200px;"></canvas>
                  </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div id="title" class="col-md-6">
              <div id="urgentTicketsTable">
                <div style='width:100%;padding:0px;'class=' panel panel-default'>
                <div class='panel-heading'style='text-align:center;'>
                  <p id="urgentTicketsTitle" style="text-align:center;">Open + Urgent Tickets <span><a href="#" class="fui-info-circle"data-toggle="modal"data-target="#basicModal"></a></span></p>
                </div>
                <div style='width:100%;width:100%;overflow-y: scroll !important;height:278px;'class=panel-body>
                  <table id='clientTable' style='width:100%;' class='table table-hover'>
                  <thead>
                  <th>Ticket #</th>
                  <th>Urgency</th>
                  <th>Status</th>
                  <th>Summary</th>
                  <th>Days Open</th>
                  </thead>
                  <tbody  class='rowlink'>

                    </tbody>
                    </table>
              </div>
            </div>
          </div>
        </div>
            <div id="title" class="col-md-6">
                <div class="panel panel-default">
                  <div class="panel-heading">
                        <p id="ticketsByTypeTitle" style="text-align:center;">Hours by Service Type (top 10) - This Week  <span><a href="#" class="fui-info-circle"data-toggle="modal"data-target="#basicModal"></a></span></p>
                  </div>
                  <div id="title"class="panel-body">
                    <div style="text-align:center"class="col-md-2">
                          <div  id="ticketsByTypeLegend">
                          </div>
                        </div>
                        <div class="col-md-10">
                          <canvas id ="ticketsByType"style="margin-left:-2px;padding:15px;width:90%;height:100px;"></canvas>
                        </div>
                  </div>
                </div>
            </div>
        </div>
        <!--<div class="row">
          <div id="title" class="panel panel-default">
            <div class="panel-heading">
              <p id="ticketChartTitle" style="text-align:center;">Tickets Open vs Tickets Closed - Last Year to Last Month <span><a href="#" class="fui-info-circle"data-toggle="modal"data-target="#basicModal"></a></span></p>
            </div>

          <div style="padding:10px;" id="ticketChartLegend">

          </div>
          <canvas style="padding:10px;width:90%;height:400px;" id="ticketChart">

          </canvas>
        </div>
      </div>-->
        <div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <button type="button"  class="close fui-cross" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title" id="myModalLabel"></h4>
                    </div>
                    <div class="modal-body">
                        <h4>
                          Description
                        </h4>
                        <p id="description">

                        </p>
                        <h4>Datasource</h4>
                        <p id="datasource">

                        </p>
                        <h4>
                        Query
                        </h4>
                        <pre id="query">

                        </pre>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                </div>
            </div>
          </div>
        </div>

    </div>
        <!-- Don't delete this div. This is where RazorFlow will get rendered. -->

    </body>

</html>
