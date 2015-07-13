<!DOCTYPE html>
<html>
 <head>
   <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
   <meta charset="utf-8">
   <title>Geocoding service</title>
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

   <script src="../../js/oneUp.js"></script>

   <script type="text/javascript" src="../../js/Chart.js"></script>
   <script type="text/javascript" src="../../js/legend.js"></script>
   <style>
     html, body, #map-canvas {
       height: 100%;
       margin: 0px;
       padding: 0px
     }
     #panel {
       position: absolute;
       top: 5px;
       left: 50%;
       margin-left: -180px;
       z-index: 5;
       background-color: #fff;
       padding: 5px;
       border: 1px solid #999;
     }
   </style>
   <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>
   <script>
   $.ajax({
     type:"GET",
     url:"../../ajax/getClientAddresses.php",
     success:function(json){

       for(var i = 0; i < json.length; i++){

         codeAddress(json[i]);

       }



     }
   });
var geocoder;
var map;
function initialize() {
 geocoder = new google.maps.Geocoder();
 var latlng = new google.maps.LatLng(36.1866405, -86.7852454);
 var mapOptions = {
   zoom: 8,
   center: latlng
 }
 map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
}

function codeAddress(address) {
 var address1 = address;
 geocoder.geocode( { 'address': address1}, function(results, status) {
   if (status == google.maps.GeocoderStatus.OK) {
     map.setCenter(results[0].geometry.location);
     var marker = new google.maps.Marker({
         map: map,
         position: results[0].geometry.location
     });
   } else {
     alert('Geocode was not successful for the following reason: ' + status);
   }
 });
}

google.maps.event.addDomListener(window, 'load', initialize);

   </script>
 </head>
 <body>
   <div id="panel">
     <input id="address" type="textbox" value="Sydney, NSW">
     <input type="button" value="Geocode" onclick="codeAddress()">
   </div>
   <div id="map-canvas"></div>
 </body>
</html>
