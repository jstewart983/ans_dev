
<!doctype html >
<html  lang="en">
    <head>
        <meta charset="UTF-8" />

        <meta name="viewport" content="initial-scale=1.0, user-scalable=no">



        <title>Service Delivery</title>
        <link rel="stylesheet" type="text/css" href="../css/demo.css">
        <link rel="stylesheet" type="text/css" href="../css/razorflow.min.css">
        <link rel="stylesheet" type="text/css" href="../css/navbar.css">
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="../Flat-UI-master/dist/css/flat-ui.min.css">
        <link rel="stylesheet" href="../Flat-UI-master/fonts/glyphicons/flat-ui-icons-regular.svg">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">



        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/js/bootstrap.min.js"></script>-->
        <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>


        <script type="text/javascript" src="../js/service_delivery.js"></script>
        <script type="text/javascript" src="../js/Chart.js"></script>
        <script type="text/javascript" src="../js/legend.js"></script>
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
            background-color: #fff;
            }
            </style>
    </head>

    <body class="canvas">

<div style="background-color:#fff;" class="navmenu navmenu-default navmenu-fixed-left offcanvas">
      <a class="navmenu-brand" href="#">ANS Intelligence</a>
      <ul class="nav navmenu-nav">
        <li><a href="../">Overview</a></li>
        <li><a href="../solution delivery/">Solution Delivery</a></li>
        <li class="active"><a href="#">Service Delivery</a></li>
        <li><a href="../client services/">Client Services</a></li>
        <li><a href="../resultsphysiotherapy/">Results Physiotherapy</a></li>
        <li><a href="../finance/">Finance</a></li>
      </ul>
      <ul class="nav navmenu-nav">
        <li><a href="#">Admin</a></li>
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
    <div style="margin-top:72px;"class="container">

        <div class="row">
          <div style="border-color:#FF7F50;background-color:#FFA07A;"  id="title" class="panel panel-default">
            <div style="border-color:#FF7F50;background-color:#FF7F50;" class="panel-heading">
              <p id="ticketChartTitle" style="text-align:center;">Tickets Open vs Tickets Closed - Last Year to Last Month <span><a href="#" class="fui-info-circle"data-toggle="modal"data-target="#basicModal"></a></span></p>
            </div>
              <div style="padding:10px;">
                <label style="display:inline;" class="checkbox" for="checkbox1">
            <input type="checkbox" value="" id="checkbox1" data-toggle="checkbox" class="custom-checkbox">
              <span class="icons">
                <span class="icon-unchecked">
                </span>
                <span class="icon-checked">
                </span>
              </span>
            Display All
          </label>
          <label style="display:inline;" class="checkbox" for="checkbox2">
      <input type="checkbox" value="" id="checkbox2" data-toggle="checkbox" class="custom-checkbox">
        <span class="icons">
          <span class="icon-unchecked">
          </span>
          <span class="icon-checked">
          </span>
        </span>
      Application
    </label>
              </div>

          <div style="padding:10px;" id="ticketChartLegend">

          </div>
          <canvas style="padding:10px;width:90%;height:300px;" id="ticketChart">

          </canvas>
        </div>
        </div>


</div>

    </body>

</html>
