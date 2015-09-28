
<!doctype html >
<html  lang="en">
    <head>
        <meta charset="UTF-8" />

        <meta name="viewport" content="initial-scale=1.0, user-scalable=no">



        <title>Solution Delivery</title>
        <link rel="stylesheet" type="text/css" href="../../../css/demo.css">
        <link rel="stylesheet" type="text/css" href="../../../css/razorflow.min.css">
        <link rel="stylesheet" type="text/css" href="../../../css/navbar.css">
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../../libraries/Flat-UI-master/dist/css/flat-ui.min.css">
        <link rel="stylesheet" href="../../../libraries/Flat-UI-master/fonts/glyphicons/flat-ui-icons-regular.svg">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <script type="text/javascript">
  window.heap=window.heap||[],heap.load=function(t,e){window.heap.appid=t,window.heap.config=e;var a=document.createElement("script");a.type="text/javascript",a.async=!0,a.src=("https:"===document.location.protocol?"https:":"http:")+"//cdn.heapanalytics.com/js/heap-"+t+".js";var n=document.getElementsByTagName("script")[0];n.parentNode.insertBefore(a,n);for(var o=function(t){return function(){heap.push([t].concat(Array.prototype.slice.call(arguments,0)))}},p=["clearEventProperties","identify","setEventProperties","track","unsetEventProperty"],c=0;c<p.length;c++)heap[p[c]]=o(p[c])};
  heap.load("3593988708");
</script>
        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/2.9.0/moment.min.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/js/bootstrap.min.js"></script>-->

        <script src="../../../libraries/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>
        <script src="../../../js/oneUp.js"></script>

        <script type="text/javascript" src="../../../js/Chart.js"></script>
        <script type="text/javascript" src="../../../js/legend.js"></script>
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
#logout_button,#issue_button,#dateSwitchHours,#dateSelector,#timeanalysis {
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
        canvas{
  width: 100% !important;

  height: 400px !important;
}
        </style>
    <body class="canvas">


        <div style="margin-top:6px;"class="container">
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
                <div class="row">
                  <div class="col-md-7 col-md-offset-5">
                    <div title=">100%" style="border-radius:10px;display:inline-block;background-color:#2ECC71;padding:5px;color:#fff;">>100%</div>
                    <div  title="<=100% & >=80%" style="border-radius:10px;display:inline-block;background-color:#F1C40F;padding:5px;color:#fff;"><=100% & >=80%</div>
                    <div title="<80%" style="border-radius:10px;display:inline-block;background-color:#E74C3C;padding:5px;color:#fff;"><80%</div>

                  </div>
                </div>
        <div style="margin-top:3px;" class="row">
          <div class="col-md-3">
              <div class="panel panel-default">

                      <h6 style="text-align:center;" id="executedTitle">Project Hours Executed - This Wk</h6>

                <div class="panel-body">
                  <h2 style="text-align:center;" id="executed">0</h2>
                  <p style="text-align:center;" id="vsExecuted">
                    <span id="percentToGoal">0%</span><span id="weekToDateGoal">to week to date goal of 0hrs</span>
                  </p>

                </div>
              </div>
          </div>
            <div class="col-md-2">
                <div class="panel panel-default">

                        <h6 style="text-align:center;">Open Projects</h6>
                        <p style="text-align:center;" >(for clients)</p>

                  <div class="panel-body">
                    <h2 style="text-align:center;" id="clientProjectCount">0</h2>
                    <p style="text-align:center;" id="totalBudget">
                      0 total budgeted hours
                    </p>
                  </div>
                </div>
            </div>

            <div class="col-md-7">
                <div class="panel panel-default">

                        <h6 style="text-align:center;">Queue Data</h6>

                  <div class="panel-body">
                    <div class="row">
                      <div style="margin:0 auto;"  class="col-md-3">
                          <h3 style="text-align:center;" id="hoursRemaining">
                            0
                          </h3>
                          <p style=" text-align:center;font-size:21px;"> in queue</p>
                          </div>
                            <div style="margin:0 auto;"  class="col-md-3">
                              <h3 style="text-align:center;" id="hoursOver">
                                0
                              </h3>
                                <p style=" text-align:center;font-size:15px;"> over budget | <span id="overVariance">0%</span></p>
                          </div>
                      <div style="margin:0 auto;"  class="col-md-3">
                        <div>
                          <h3 style="text-align:center;" id="percentHoursGoal">
                            0

                          </h3>
                            <p style="text-align:center;font-size:15px;"> to goal of 1920hrs</p>
                        </div>
                      </div>
                    <div style="margin:0 auto;"  class="col-md-3">


                        <div>
                          <h3 style="text-align:center;" id="hoursInWeeks">
                            0
                          </h3>
                            <p style="text-align:center;font-size:15px;"> in queue</p>
                        </div>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            <div class="row">
              <div class="col-md-7">
                <div class="panel panel-default">



                        <h6 style="text-align:center">
                          Project Hours Executed by Engineer - This Wk
                        </h6>




                    <div class="panel-body">
                      <div class="row">
                        <div class="col-md-1">
                          <div id="hoursByPMLegend">

                          </div>
                        </div>
                        <div class="col-md-11">
                          <canvas id="hoursByPM" width="300" height="300"></canvas>
                        </div>


                      </div>

                  </div>
                </div>
              </div>
              <div class="col-md-5">
                <div class="panel panel-default">
                <h6 style="text-align:center;">Hours Executed by Project - This Wk</h6>
                  <div style="max-height:537px;overflow:scroll;" class="panel-body">
                    <div id="projectTable">
                      <table class="table table-striped">
                          <thead>
                          <th>Client</th>
                          <th>Project</th>
                          <th>Hours Executed</th>
                        </thead>
                        <tbody></tbody>
                      </table>
                    </div>
                  </div>
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

      <script type="text/javascript" src="../../../js/solution_delivery_fullscreen.js"></script>
    <script src="../../../js/asana.js"></script>
    </body>

</html>
