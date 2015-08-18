<!doctype html >
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Chronic Site Analysis</title>
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
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.css" media="screen" title="no title" charset="utf-8">
          <link rel="stylesheet" href="../../libraries/hopscotch/dist/css/hopscotch.min.css" />
          <script type="text/javascript">
  window.heap=window.heap||[],heap.load=function(t,e){window.heap.appid=t,window.heap.config=e;var a=document.createElement("script");a.type="text/javascript",a.async=!0,a.src=("https:"===document.location.protocol?"https:":"http:")+"//cdn.heapanalytics.com/js/heap-"+t+".js";var n=document.getElementsByTagName("script")[0];n.parentNode.insertBefore(a,n);for(var o=function(t){return function(){heap.push([t].concat(Array.prototype.slice.call(arguments,0)))}},p=["clearEventProperties","identify","setEventProperties","track","unsetEventProperty"],c=0;c<p.length;c++)heap[p[c]]=o(p[c])};
  heap.load("3593988708");
</script>
        <script type="text/javascript" src="../../js/jquery.min.js"></script>
        <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/2.9.0/moment.min.js"></script>
        <script type="text/javascript" src="../../js/Chart.js"></script>
        <script type="text/javascript" src="../../js/legend.js"></script>
        <script src="../../libraries/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>
        <script src="../../libraries/timeline-2.9.1/timeline.js"></script>
        <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/1/daterangepicker.js"></script>
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/1/daterangepicker-bs3.css" />
        <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>

        <script src="../../libraries/hopscotch/dist/js/hopscotch.min.js"></script>

        <script>$('.navmenu').offcanvas()</script>
        <script>
            function myFunction() {

            var x = document.title;
            document.getElementById("title").innerHTML = "<span class='fa fa-heartbeat'></span> "  + x;

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
                        <li role="presentation"><a style="color:#414141;"href="http://intelligence.ansolutions.com/routes/resultsphysiotherapy/">Dashboard</a></li>
                        <li role="presentation" class="active"><a style="background-color:#F78E1E;"href="#">Site Analysis</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2 col-md-offset-1">
                <a id="chronicTickets" class="btn btn-danger">Chronic Tickets</a>
            </div>
            <div class="col-md-4">
              <div id="boards" style="padding:5px;">
                  <ul id="boardTable" class="nav nav-pills">
                  </ul>
              </div>
            </div>
        </div>
    	<div style="margin-top:12px;"class="row">
            <div class="col-md-4 col-md-offset-4">
                <input id="daterange4" class="form-control" type="text" name="daterange4"placeholder="Default date range is trailing 4 weeks"  />
                  <script type="text/javascript">
                  </script>
            </div>


        </div>
        <div style="margin-top:32px;" class="row">
          <div class="col-md-12">
            <a href="#" style="text-align:center;" data-toggle="tooltip" title="Hardware, Internet, Monitoring Alerts, Network, Phone/Fax,
              Wireless, Workstation">Included Service Types</a>

          </div>
            <div id="title" class="col-md-12">

                 <div id="locationsTable">



                  <!--<div id="locationsTable1" class="col-md-6">
                  <table class="table">
                    <thead>
                       <th>Site</th>
                       <th>Actual Hours</th>
                    </thead>
                    <tbody>
                    </tbody>
                    </table>
                    </div>
                    <div id="locationsTable1" class="col-md-6">
                     <table class="table">
                    <thead>
                       <th>Site</th>
                       <th>Tickets Opened</th>
                    </thead>
                    <tbody>
                    </tbody>
                    </table>
                    </div>-->
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
                <div style="width:auto;" class="modal fade" id="basicModal2" tabindex="-1" role="dialog" aria-labelledby="basicModal2" aria-hidden="true">
            <div class="modal-dialog4">
                <div class="modal-content">
                    <div class="modal-header">
                    <button type="button"  class="close fui-cross" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title" id="myModalLabel">Chronic Site Tickets</h4>
                    </div>
                    <div id="ticketsBody" class="modal-body">


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                </div>
            </div>
          </div>
        </div>
        <div style="width:auto;" class="modal fade" id="basicModal3" tabindex="-1" role="dialog" aria-labelledby="basicModal3" aria-hidden="true">
    <div class="modal-dialog4">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button"  class="close fui-cross" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title" id="myModalLabel3"></h4>
            </div>
            <div id="ticketsBody" class="modal-body">

              <div style="margin-top:32px;" id="ticketResults" class="row">
                  <div class="col-md-12">
                <table id="results" style='width:100%;' class='display' cellspacing="0"width="100%">
                  <thead>
                    <tr>
                    <th>Ticket #</th>
                    <th>Type</th>
                    <th>Contact</th>
                    <th>Status</th>
                    <th>Engineer(s)</th>
                    <th>Summary</th>
                    <th>Scheduled</th>
                    <th>Days Open</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                    <th>Ticket #</th>
                    <th>Type</th>
                    <th>Contact</th>
                    <th>Status</th>
                    <th>Engineer(s)</th>
                    <th>Summary</th>
                    <th>Scheduled</th>
                    <th>Days Open</th>
                  </tr>
                  </tfoot>
                </table>
                  </div>
              </div>
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
    <script src="../../js/siteanalysis.js"></script>
    </body>

</html>
