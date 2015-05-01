<!doctype html>
<html  lang="en">
    <head>
        <meta charset="UTF-8" />

        <meta name="viewport" content="initial-scale=1.0, user-scalable=no">



        <title>vCIO Performance</title>
        <link rel="stylesheet" type="text/css" href="../../css/demo.css">
        <link rel="stylesheet" type="text/css" href="../../css/razorflow.min.css">
        <link rel="stylesheet" type="text/css" href="../../css/navbar.css">
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../libraries/Flat-UI-master/dist/css/flat-ui.min.css">
        <link rel="stylesheet" href="../../libraries/Flat-UI-master/fonts/glyphicons/flat-ui-icons-regular.svg">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">



        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/js/bootstrap.min.js"></script>-->
        <script src="../../libraries/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>



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
        <!-- Latest compiled and minified JavaScript -->


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
            background-color: #FFA07A;
            }
            </style>

    </head>
    <style type="text/css">



    input {

            border: none;
            outline: none;
            background-color: transparent;
            font-family: inherit;
            font-size: inherit;
        }

        </style>
    <body class="canvas">
<div style="background-color:#fff;"  class="navmenu navmenu-default navmenu-fixed-left offcanvas">
      <a class="navmenu-brand" href="#"><span><img src="../../css/assets/Lightbulb-only-icon-64.png" alt="" /></span> ANS Intelligence</a>
      <ul class="nav navmenu-nav">
        <li><a href="../home/">Home</a></li>
        <li><a href="../solutiondelivery/">Solution Delivery</a></li>
        <li><a href="../managedservices/">Managed Services</a></li>
        <li><a href="../servicedelivery/">Service Delivery</a></li>
        <li class="active"><a href="#">Client Services</a></li>
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


      <div id="logout_button" style="margin-right:15px;margin-top:10px;margin-bottom:auto;text-align:center;float: right; margin-left: 15px;height:53px;">
        <a href="index.php?logout" class="btn btn-sm btn-inverse">Logout</a>

      </div>
    </div>

         <div style="margin-top:52px;"class="container">
        <div class="row">
            <div style="border-top:1px solid #ddd;border-left:1px solid #ddd;border-right:1px solid #ddd;border-bottom:1px solid #ddd;border-radius: 4px;background-color:#fff;"class="col-md-4">
                <div style="margin-left:35px;padding:5px;">
                    <ul class="nav nav-pills">
                        <li role="presentation" class="active"><a style="background-color:#F78E1E;"href="#">Sales Dashboard</a></li>
                        <!--<li role="presentation"><a style="color:#414141;"href="serice desk/">Pipeline</a></li>-->
                        <li role="presentation"><a style="color:#414141;"href="clientanalysis/">Client Analysis</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-5"></div>
            <div class="col-md-2">
              <div class="dropdown">
                <a id="pastDueCounter" href="#pastDueOpps"style="background-color:#F08080;"class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">? past due Opps
                </a>



              </div>
            </div>
        </div>

        <!--KPIs-->
        <div style="margin-top:10px;" class="row">
        <!--<div class="col-md-2"></div>-->
            <div id="title" class="col-md-3">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <p id="projectRev1Title" style="text-align:center;">Projects<br />This Week <span><a href="#" class="fui-info-circle"data-toggle="modal"data-target="#basicModal"></a></span></p>
                  </div>
                  <div class="panel-body">
                    <h1 style="text-align:center;" id="projectRev1">$0</h1>
                  </div>
                </div>
            </div>
            <div id="title" class="col-md-3">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <p id="productRev1Title" style="text-align:center;">Products<br />This Week <span><a href="#" class="fui-info-circle"data-toggle="modal"data-target="#basicModal"></a></span></p>
                  </div>
                  <div class="panel-body">
                    <h1 style="text-align:center;" id="productRev1">$0</h1>
                  </div>
                </div>
            </div>
            <!--<div class="col-md-2">
                <div class="panel panel-default">
                  <div class="panel-heading">
                        <p style="text-align:center;">MRR - This Week</p>
                  </div>
                  <div class="panel-body">
                    <h1 style="text-align:center;" id="mrrRev1">$450</h1>
                  </div>
                </div>
            </div>-->
            <div id="#title" class="col-md-3">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <p id="projectRev2Title" style="text-align:center;">Projects<br />This Month <span><a href="#" class="fui-info-circle"data-toggle="modal"data-target="#basicModal"></a></span></p>
                  </div>
                  <div class="panel-body">
                    <h1 style="text-align:center;"id="projectRev2">$0</h1>
                  </div>
                </div>
            </div>
            <div id="title" class="col-md-3">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <p id="productRev2Title" style="text-align:center;">Products<br />This Month <span><a href="#" class="fui-info-circle"data-toggle="modal"data-target="#basicModal"></a></span></p>
                  </div>
                  <div class="panel-body">
                    <h1 style="text-align:center;"id="productRev2">$0</h1>
                  </div>
                </div>
            </div>
            <!--<div class="col-md-2">
                <div class="panel panel-default">
                  <div class="panel-heading">
                        <p style="text-align:center;">MRR - This Month</p>
                  </div>
                  <div class="panel-body">
                    <h1 style="text-align:center;"id="mrrRev2">$450</h1>
                  </div>
                </div>
            </div>
        </div>-->

      </div>
        <!--End KPI Row-->

        <!--Sales by Month-->
        <div class="row">
            <div id="title" class="col-md-6">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <p id="salesByVcioTitle" style="text-align:center;">Sales by vCIO<br />This Month <span><a href="#" class="fui-info-circle"data-toggle="modal"data-target="#basicModal"></a></span></p>
                  </div>
                  <div class="panel-body">
                    <div class="row">
                      <div style="text-align:center"class="col-md-2">
                        <div  id="salesByVcioLegend">
                        </div>
                      </div>
                      <div class="col-md-8">
                        <canvas id ="salesByVcio"style="width:100%;height:100%;"></canvas>

                      </div>
                    </div>
                    <div class="row"><div class="col-md-12" id="salesByVcioTable"><div style="width:100%;padding:0px;" class=" panel panel-default"><div style="width:100%;" class="panel-body"><table id="clientTable" style="width:100%;" class="table table-hover"><thead><tr><th>vCIO</th><th>Total Sales</th></tr></thead><tbody class="rowlink"><tr><td></td><td></td></tr><tr><td></td><td></td></tr><tr><td></td><td></td></tr><tr><td></td><td></td></tr><tr><td></td><td></td></tr></tbody></table></div></div></div></div>
                  </div>
                </div>
            </div>

        <div id="title" class="col-md-6">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <p id="salesByClientTitle" style="text-align:center;">Total Sales by Client<br />This Year (top 10) <span><a href="#" class="fui-info-circle"data-toggle="modal"data-target="#basicModal"></a></span></p>

                  </div>
                  <div class="panel-body">
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                        <canvas id ="salesByClient"height="auto"width="auto"></canvas>

                        </div>
                      </div>
                      <div class="row">

                            <div class="col-md-12"id ="salesByClientTable"><div style="width:100%;padding:0px;" class=" panel panel-default"><div style="width:100%;" class="panel-body"><table id="clientTable" style="width:100%;" class="table table-hover"><thead><tr><th>Client</th><th>Total Sales</th></tr></thead><tbody class="rowlink"><tr><td></td><td></td></tr><tr><td></td><td></td></tr><tr><td></td><td></td></tr><tr><td></td><td></td></tr><tr><td></td><td></td></tr></tbody></table></div></div></div></div>

                      </div>
                      <!--<div style="text-align:center"class="col-md-2">
                          <div style="padding:5px;" id="salesByClientLegend">
                          </div>
                        </div>-->
                  </div>
                </div>
            </div>

        <div class="row">
          <div class="panel panel-default">
                  <div class="panel-heading">
                        <p style="text-align:center;">Past Due Opps</p>

                  </div>
                  <div class="panel-body">
                    <div id="pastDueOpps"class="col-md-8">

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
</div>
        <script src="../../js/legend.js"></script>
      <script src="../../js/vcio.js"></script>
    </body>

</html>
