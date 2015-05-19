<!doctype html >
<html lang="en">
    <head>
        <meta charset="UTF-8" />

        <meta name="viewport" content="width=device-width, initial-scale=1.0">



        <title>Service Delivery</title>
        <link rel="stylesheet" type="text/css" href="../../css/demo.css">
        <!--<link rel="stylesheet" type="text/css" href="../../css/razorflow.min.css">-->
        <link rel="stylesheet" type="text/css" href="../../css/navbar.css">
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../libraries/Flat-UI-master/dist/css/flat-ui.min.css">
        <link rel="stylesheet" href="../../libraries/Flat-UI-master/fonts/glyphicons/flat-ui-icons-regular.svg">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">
        <link rel="stylesheet" href="../../libraries/timeline-2.9.1/timeline.css" media="screen" title="no title" charset="utf-8">
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
        <script type="text/javascript" src="../../js/jquery.min.js"></script>
        <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/2.9.0/moment.min.js"></script>
        <script type="text/javascript" src="../../js/service_delivery.js"></script>

        <script type="text/javascript" src="../../js/Chart.js"></script>
        <script type="text/javascript" src="../../js/legend.js"></script>
        <script type="text/javascript" src="../../js/oneUp.js"></script>
        <script src="../../libraries/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>
        <script src="../../libraries/timeline-2.9.1/timeline.js"></script>
        <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/1/daterangepicker.js"></script>
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/1/daterangepicker-bs3.css" />
        <script>$('.navmenu').offcanvas()</script>
        <script>
            function myFunction() {

            var x = document.title;
            document.getElementById("title").innerHTML = x;

            }
            window.onload = myFunction;
        </script>
        <!-- Latest compiled and minified JavaScript -->


        <style type="text/css">
        @media screen and (max-width: 999px) {
      #logout_button,#issue_button {
        visibility: hidden;
        clear: both;
        float: left;
        margin: 10px auto 5px 20px;
        width: 28%;
        display: none;
      }

    }
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
            @media (min-width: 768px){
            .modal-dialog4 {
              width: 100%;
              margin: 30px auto;
            }
          }
            </style>
    </head>

    <body class="canvas">

<div style="background-color:#fff;" class="navmenu navmenu-default navmenu-fixed-left offcanvas">
      <a class="navmenu-brand" href="#"><span><img src="../../css/assets/Lightbulb-only-icon-64.png" alt="" /></span> ANS Intelligence</a>
      <ul class="nav navmenu-nav">
        <li><a href="../home/">Home</a></li>
        <li><a href="../solutiondelivery/">Solution Delivery</a></li>
        <li><a href="../managedservices/">Managed Services</a></li>
        <li class="active"><a href="#">Service Delivery</a></li>
        <li><a href="../fieldservices/">Field Services</a></li>
        <li><a href="../clientservices/">Client Services</a></li>
        <li><a href="../resultsphysiotherapy/">Results Physiotherapy</a></li>
        <li><a href="../sales/">Sales</a></li>
        <li><a href="../finance/">Finance</a></li>

      </ul>
      <ul class="nav navmenu-nav">
        <li><a href="../admin/">Admin</a></li>
      </ul>
    </div>

    <div class="navbar navbar-default navbar-fixed-top">
      <button style="display: block;float: left; margin-left: 15px;" type="button" class="navbar-toggle" data-toggle="offcanvas" data-target=".navmenu" data-canvas="body">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <div class="col-md-3">

      </div>
      <div class="col-md-5">
        <h2 style="margin-top:12px;text-align:center;font-size:20px;display: block;"id="title"></h2>

      </div>

      <div id="issue_button" style="margin-right:15px;margin-top:10px;margin-bottom:auto;text-align:center;float: right; margin-left: 15px;height:53px;">
        <a  id="issue" class="btn btn-sm btn-primary">Submit Issue/Request</a>
      </div>

      <div id="logout_button" style="margin-right:15px;margin-top:10px;margin-bottom:auto;text-align:center;float: right; margin-left: 15px;height:53px;">
        <a href="index.php?logout" class="btn btn-sm btn-inverse">Logout</a>

      </div>
    </div>
    <div style="margin-top:52px;"class="container">
        <!--nav pill row -->
        <div class="row">
            <div style="border-top:1px solid #ddd;border-left:1px solid #ddd;border-right:1px solid #ddd;border-bottom:1px solid #ddd;border-radius: 4px;background-color:#fff;"class="col-md-4">
                <div style="padding:5px;">
                    <ul class="nav nav-pills">
                        <li role="presentation" class="active"><a style="background-color:#F78E1E;"href="#">Overview</a></li>
                        <li role="presentation"><a style="color:#414141;"target="_blank"href="leaderboard/">Help Desk Leaderboard</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-1">

            </div>
            <div class="col-md-7">
              <div id="boards" style="padding:5px;">
                  <ul id="boardTable" class="nav nav-pills">

                  </ul>
              </div>

            </div>
        </div>



        <!--KPIs-->
        <div id="title"style="margin-top:10px;" class="row">
            <div class="col-md-2">
                <div class="panel panel-default">
                  <div class="panel-heading">
                        <p id="closedTicketsTitle" style="text-align:center;">Tickets Closed - This Wk <span>      <a href="#" class="fui-info-circle"data-toggle="modal"data-target="#basicModal"></a></span></p>
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
                        <p id="totalBillableTitle" style="text-align:center;">Billable Hrs - This Wk <span><a href="#" class="fui-info-circle"data-toggle="modal"data-target="#basicModal"></a></span></p>
                  </div>
                  <div id="title"class="panel-body">
                    <div id="dateSwitch">
                      <a style="float:right;"  id="lastWk" class="btn btn-xs btn-info">Last Wk</a>

                    </div>
                    <h1 id="totalBillable"style="text-align:center;">0 hrs</h1>
                    <p id="vs"></p>
                  </div>
                </div>
            </div>
            <div id="title" class="col-md-4">
                <div class="panel panel-default">
                  <div class="panel-heading">
                        <p id="avgResponseTitle" style="text-align:center;">Avg Initial Response Time - This Wk <span><a href="#" class="fui-info-circle"data-toggle="modal"data-target="#basicModal"></a></span></p>
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
                  <div id="dude" class="panel-heading">
                        <p id ="billableDayTitle" style="text-align:center;">Billable Hrs/Member - This Wk <span><a href="#" class="fui-info-circle"data-toggle="modal"data-target="#basicModal"></a></span></p>
                  </div>
                  <div id="title"class="panel-body">
                    <div style="margin-top:10px;margin-bottom:5px;" class="row">
                      <div class="col-md-2">
                      </div>
                        <div class="col-md-4">
                          <input id="daterange4" class="form-control" type="text" name="daterange4"placeholder="Select a Date Range"  />

                            <script type="text/javascript">

                            </script>
                        </div>
                        <div class="col-md-3">
                        </div>
                        <div class="col-md-3">
                        </div>
                        <div class="col-md-1">
                        </div>

                    </div>
                      <div style="text-align:center"class="col-md-2">
                      </div>
                    <div class="sup">
                        <canvas id ="billableDay"style="margin-left:-2px;padding:15px;width:90%;height:200px;"></canvas>
                    </div>
                  </div>
                </div>
            </div>

        <div id="title" class="col-md-6">
                <div class="panel panel-default">
                  <div class="panel-heading">
                        <p id="newOldTitle" style="text-align:center;">New Tickets vs Tickets Closed - This Wk <span><a href="#" class="fui-info-circle"data-toggle="modal"data-target="#basicModal"></a></span></p>
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
          <div id="title" class="col-md-12">
              <div class="panel panel-default">
                <div class="panel-heading">
                      <p id="clientsByHoursTitle" style="text-align:center;">Hours by Client (top 10) - This Week  <span><a href="#" class="fui-info-circle"data-toggle="modal"data-target="#basicModal"></a></span></p>
                </div>
                <div id="title"class="panel-body">
                  <div style="margin-top:10px;margin-bottom:5px;" class="row">

                    <div class="col-md-2">

                    </div>
                    <div class="col-md-3">
                      <input id="daterange3" class="form-control" type="text" name="daterange3"placeholder="Select a Date Range"  />

                        <script type="text/javascript">

                        </script>
                    </div>
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-1">
                    </div>

                  </div>
                  <div style="text-align:center"class="col-md-3">
                    <div stye="width:20em;text-align:left;"  id="clientsByHoursLegend">
                    </div>
                  </div>

                  <div class="col-md-9">
                    <canvas id ="clientsByHours"style="margin-left:-2px;padding:15px;width:90%;height:100px;"></canvas>
                  </div>
                </div>
              </div>
          </div>
      <!--<div id="title" class="col-md-6">
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
          </div>-->
      </div>
        <!--<div class="row">
            <div id="title" class="col-md-12">
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
      </div>-->
      <div class="row">
        <div id="title" class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                    <p id="ticketsByTypeTitle" style="text-align:center;">Hours by Service Type (top 10) - This Week  <span><a href="#" class="fui-info-circle"data-toggle="modal"data-target="#basicModal"></a></span></p>
              </div>
              <div id="title"class="panel-body">
                <div style="margin-top:10px;" class="row">

                  <div class="col-md-2">

                  </div>
                  <div class="col-md-3">
                    <input id="daterange2" class="form-control" type="text" name="daterange2"placeholder="Select a Date Range"  />

                      <script type="text/javascript">

                        </script>
                  </div>


                  <div class="col-md-4">
                    <select id="client2" class="form-control">
                      <option value="one">Choose a Client</option>

                    </select>
                  </div>
                  <div class="col-md-3">
                    <select id="member" class="form-control">
                      <option value="one">Choose a Member</option>

                    </select>
                  </div>
                  <div class="col-md-1">

                  </div>



                </div>
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
    <!--<div id="title" class="col-md-6">
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
        </div>-->
    </div>



        <div id="title" style="margin-top:5px;" class="row">
          <div id="title" class="panel panel-default">
            <div class="panel-heading">
              <p id="ticketChartTitle" style="text-align:center;">Opened Tickets vs Hours Worked Analyzer <span><a href="#" class="fui-info-circle"data-toggle="modal"data-target="#basicModal"></a></span></p>
            </div>
            <div style="margin-top:10px;" class="row">

              <div class="col-md-2">
                <p style="text-align:right;">

                </p>
              </div>
              <div class="col-md-2">
                <input id="daterange" class="form-control" type="text" name="daterange"placeholder="Select a Date Range"  />

                  <script type="text/javascript">

                    </script>
              </div>

              <div class="col-md-4">
                <select id="client" class="form-control">
                  <option value="one">Choose a Client</option>

                </select>
              </div>
              <div class="col-md-3">
                <select id="typeTable" class="form-control">
                  <option value="one">Choose a Service Type</option>

                </select>
              </div>
              <div class="col-md-1">

              </div>



            </div>
          <div style="padding:10px;" id="ticketChartLegend">

          </div>
          <div id="chart">
            <canvas style="padding:10px;width:90%;height:400px;" id="ticketChart">

            </canvas>
          </div>

        </div>
        </div>
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
        <div class="modal fade" id="basicModal2" tabindex="-1" role="dialog" aria-labelledby="basicModal2" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <button type="button"  class="close fui-cross" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title" id="myModalLabel"></h4>
                    </div>
                    <div class="modal-body">
                        <h4>

                        </h4>
                        <h2 id="description">

                        </h2>
                        <div id="modalChart">
                          <canvas id="modalHoursChart" width="300" height="300"></canvas>
                        </div>





                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                </div>
            </div>
          </div>
        </div>
        <div  class="modal fade" id="issueModal2" tabindex="-1" role="dialog" aria-labelledby="issueModal2" aria-hidden="true">
            <div  class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <button type="button"  class="close fui-cross" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title" id="myModalLabel1">Issues, Requests and Ideas Are Welcome</h4>
                    </div>
                    <div id="body" class="modal-body">

                      <form role="form" id="contact-form" class="contact-form">
                                          <div class="row">
                                          <div class="col-md-6">
                                            <div class="form-group">
                                                  <input type="text" class="form-control" name="Name" autocomplete="off" id="name" placeholder="Name">
                                            </div>
                                          </div>
                                              <div class="col-md-6">
                                              <div class="form-group">
                                              <select id="type" class="form-control">
                                              <option value="one">Select request type</option>
                                              <option value="Issue">Issue</option>
                                              <option value="Request">Request</option>
                                              <option value="Idea">Idea</option>
                                              </select>
                                            </div>
                                          </div>
                                          </div>
                                          <div class="row">
                                            <div class="col-md-12">
                                            <div class="form-group">
                                                  <textarea id="description" class="form-control textarea" rows="3" name="Message" id="Message" placeholder="Message"></textarea>
                                            </div>
                                          </div>
                                          </div>
                                          <div class="row">
                                            <div id="alertMessage" class="col-md-6">

                                            </div>
                                          <div class="col-md-6">
                                        <button id="submit_issue"type="submit" class="btn main-btn pull-right">Send message</button>
                                        </div>
                                        </div>
                                      </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                </div>
            </div>
          </div>
        </div>
        <div style="width:auto;" class="modal fade" id="issueModal4" tabindex="-1" role="dialog" aria-labelledby="issueModal4" aria-hidden="true">
            <div  class="modal-dialog4">
                <div class="modal-content">
                    <div class="modal-header">
                    <button type="button"  class="close fui-cross" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title" id="myModalLabel4"></h4>
                    </div>
                    <div id="body" class="modal-body">

                      <div id="allTickets">

                      </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                </div>
            </div>
          </div>
        </div>


</div>
  <script src="../../js/asana.js"></script>
    </body>

</html>
