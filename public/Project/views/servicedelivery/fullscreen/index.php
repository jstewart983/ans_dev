<!doctype html >
<html lang="en">
    <head>
        <meta charset="UTF-8" />

        <meta name="viewport" content="width=device-width, initial-scale=1.0">



        <title>Service Delivery</title>
        <link rel="stylesheet" type="text/css" href="../../../css/demo.css">
        <!--<link rel="stylesheet" type="text/css" href="../../css/razorflow.min.css">-->
        <link rel="stylesheet" type="text/css" href="../../../css/navbar.css">
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../../../libraries/Flat-UI-master/dist/css/flat-ui.min.css">
        <link rel="stylesheet" href="../../../../libraries/Flat-UI-master/fonts/glyphicons/flat-ui-icons-regular.svg">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">
        <link rel="stylesheet" href="../../../libraries/timeline-2.9.1/timeline.css" media="screen" title="no title" charset="utf-8">
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
        <script type="text/javascript" src="../../../js/jquery.min.js"></script>
        <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/2.9.0/moment.min.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <script type="text/javascript" src="../../../js/service_delivery_fullscreen.js"></script>

        <script type="text/javascript" src="../../../js/Chart.js"></script>
        <script type="text/javascript" src="../../../js/legend.js"></script>
        <script type="text/javascript" src="../../../js/oneUp.js"></script>
        <script src="../../../libraries/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>
        <script src="../../../libraries/timeline-2.9.1/timeline.js"></script>
        <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/1/daterangepicker.js"></script>
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/1/daterangepicker-bs3.css" />
        <script>$('.navmenu').offcanvas()</script>

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
        h5{
          color:#696969;
        }

        .container{

          width:95% !important;

        }
        .panel-heading{
          background-color: #fff !important;
          border-bottom:none !important;
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

    <body style="" class="canvas">


    <div style="margin-top:12px;"class="container">
        <!--nav pill row -->




        <!--KPIs-->
        <div id="title" class="row">
            <div class="col-md-2">
                <div class="panel panel-default">
                  <div class="panel-heading">
                        <h5 id="closedTicketsTitle" style="text-align:center;">Tickets Closed - This Wk</h5>
                  </div>
                  <div class="panel-body">

                    <h1 id="ticketsClosed"style="text-align:center;">0</h1>
                    <h7 id="vsTickets"></h7>
                  </div>
                </div>
            </div>
            <div id="title" class="col-md-3">
                <div class="panel panel-default">
                  <div class="panel-heading">
                        <h5 id="openTicketsTitle"  style="text-align:center;">Open Tickets</h5>
                  </div>
                  <div class="panel-body">
                    <div class="row">
                      <div class="col-md-6">
                          <h1 id="openTickets" style="text-align:center;">0</h1>
                      </div>
                      <div class="col-md-6">
                        <h2 id="percentClosed" style="margin-top:30px;text-align:center;">0%</h2>
                        <p style="text-align:center;">
                          Closed by Service Desk
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            <div style="display:none;" id="title" class="col-md-2">
                <div class="panel panel-default">
                  <div class="panel-heading">
                        <h5 id="closedFirstTitle" style="text-align:center;">Closed First Call %</h5>
                  </div>
                  <div class="panel-body">
                    <h1 id="closedFirst"style="text-align:center;">0%</h1>
                  </div>
                </div>
            </div>
            <div id="title" class="col-md-3">
                <div class="panel panel-default">
                  <div class="panel-heading">
                        <h5 id="totalBillableTitle" style="text-align:center;">Billable Hrs - This Wk</h5>
                  </div>
                  <div id="title"class="panel-body">

                    <h1 id="totalBillable"style="text-align:center;">0 hrs</h1>
                    <h7 id="vs"></h7>
                  </div>
                </div>
            </div>
            <div id="title" class="col-md-4">
                <div class="panel panel-default">
                  <div class="panel-heading">
                      <h5 id="avgResponseTitle" style="text-align:center;">Avg Initial Response Time - This Wk</h5>
                  </div>
                  <div id="title"class="panel-body">

                    <h1 id="avgResponse"style="text-align:center;">0 minutes</h1>
                    <h7 id="vsAvgResponse"></h7>
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
                        <p id ="billableDayTitle" style="text-align:center;">Billable Hrs/Member - This Wk</p>
                  </div>
                  <div id="title"class="panel-body">

                      <div style="text-align:center"class="col-md-2">
                      </div>

                    <div id="sup">
                        <canvas id ="billableDay"></canvas>
                    </div>
                  </div>
                </div>
            </div>
            <div id="title" class="col-md-6">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                            <p id="memberTicketsTitle" style="text-align:center;">Tickets Closed By Member - This Wk</p>
                      </div>
                      <div id="title"class="panel-body">

                        <div style="text-align:center"class="col-md-2">

                            </div>

                            <div id="memberTicketsChart">
                              <canvas id ="memberTickets"style="margin-left:-2px;padding:15px;width:90%;height:200px;"></canvas>

                            </div>
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
  <script src="../../../js/asana.js"></script>
    </body>

</html>
