
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1 user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Prospect Lookup</title>
    <link rel="stylesheet" type="text/css" href="../../css/demo.css">
    <link rel="stylesheet" type="text/css" href="../../css/navbar.css">
    <link href="../../libraries/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../../libraries/Flat-UI-master/dist/css/flat-ui.min.css">
    <link rel="stylesheet" href="../../libraries/Flat-UI-master/fonts/glyphicons/flat-ui-icons-regular.svg">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">
    <!-- Bootstrap Core CSS -->

    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

    <!--timeline css-->
    <link rel="stylesheet" href="../../libraries/timeline-2.9.1/timeline.css" media="screen" title="no title" charset="utf-8">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script type="text/javascript">
window.heap=window.heap||[],heap.load=function(t,e){window.heap.appid=t,window.heap.config=e;var a=document.createElement("script");a.type="text/javascript",a.async=!0,a.src=("https:"===document.location.protocol?"https:":"http:")+"//cdn.heapanalytics.com/js/heap-"+t+".js";var n=document.getElementsByTagName("script")[0];n.parentNode.insertBefore(a,n);for(var o=function(t){return function(){heap.push([t].concat(Array.prototype.slice.call(arguments,0)))}},p=["clearEventProperties","identify","setEventProperties","track","unsetEventProperty"],c=0;c<p.length;c++)heap[p[c]]=o(p[c])};
heap.load("3593988708");
</script>
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



        <style type="text/css">
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
        <li><a href="../resultsphysiotherapy/">Results Physiotherapy</a></li>
        <li class="active"><a href="../sales/">Sales</a></li>
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
                        <li role="presentation" class="active"><a style="background-color:#F78E1E;"href="#">Prospect Lookup</a></li>
                        <li role="presentation"><a style="color:#414141;"href="http://intelligence.ansolutions.com/routes/presales/">Presales Board</a></li>
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
        <div style="margin-top:52px;" class="row">
          <div class="col-lg-4 col-lg-offset-4">
            <div class="input-rounded">
            <input type="search" id="search" value="" class="form-control" placeholder="Search by Company, Type or Status">
          </div>
          </div>
        </div>
        <div style="margin-top:52px;" class="row">
          <div class="col-md-12">
            <div id="clientTable">
            </div>
            <div id="loading">
            </div>
          </div>
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





            <!--<div id="timelineSection2" style="margin-top:11px;"class="row">
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
              </div>-->
                <div  class="modal fade" id="basicModal1" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                    <div  class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <button type="button"  class="close fui-cross" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title" id="myModalLabel"></h4>
                            </div>
                            <div class="modal-body">

                              <div id="timelineSection2" style="margin-top:11px;"class="row">

                                <div class="col-md-12">
                                  <h4>Address</h4>
                                  <div  id="timeline">

                                  </div>
                                </div>



                              </div>
                              <div id="timelineSection3" style="margin-top:11px;"class="row">


                                <div class="col-md-12">
                                  <h4>Agreement History</h4>
                                  <div  id="timeline3">

                                  </div>
                                </div>

                              </div>
                                <div id="timelineSection2" style="margin-top:11px;"class="row">

                                  <div class="col-md-12">
                                    <h4>Opportunity History</h4>
                                    <div  id="timeline1">

                                    </div>
                                  </div>



                                </div>
                                <div id="timelineSection2" style="margin-top:11px;"class="row">


                                  <div class="col-md-12">
                                    <h4>Activity History</h4>
                                    <div  id="timeline2">

                                    </div>
                                  </div>

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





</div>



            <!--End Projects Initiated Last Year-->









               <!--<div style="margin-top:60px;text-align:center;" class="co-md-4"id="clientData"></div>-->
             <!-- Don't delete this div. This is where RazorFlow will get rendered. -->
            <!--<div id="dbTarget" style="position:relative;" class="rf"></div> -->


           <!--<div id="wherethestuffis" class="col-md-2">

               <canvas style=" margin-left:10px;background-color:#fff;" id="openTickets" height="600" width="200"></canvas>
           </div>-->




         <!--<script type="text/javascript">
         var numAnim = new countUp("#avgTickets", 24.02, 99.99);
            numAnim.start();
        </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
       <script src="../js/oneUp.js"></script>-->
       <script type="text/javascript" src="../../js/jquery.min.js"></script>
       <script src="../../js/jquery.searchable.js"></script>


       <!--<script type="text/javascript" src="../js/razorflow.min.js"></script>
       <script type="text/javascript" src="../js/razorflow.devtools.min.js"></script>-->
       <script src="../../libraries/timeline-2.9.1/timeline.js"></script>
       <script src="../../js/Chart.js"></script>
       <script src="../../js/legend.js"></script>
       <!-- Latest compiled and minified JavaScript -->
       <script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../../js/livefilter.js"></script>
    <script type="text/javascript" src="../../js/sales.js"></script>
    <script type="text/javascript" src="../../js/asana.js"></script>
    </body>

</html>
