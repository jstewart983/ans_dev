<!doctype html >
<html lang="en">
    <head>
        <meta charset="UTF-8" />

        <meta name="viewport" content="width=device-width, initial-scale=1.0">



        <title>Welcome</title>
        <link rel="stylesheet" type="text/css" href="../../css/demo.css">

        <link rel="stylesheet" type="text/css" href="../../css/navbar.css">
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="../../libraries/Flat-UI-master/dist/css/flat-ui.min.css">
        <link rel="stylesheet" href="../../libraries/Flat-UI-master/fonts/glyphicons/flat-ui-icons-regular.svg">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">
        <link href='http://fonts.googleapis.com/css?family=Codystar' rel='stylesheet' type='text/css'>
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
        <script type="text/javascript" src="../../js/jquery.min.js"></script>
        <!--<script type="text/javascript" src="js/overview.js"></script>-->
        <script type="text/javascript" src="../../js/Chart.js"></script>
        <script type="text/javascript" src="../../js/legend.js"></script>

        <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/globalize/0.1.1/globalize.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>
        <script>$('.navmenu').offcanvas()</script>
        <script>

        </script>
        <style media="screen">
          .container{
            width:
          }
          .panel-default{
            transition: border-color 1s ease;

-webkit-transition: border-color 1s ease;
     -moz-transition: border-color 1s ease;
       -o-transition: border-color 1s ease;
      -ms-transition: border-color 1s ease;
          transition: border-color 1s ease;

}



          .panel-default:hover{

            border-color:#f78e1e!important;
            color:#f78e1e!important;
          }
        </style>
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
    <body id="sup" class="canvas">
      <div style="background-color:#fff;" class="navmenu navmenu-default navmenu-fixed-left offcanvas">
            <a class="navmenu-brand" href="#">ANS Intelligence</a>
            <ul class="nav navmenu-nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="../solutiondelivery/">Solution Delivery</a></li>
              <li><a href="../servicedelivery/">Service Delivery</a></li>
              <li><a href="../clientservices/">Client Services</a></li>
              <li><a href="../resultsphysiotherapy/">Results Physiotherapy</a></li>
              <li><a href="../sales/">Sales</a></li>
              <li><a href="../finance/">Finance</a></li>

            </ul>
            <ul class="nav navmenu-nav">
              <li><a href="../admin/">Admin</a></li>
            </ul>
          </div>
          <div style="background-color:#fff;" class="navbar navbar-default navbar-fixed-top">
            <button style="display: block;float: left; margin-left: 15px;" type="button" class="navbar-toggle" data-toggle="offcanvas" data-target=".navmenu" data-canvas="body">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>



            <div id="logout_button" style="margin-right:15px;margin-top:10px;margin-bottom:auto;text-align:center;float: right; margin-left: 15px;height:53px;">
              <a href="index.php?logout" class="btn btn-sm btn-inverse">Logout</a>

            </div>
          </div>
      <div style="margin-top:62px;"class="container">
        <div style="margin-top:20px;width:200px;display:block;margin-left:auto;margin-right:auto;">
          <img id="ans"style="height:auto;width:100%;"  src="http://www.ansolutions.com/wp-content/themes/ANS/images/header-logo.jpg" alt="ans" />

        </div>
        <div style="position:relative;z-index:999;"class="row">
          <div class="col-md-12">
          </div>
        </div>
        <div style="position:relative;z-index:999;"class="row">
          <div class="col-md-12">
            <h1 style="font-size:50px;text-align:center;"><span id="hello">Hello <?php echo $_SESSION['user_name']; ?>.</span> <span id="welcome" >Welcome to </span><span id="intel">ANS Intelligence</span></h1>
          </div>
          <div class="col-md-12">
            <p id="choose"style="text-align:center;">
              Pick a dashboard
            </p>
          </div>
        </div>
        <div style="position:relative;z-index:999;margin-top:5px;"class="row">
          <div class="col-md-2">

          </div>
          <div id="choice1" class="col-md-4">
            <a href="../solutiondelivery/">
              <div class="panel panel-default">
                <div class="panel-body">
                  <h5 style="text-align:center;">Solution Delivery <span class="glyphicon glyphicon-dashboard"></span></h5>
                  <p style="font-size:10px;text-align:center;">
                    <b>Build Status</b> = under construction
                  </p>
                </div>
            </div>
          </a>
          </div>
          <div id="choice2" class="col-md-4">
            <a href="../servicedelivery/">
              <div class="panel panel-default">
                <div class="panel-body">
                  <h5 class="name" style="text-align:center;">Service Delivery <span class="glyphicon glyphicon-dashboard"></span></h5>
                  <p class="name" style="font-size:10px;text-align:center;">
                    <b>Build Status</b> = QA
                  </p>
                </div>
            </div>
          </a>
          </div>
          <div class="col-md-2">

          </div>
        </div>
        <div style="position:relative;z-index:999;" class="row">
          <div class="col-md-2">

          </div>
          <div id="choice3" class="col-md-4">
            <a href="../clientservices/">
              <div class="panel panel-default">
                <div class="panel-body">
                  <h5 style="text-align:center;">Client Services <span class="glyphicon glyphicon-dashboard"></span></h5>
                  <p style="font-size:10px;text-align:center;">
                    <b>Build Status</b> = under construction - almost to QA
                  </p>
                </div>
            </div>
          </a>
          </div>
          <div id="choice4" class="col-md-4">
            <a href="../resultsphysiotherapy/">
              <div class="panel panel-default">
                <div class="panel-body">
                  <h5 style="text-align:center;">Results Physiotherapy <span class="glyphicon glyphicon-dashboard"></span></h5>
                  <p style="font-size:10px;text-align:center;">
                    <b>Build Status</b> = QA
                  </p>
                </div>
            </div>
          </a>
          </div>
          <div class="col-md-2">

          </div>
        </div>
              <div style="opacity:.9;" class="row">
                <div class="col-md-12">
                  <canvas id="barChart" style="margin-left:-10px;width:100%;" height="100"></canvas>
                </div>
              </div>
            </div>

          </body>
          <script charset="utf-8">
          $("#sup").hide().fadeIn(800);
            /*$("#ans").hide().fadeIn(1000);
            $("#hello").hide().fadeIn(2000);
            $("#intel").hide().fadeIn(2200);
            $("#choose").hide().fadeIn(2100);
            $("#welcome").hide().fadeIn(2700);
            $("#choice1").hide().fadeIn(2000);
            $("#choice2").hide().fadeIn(2200);
            $("#choice3").hide().fadeIn(2400);
            $("#choice4").hide().fadeIn(2600);*/
            //$("#barChart").hide().fadeIn(2900);

            var data = {
                labels:["1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30","31","32","33","34","35","36"],
                datasets: [
                    {

                        fillColor: "rgba(220,220,220,0.9)",
                        strokeColor: "rgba(220,220,220,0.9)",
                        highlightFill: "rgba(220,220,220,0.9)",
                        highlightStroke: "rgba(220,220,220,.9)",
                        data:[67,74,32,35,25,26,20,15,27,20,56,77,20,30,10,90,45,67,20,12,85,90,50,67,32,79,90,70,80,20,20,15,27,20,56,77],
                        label: "This data"
                    },
                    {

                        fillColor: "rgba(160,120,316,0.9)",
                        strokeColor: "rgba(160,120,316,0.9)",
                        highlightFill: "rgba(160,120,316,0.9)",
                        highlightStroke: "rgba(160,120,316,0.9)",
                        data:[10,20,40,30,15,67,74,32,35,25,26,57,81,14,30,30,70,20,90,100,45,30,25,76,67,74,32,35,25,26,20,15,27,20,56,77],
                        label: "That data"
                    }
                ]
            };


            var ctx = document.getElementById("barChart").getContext("2d");
            var myNewChart = new Chart(ctx).Bar(data,{scaleShowGridLines:false,scaleShowVerticalLines: false,scaleShowHorizontalLines:false});
            console.log(data.labels.length);
            /*setInterval(function() {

              // Get a random index point
              var indexToUpdate = Math.floor(Math.random() * data.labels.length-1)+1;


              myNewChart.datasets[1].bars[indexToUpdate].value = Math.floor(Math.random()*80)+1;
              myNewChart.datasets[0].bars[indexToUpdate].value = Math.floor(Math.random()*80)+1;


              myNewChart.update();
              //myNewChart.addData(Math.floor(Math.random()*100)+1,Math.floor(Math.random()*100)+1,labels[Math.floor(Math.random()*14)+2]);
            }, 1200);*/

          </script>
      </html>