<div style="margin-top:5%;" class="row">
  <div class="col-md-12">
    <h3 style="text-align:center;"><span><img src="css/assets/Lightbulb-only-icon-64.png" alt="" /></span> ANS Intelligence</h3>
  </div>
</div>
<div class="row">
  <div class="col-md-3">

  </div>
  <div class="col-md-6">
    <h5 style="text-align:center;">
      <?php
      // show potential errors / feedback (from login object)
      if (isset($login)) {
          if ($login->errors) {
              foreach ($login->errors as $error) {
                  echo $error;
              }
          }
          if ($login->messages) {
              foreach ($login->messages as $message) {
                  echo $message;
              }
          }
      }
      ?>
    </h5>
  </div>
  <div class="col-md-3">

  </div>
</div>




<!doctype html >
<html lang="en">

<head>
    <meta charset="UTF-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">



    <title>Welcome</title>
    <link rel="stylesheet" type="text/css" href="css/demo.css">

    <link rel="stylesheet" type="text/css" href="css/navbar.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="libraries/Flat-UI-master/dist/css/flat-ui.min.css">
    <link rel="stylesheet" href="libraries/Flat-UI-master/fonts/glyphicons/flat-ui-icons-regular.svg">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">
    <link href='http://fonts.googleapis.com/css?family=Codystar' rel='stylesheet' type='text/css'>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <!--<script type="text/javascript" src="js/overview.js"></script>-->
    <script type="text/javascript" src="js/Chart.js"></script>
    <script type="text/javascript" src="js/legend.js"></script>

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
