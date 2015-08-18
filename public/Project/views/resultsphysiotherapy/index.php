<!doctype html >
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Results Physiotherapy Intelligence</title>
        <link rel="stylesheet" type="text/css" href="../../css/demo.css">
        <link rel="stylesheet" type="text/css" href="../../css/razorflow.min.css">
        <link rel="stylesheet" type="text/css" href="../../css/navbar.css">
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../libraries/Flat-UI-master/dist/css/flat-ui.min.css">
        <link rel="stylesheet" href="../../libraries/Flat-UI-master/fonts/glyphicons/flat-ui-icons-regular.svg">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">
        <link rel="stylesheet" href="../../libraries/timeline-2.9.1/timeline.css" media="screen" title="no title" charset="utf-8">
        <script type="text/javascript">
  window.heap=window.heap||[],heap.load=function(t,e){window.heap.appid=t,window.heap.config=e;var a=document.createElement("script");a.type="text/javascript",a.async=!0,a.src=("https:"===document.location.protocol?"https:":"http:")+"//cdn.heapanalytics.com/js/heap-"+t+".js";var n=document.getElementsByTagName("script")[0];n.parentNode.insertBefore(a,n);for(var o=function(t){return function(){heap.push([t].concat(Array.prototype.slice.call(arguments,0)))}},p=["clearEventProperties","identify","setEventProperties","track","unsetEventProperty"],c=0;c<p.length;c++)heap[p[c]]=o(p[c])};
  heap.load("3593988708");
</script>
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
        <script type="text/javascript" src="../../js/jquery.min.js"></script>
        <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/2.9.0/moment.min.js"></script>
        <script type="text/javascript" src="../../js/service_delivery.js"></script>
        <script type="text/javascript" src="../../js/results.js"></script>
        <script type="text/javascript" src="../../js/Chart.js"></script>
        <script type="text/javascript" src="../../js/legend.js"></script>
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
    </head>

    <body class="canvas">
<div style="background-color:#fff;" class="navmenu navmenu-default navmenu-fixed-left offcanvas">
      <a class="navmenu-brand" href="#"><span><img src="../../css/assets/Lightbulb-only-icon-64.png" alt="" /></span> ANS Intelligence</a>
      <ul class="nav navmenu-nav">
        <li><a href="../home/">Home</a></li>
        <li><a href="../solutiondelivery/">Solution Delivery</a></li>
        <li><a href="../managedservices/">Managed Services</a></li>
        <li><a href="../servicedelivery/">Service Delivery</a></li>
        <li><a href="../fieldservices/">Field Services</a></li>
        <li><a href="../clientservices/">Client Services</a></li>
        <li class="active"><a href="../resultsphysiotherapy/">Results Physiotherapy</a></li>
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
               <div class="row">
            <div style="border-top:1px solid #ddd;border-left:1px solid #ddd;border-right:1px solid #ddd;border-bottom:1px solid #ddd;border-radius: 4px;background-color:#fff;"class="col-md-4">
                <div style="padding:5px;">
                    <ul class="nav nav-pills">
                        <li role="presentation" class="active"><a style="background-color:#F78E1E;"href="#">Dashboard</a></li>
                        <li role="presentation"><a style="color:#414141;"href="http://intelligence.ansolutions.com/routes/siteanalysis/">Site Analysis</a></li>
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
        <!--nav pill row -->
        <!--<div class="row">
          <div class="col-md-3">

          </div>
          <div class="col-md-3">
            <p style="text-align:right;">
              Select a date range:
            </p>
          </div>
          <div class="col-md-3">
            <input class="form-control" type="text" name="daterange" value="01/01/2015 - 01/31/2015" />

              <script type="text/javascript">
                $(function() {
                    $('input[name="daterange"]').daterangepicker();
                    });
                    </script>
          </div>
          <div class="col-md-3">

          </div>


        </div>-->

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
                  <div id="sup">
                      <canvas id ="billableDay"style="margin-left:-2px;padding:15px;width:90%;height:200px;"></canvas>
                  </div>
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
            <div id="title" class="col-md-12">
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




         <div style="margin-top:11px;"class="row">




               <div class="col-md-2">
                <div class="panel panel-default">
                  <div class="panel-heading">
                        <p style="text-align:center;">Average Tickets/Day</p>
                  </div>
                  <div id="title"class="panel-body">
                    <h1 style="text-align:center;"id="avgTickets">0</h1>
                  </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="panel panel-default">
                  <div class="panel-heading">
                        <p id="avgTickets"style="text-align:center;">Workstations/Servers</p>

                  </div>
                  <div style="color:#3CB371;">
                    <div  class="panel-body">
                    <div id="compServ" class="row">
                      <h1 id="comp" style="text-align:center;"class="col-xs-6">0<span><img src="../../css/assets/icons/Server.svg"/></span></h1>
                      <h1 id="serv" style="text-align:center;"class="col-xs-6">0<span><img src="../../css/assets/icons/Computer.svg"/></span></h1>
                    </div>

                  </div>
                  </div>

                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                  <div class="panel-heading">
                        <p id="avgTickets"style="text-align:center;">Locations Managed</p>

                  </div>
                  <div style="color:#3CB371;">
                    <div  class="panel-body">

                      <h1 id="locations"style="text-align:center;">0<span><img src="../css/assets/building.svg"/></span></h1>



                  </div>
                  </div>

                </div>
            </div>
            <!--<div style="displayclass="col-md-4">
                <div class="panel panel-default">
                  <div class="panel-heading">
                        <p id="mrrTitle"style="text-align:center;">Last Month's MRR</p>

                  </div>
                  <div>
                    <div id="title" class="panel-body">

                      <h1 id="mrr"style="text-align:center;">$0</h1>



                  </div>
                  </div>

                </div>
            </div>-->


        </div>

        <!--<div style="margin-bottom:-5px;z-index:-1;" id="timelineSection"class="btn-group" role="group" aria-label="...">
          <button id="service" type="button" class="btn btn-default service active">Service</button>
          <button id="opps"  type="button" class="btn btn-default opps">Opportunities</button>
        </div>-->
        <!--<div id="timelineSection"class="row hidden">
          <div class="col-md-4">

          </div>
          <div class="col-md-4">
            <div id="toggleHistory" style="width:100%;text-align:center;" class="btn-group" role="group" aria-label="...">
              <button style="text-align:center;" id="service" type="button" class="btn btn-default service active">Service</button>
              <button style="text-align:center;" id="opps"  type="button" class="btn btn-default opps">Opportunities</button>
            </div>
          </div>
          <div class="col-md-4">

          </div>
        </div>-->




        <div style="margin-top:11px;" class="row">


              <div id="wherethestuffis" class="col-lg-6">
               <div class="panel panel-default">
                <div style="text-align:center;"class="panel-heading">
                  <p>Service Type - by Ticket Count</p><p>(top 10)</p>
                </div>
                  <div class="panel-body">
                    <div id="serviceTypeLegend">

                    </div>
                    <canvas id="serviceType" style="height:200px;width:500px;"></canvas>
                 </div>
                </div>
              </div>

                 <!--<div id="wherethestuffis" class="col-lg-3">
                         <div class="panel panel-default">
                      <div style="text-align:center;"class="panel-heading">
                       <p>Hours - by Service Type</p><p>(top 10)</p>
                      </div>
                      <div class="panel-body">

                             <canvas id="serviceType2" style="height:200px;width:auto;"></canvas>
                         </div>
                    </div>
                </div>-->
                <div id="wherethestuffis" class="col-lg-6">
                    <div class="panel panel-default">
                      <div style="text-align:center;"class="panel-heading">
                       <p>OS Breakdown</p>(top 10)<p>
                       </p>
                      </div>
                      <div class="panel-body">

                          <canvas id="osType" height="200" style="width:500px;"></canvas>
                      </div>
                    </div>
                </div>
            </div>
            <div id="timelineSection2" style="margin-top:11px;"class="row">
                <div class="panel panel-default">
                  <div style="text-align:center;"class="panel-heading">
                   <p>Opportunity Timeline</p>
                  </div>
                  <div  class="panel-body">
                    <div  id="timeline2" class="col-md-12">
                    </div>
                  </div>
                </div>
            </div>
            <div id="timelineSection1" style="margin-top:11px;"class="row">


                <div class="panel panel-default">
                  <div style="text-align:center;"class="panel-heading">
                   <p>Service Timeline</p>

                  </div>
                  <div  class="panel-body">

                    <div  id="timeline1" class="col-md-12">

                    </div>

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
<div style="width:auto;" class="modal fade" id="issueModal2" tabindex="-1" role="dialog" aria-labelledby="issueModal2" aria-hidden="true">
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
<div  class="modal fade" id="siteChart" tabindex="-1" role="dialog" aria-labelledby="siteChart" aria-hidden="true">
    <div  class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button"  class="close fui-cross" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title" id="myModalLabel1">Issues, Requests and Ideas Are Welcome</h4>
            </div>
            <div id="body" class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

        </div>
    </div>
  </div>
</div>

        <!-- Don't delete this div. This is where RazorFlow will get rendered. -->
</div>
<script src="../../js/asana.js"></script>
    </body>

</html>
