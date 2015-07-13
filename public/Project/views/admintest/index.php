<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>jQuery UI Sortable - Handle empty lists</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
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
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
  <style>
  #sortable1, #sortable2, #sortable3 { list-style-type: none; margin: 0; float: left; margin-right: 10px; background: #eee; padding: 5px; width: auto;}
  #sortable1 li, #sortable2 li, #sortable3 li { background: #fff;margin: 5px; padding: 5px; font-size: 1.2em; width: auto; }
.ui-state-default{
  background-color: #fff;
}
  </style>
  <script>
  $(function() {
    $( "ul.droptrue" ).sortable({
      connectWith: "ul"
    });

    $( "ul.dropfalse" ).sortable({
      connectWith: "ul",
      dropOnEmpty: true
    });
    $( "#sortable1, #sortable2, #sortable3" ).disableSelection();
  });

  $.ajax({
    type:"GET",
    url:"../../ajax/getAssignedPermissions.php",
    success:function(json1){
      var permissions = [];
      for(var i = 0; i < json1.length; i++){
        $('#sortable2').append('<li style="background-color:#fff;"class="panel panel-default ui-state-default">'+json1[i]['user_group_name']+'</li>');
        permissions.push(json1[i]['user_group_name']);
      }
      $.ajax({
        type:"GET",
        url:"../../ajax/getPermissions.php",
        success:function(json2){

          for(var i = 0; i < json2.length; i++){
            //alert(jQuery.inArray(json2[i]['user_group_name'], json1[i]));
            if(jQuery.inArray(json2[i]['user_group_name'],permissions) == -1){
              $('#sortable1').append('<li style="background-color:#fff;"class="panel panel-default ui-state-default">'+json2[i]['user_group_name']+'</li>');

            }else{
            }
          }
        }
      });
    }
  });
  $( ".selector" ).on( "sortchange", function( event, ui ) {} );
  </script>
</head>
<body>

<ul id="sortable1"  class="panel panel-default droptrue ">
</ul>

<ul id="sortable2" class="panel panel-default droptrue">

</ul>

<ul id="sortable3" class="panel panel-default droptrue">
</ul>

<br style="clear:both">


</body>
</html>
