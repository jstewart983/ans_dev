<!doctype html >
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
        <title>Field Services</title>
        <link rel="stylesheet" type="text/css" href="../../css/demo.css">
        <link rel="stylesheet" type="text/css" href="../../css/razorflow.min.css">
        <link rel="stylesheet" type="text/css" href="../../css/navbar.css">
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
        <!--<link rel="stylesheet" href="../../libraries/css-toggle/css/base.css">-->
        <link rel="stylesheet" href="../../libraries/css-toggle/css/style.css">

        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">


        <link rel="stylesheet" href="../../libraries/Flat-UI-master/dist/css/flat-ui.min.css">
        <link rel="stylesheet" href="../../libraries/Flat-UI-master/fonts/glyphicons/flat-ui-icons-regular.svg">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
          <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/1/daterangepicker-bs3.css" />


        <script type="text/javascript" src="../../libraries/css-toggle/js/html5shiv.min.js"></script>

        <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/2.9.0/moment.min.js"></script>
        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../../js/Chart.js"></script>
        <script type="text/javascript" src="../../js/legend.js"></script>
        <script type="text/javascript" src="../../js/oneUp.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>
        <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/1/daterangepicker.js"></script>

        <script>$('.navmenu').offcanvas()</script>
          <script type="text/javascript" src="../../js/date_extensions.js"></script>
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
				.legend{
					display:inline-block !important;
				}
				.title{
					display:inline-block !important;
				}
				.hidden{
					display: none;
				}
        </style>
    <body class="canvas">
<div style="background-color:#fff;" class="navmenu navmenu-default navmenu-fixed-left offcanvas">
      <a class="navmenu-brand" href="#"><span><img src="../../../css/assets/Lightbulb-only-icon-64.png" alt="" /></span> ANS Intelligence</a>
      <ul class="nav navmenu-nav">
        <li><a href="../home/">Home</a></li>
        <li><a href="../solutiondelivery/">Solution Delivery</a></li>
        <li><a href="../managedservices/">Managed Services</a></li>
        <li><a href="../servicedelivery/">Service Delivery</a></li>
        <li class="active"><a href="#">Field Services</a></li>
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


        <!--KPIs-->
        <div id="title"style="margin-top:30px;" class="row">
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
            <div id="title" class="col-md-8">
                <div class="panel panel-default">

                  <div id="jsStats"class="panel-body">

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
          <div id="title" class="col-md-12">
              <div class="panel panel-default">
                <div id="dude" class="panel-heading">
                      <p id ="billableDayTitle" style="text-align:center;">Billable Hrs/Member - This Wk <span><a href="#" class="fui-info-circle"data-toggle="modal"data-target="#basicModal"></a></span></p>
                </div>
                <div id="title"class="panel-body">
                  <div style="margin-top:10px;margin-bottom:5px;" class="row">
                    <div class="col-md-2">
                    </div>
                      <div class="col-md-2">
                        <input id="daterange4" class="form-control" type="text" name="daterange4"placeholder="Select a Date Range"  />

                          <script type="text/javascript">

                          </script>
                      </div>
                      <div class="col-md-5">
                      </div>
                      <div class="col-md-3">
                      </div>
                      <div class="col-md-1">
                      </div>

                  </div>
                    <div style="text-align:center"class="col-md-2">
                    </div>
                  <div id="sup">
                      <canvas id ="billableDay"style="margin-left:-2px;padding:15px;width:90%;height:200px;"></canvas>
                  </div>
                </div>
              </div>
          </div>
          </div>
          <div class="row">

                <div class="panel panel-default">
                  <div id="dude" class="panel-heading">
                        <p id ="utilizationTitle" style="text-align:center;">Utilization by Member <span><a href="#" class="fui-info-circle"data-toggle="modal"data-target="#basicModal"></a></span></p>
                  </div>
                  <div id="title"class="panel-body">
                    <div style="margin-top:10px;margin-bottom:5px;" class="row">
                      <div class="col-md-2">
                      </div>
                        <div class="col-md-2">
                          <input id="daterange5" class="form-control" type="text" name="daterange5"placeholder="Select a Date Range"  />

                            <script type="text/javascript">

                            </script>
                        </div>
                        <div class="col-md-1">

                        </div>
                        <div class="col-md-8">
                          <div class="row demo-navigation">
                            <div class="col-xs-6">
                              <div class="btn-toolbar">
                                <div class="btn-group">
                                  <a class="btn btn-primary" id="thisYear" >This Year</a>
                                  <a class="btn btn-primary" id="thisQuarter" >This Quarter</a>
                                  <a class="btn btn-primary" id="thisMonth" >This Month</a>
                                  <a class="btn btn-primary active" id="thisWeek" >This Week</a>
                                </div>
                              </div> <!-- /toolbar -->
                        </div>
                        <div class="col-md-1">
                          <button type="button" class="btn btn-default" name="button" id="exportToCSV">Export to CSV <span class="fa fa-text"></span></button>
                        </div>

                    </div>
                      <div style="text-align:center"class="col-md-2">
                      </div>
                        </div>
                      </div>
                        <div id="utilTable" class="row">
                          <div  class="col-md-6 col-md-offset-3">
                            <div id="utilization">

                              <table id="utilizationTable" class="table table-striped table-hover">
                                <thead>
                                  <tr>
                                    <th  style="text-align:left;">Member ID</th>
                                    <th  style="text-align:center;">Actual Hours</th>
                                    <th  style="text-align:center;">Utilization</th>
                                  </tr>
                                </thead>
                                <tbody id="utilizationTableBody">
                                </tbody>
                              </table>
                              <div style="display:none;" id="loading" class="col-md-6 col-md-offset-4">
                                <img src="../../css/assets/spiffygif_148x148.gif" alt="" />
                              </div>
                            </div>
                          </div>
                        </div>




            </div>
            </div>
          </div>
					<div class="panel panel-default">
						<div class="panel-heading">
							<p style="text-align:center;" id="ticketCountTitle">Ticket Count by # of Days Open</p>
						</div>
						<div class="panel-body">
					<div id="chart" class="row">
						<div class="col-md-12">
							<canvas  id="canvas" width="700" height="200"></canvas>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 col-md-offset-5">
							<div id="legend">
							</div>
						</div>
					</div>
					<div  class="row">
						<div class="col-md-12">
							<button style="width:100%;text-align:center;" class="hidden btn btn-default" id="tableShow" type="button">Ticket Detail <span class="fa fa-arrow-down"></span></button>
								<button style="width:100%;text-align:center;" id="tableHide" class="hidden btn btn-default"  type="button">Ticket Detail <span class="fa fa-arrow-up"></span></button>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<div id="table">

							</div>
						</div>
					</div>
					</div>
					</div>
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
        <div class="row">
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

        </div>
      <!--  <div class="row">
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

    </div>
        <script type="text/javascript" src="../../js/asana.js"></script>

        <script type="text/javascript" src="../../js/utilization.js"></script>
    </body>

</html>
