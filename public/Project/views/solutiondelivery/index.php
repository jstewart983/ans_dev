
<!doctype html >
<html  lang="en">
    <head>
        <meta charset="UTF-8" />

        <meta name="viewport" content="initial-scale=1.0, user-scalable=no">



        <title>Solution Delivery</title>
        <link rel="stylesheet" type="text/css" href="../../css/demo.css">
        <link rel="stylesheet" type="text/css" href="../../css/razorflow.min.css">
        <link rel="stylesheet" type="text/css" href="../../css/navbar.css">
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../libraries/Flat-UI-master/dist/css/flat-ui.min.css">
        <link rel="stylesheet" href="../../libraries/Flat-UI-master/fonts/glyphicons/flat-ui-icons-regular.svg">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">

        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">


        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/js/bootstrap.min.js"></script>-->
        <script src="../../libraries/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>


        <script type="text/javascript" src="../../js/solution_delivery.js"></script>
        <script type="text/javascript" src="../../js/Chart.js"></script>
        <script type="text/javascript" src="../../js/legend.js"></script>
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
    <style type="text/css">
    @media screen and (max-width: 999px) {
  #logout_button {
    visibility: hidden;
    clear: both;
    float: left;
    margin: 10px auto 5px 20px;
    width: 28%;
    display: none;
  }
}
    .hidden{
      display:none;
    }
    .opp{
      background-color:#282828;
    }

    .navmenu .navmenu-default{

        background-color: #fff;

        }

    input {

            border: none;
            outline: none;
            background-color: transparent;
            font-family: inherit;
            font-size: inherit;
        }

        </style>
    <body class="canvas">
      <div style="background-color:#fff;" class="navmenu navmenu-default navmenu-fixed-left offcanvas">
            <a class="navmenu-brand" href="#"><span><img src="../../css/assets/Lightbulb-only-icon-64.png" alt="" /></span> ANS Intelligence</a>
            <ul class="nav navmenu-nav">
              <li><a href="../home/">Home</a></li>
              <li class="active"><a href="../solutiondelivery/">Solution Delivery</a></li>
              <li><a href="../managedservices/">Managed Services</a></li>
              <li><a href="#">Service Delivery</a></li>
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
        <!--<div class="row">
            <div style="border-top:1px solid #ddd;border-left:1px solid #ddd;border-right:1px solid #ddd;border-bottom:1px solid #ddd;border-radius: 4px;background-color:#fff;"class="col-md-6">
                <div style="padding:5px;">
                    <ul class="nav nav-pills">
                        <li role="presentation" class="active"><a style="background-color:#F78E1E;"href="#">Overview</a></li>
                        <li role="presentation"><a style="color:#414141;"href="#">Project Team</a></li>
                        <li role="presentation"><a style="color:#414141;"href="#">Managed Services</a></li>
                        <li role="presentation"><a style="color:#414141;"href="#">Network Ops Dashboard</a></li>
                    </ul>
                </div>
            </div>
        </div>-->

                <!--KPIs-->
        <div style="margin-top:30px;" class="row">
            <div class="col-md-2">
                <div class="panel panel-default">
                  <div class="panel-heading">
                        <p style="text-align:center;">Open B.O.B. Tickets</p>
                  </div>
                  <div class="panel-body">
                    <h2 style="text-align:center;">17,000</h2>
                  </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="panel panel-default">
                  <div class="panel-heading">
                        <p style="text-align:center;">Hrs Executed - This Week</p>
                  </div>
                  <div class="panel-body">
                    <h2 style="text-align:center;">67 hrs</h2>
                  </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="panel panel-default">
                  <div class="panel-heading">
                        <p style="text-align:center;">Utilization %</p>
                  </div>
                  <div class="panel-body">
                    <h2 style="text-align:center;">78%</h2>
                  </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="panel panel-default">
                  <div class="panel-heading">
                        <p style="text-align:center;">Hrs Executed- This Year</p>
                  </div>
                  <div class="panel-body">
                    <h2 style="text-align:center;">800 hrs</h2>
                  </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="panel panel-default">
                  <div class="panel-heading">
                        <p style="text-align:center;">Alerts Today</p>
                  </div>
                  <div class="panel-body">
                    <h2 style="text-align:center;">600</h2>
                  </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="panel panel-default">
                  <div class="panel-heading">
                        <p style="text-align:center;">Hours in Queue</p>
                  </div>
                  <div class="panel-body">
                    <h2 style="text-align:center;">160 hrs</h2>
                  </div>
                </div>
            </div>
        </div>
        <!--Billable hours and new tickets vs closed tickets this week charts-->
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                  <div class="panel-heading">
                        <p style="text-align:center;">Open Projects</p>
                  </div>
                  <div class="panel-body">
                    <table style='width:100%;' class='table table-hover'>

                              <tr>
                              <th>Project ID</th>
                              <th>Client Name</th>
                              <th>Est. Close Date</th>
                              <th>Est. Hours Left</th>
                              </tr>
                              <tbody  class='rowlink'>
                              <tr>
                                <td>Windstream Cutover</td>
                                <td>Results</td>
                                <td>3/15/15</td>
                                <td>24 hrs</td>
                              </tr>
                              <tr>
                                <td>Exchange Migration</td>
                                <td>Myers Co.</td>
                                <td>3/19/15</td>
                                <td>5 hrs</td>
                              </tr>
                              <tr>
                                <td>Server Virtualization</td>
                                <td>Athens Federal</td>
                                <td>4/1/15</td>
                                <td>40 hrs</td>
                              </tr>
                              <tr>
                                <td>Onboarding</td>
                                <td>Rainey Kizer</td>
                                <td>3/10/15</td>
                                <td>12 hrs</td>
                              </tr>
                            </tbody>
                          </table>
                  </div>
                </div>
            </div>

        <div class="col-md-6">
                <div class="panel panel-default">
                  <div class="panel-heading">
                        <p style="text-align:center;">Hrs/day - This Week</p>
                  </div>
                  <div class="panel-body">
                    <canvas id="hrsDay" width="auto" height="auto"></canvas>
                  </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                  <div class="panel-heading">
                        <p style="text-align:center;">Hrs/member - This Week</p>
                  </div>
                  <div class="panel-body">
                  <div style="text-align:center"class="col-md-2">
                          <div style="padding:5px;" id="hrsMemberLegend">
                          </div>
                        </div>
                    <canvas id="hrsMember" width="auto" height="auto"></canvas>
                  </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-default">
                  <div class="panel-heading">
                        <p style="text-align:center;">Hours by Type - This Year</p>
                  </div>
                  <div class="panel-body">
                    <div style="text-align:center"class="col-md-2">
                          <div style="padding:5px;" id="hrsTypeLegend">
                          </div>
                        </div>
                    <canvas id="hrsType" width="auto" height="auto"></canvas>
                  </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                  <div class="panel-heading">
                        <p style="text-align:center;">Active Project Queue (hrs)</p>
                  </div>
                  <div class="panel-body">
                  <div style="text-align:center"class="col-md-2">
                          <div style="padding:5px;" id="queueLegend">
                          </div>
                        </div>
                    <canvas id="queue" width="700" height="auto"></canvas>
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
                        <h4 style="text-align:center;">
                          Just so you know, this data is not real.
                        </h4>


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
    <script src="../../js/asana.js"></script>
    </body>

</html>
