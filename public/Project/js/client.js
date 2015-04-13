// Welcome to the RazorFlow Dashbord Quickstart. Simply copy this "dashboard_quickstart"
// to somewhere in your computer/web-server to have a dashboard ready to use.
// This is a great way to get started with RazorFlow with minimal time in setup.
// However, once you're ready to go into deployment consult our documentation on tips for how to
// maintain the most stable and secure






function drawTimeline1(value){

  var company = value.substr(value.indexOf("=")+1);
  var parameter = value.substr(0, value.indexOf('=')+1);


  $.ajax({
    type:"POST",
    url:"../../ajax/clientservices/getServiceHistory.php"+parameter+company,
    success: function(json){
      data = [];

      for($i=0;$i<json.length;$i++){
        //console.log(json[$i]["timeNum"]);
        //var date = parseInt(json[$i]["yearNum"])+","+parseInt(json[$i]["monthNum"])+","+parseInt(json[$i]["dayNum"]);
        data.push({
          'start': new Date(json[$i]["yearNum"],json[$i]["monthNum"],json[$i]["dayNum"]),
          //'end':  new Date(json[$i]["yearRes"],json[$i]["monthRes"],json[$i]["dayRes"]),  // end is optional
          'content': "#"+json[$i]["TicketNbr"]+"<br />"+json[$i]["ServiceType"]+"<br />"+json[$i]["Urgency"]
          //'className': 'event'
           //Optional: a field 'className'
          // Optional: a field 'editable'
        });
      }

      var options = {
        "width":  "100%",
        "height": "200px",
        "style": "box",
        "editable": false,
        "cluster":true
      };
      timeline1 = new links.Timeline(document.getElementById('timeline1'),options);

      timeline1.draw(data);
      //console.log(data);


    }
  });



  /*$('#timeline').fadeOut(500, function() {

 var $span1 = $('<div id="timeline" class="col-md-12"></div>');
 //var $span2 = $('<canvas style="background-color:#F7E109;"  class="col-md-3" id="projectsCreated" height="auto" width="200"></canvas>');
 $("#timeline").replaceWith($span1);
 //$("#openProjects").replaceWith($span2);
 $span1.fadeIn(1200);

});*/
}




function drawTimeline2(value) {
  var company = value.substr(value.indexOf("=")+1);
  var parameter = value.substr(0, value.indexOf('=')+1);

  $.ajax({
    type:"POST",
    url:"../../ajax/clientservices/getOppHistory.php"+parameter+company,
    success: function(json){


      data1 = [];

      for($i=0;$i<json.length;$i++){
        //var date = parseInt(json[$i]["yearNum"])+","+parseInt(json[$i]["monthNum"])+","+parseInt(json[$i]["dayNum"]);
        data1.push({
          'start': new Date(json[$i]["yearNum"],json[$i]["monthNum"],json[$i]["dayNum"]),
          'end':  new Date(json[$i]["yearRes"],json[$i]["monthRes"],json[$i]["dayRes"]),  // end is optional
          'content': json[$i]["oppName"]
          //'className': 'opp'
           //Optional: a field 'className'
          // Optional: a field 'editable'
        });
      }

      var options = {
        "width":  "100%",
        "height": "200px",
        "style": "box",
        "editable": false,
        "cluster":true
      };
      timeline2 = new links.Timeline(document.getElementById('timeline2'),options);

      timeline2.draw(data1);
    }
  });


}



function getMrr(value){


  var company = value.substr(value.indexOf("=")+1);
  var parameter = value.substr(0, value.indexOf('=')+1);



$.ajax({
type: 'POST',
url: "../../ajax/clientservices/lastMonthMrr.php"+parameter+company,
cache:false,
success: function(json) {

            mrr = [];
    for(var i = 0; i < json.length; i++) {

    mrr.push (json[i]["MRR"]);

}



//console.log(mrr);

     $('#title #mrr').fadeOut(500, function() {

    if(mrr==0){
      var $span1 = $('<h2 style="text-align:center;" id="mrr">$0</h2>');
    }else{
      var total = mrr.reduce(function(a, b) {
        return a + b;
      });
      total = total.toFixed(2).replace(/./g, function(c, i, a) {
        return i && c !== "." && ((a.length - i) % 3 === 0) ? ',' + c : c;
        });
      var $span1 = $('<h3 style="text-align:center;" id="mrr">$'+total+'</h3>');
      }


    //var $span2 = $('<canvas style="background-color:#F7E109;"  class="col-md-3" id="projectsCreated" height="auto" width="200"></canvas>');
    $("#mrr").replaceWith($span1);
    //$("#openProjects").replaceWith($span2);
    $span1.fadeIn(1200);

    });


    }

  });
}

function getAvgTickets(value){
  var company = value.substr(value.indexOf("=")+1);
  var parameter = value.substr(0, value.indexOf('=')+1);


  $.ajax({
  type: 'POST',
  url: "../../ajax/clientservices/avgTicketsPerDay.php"+parameter+encodeURIComponent(company),
  cache:false,
  success: function(json) {

              avgTickets = [];
      for(var i = 0; i < json.length; i++) {

      avgTickets.push (json[i]["Avg_Daily_Total_Tickets"]);

  }



       $('#title #avgTickets').fadeOut(500, function() {

      var $span1 = $('<h2 style="text-align:center;" id="avgTickets">'+json+'</h2>');
      //var $span2 = $('<canvas style="background-color:#F7E109;"  class="col-md-3" id="projectsCreated" height="auto" width="200"></canvas>');
      $("#avgTickets").replaceWith($span1);
      //$("#openProjects").replaceWith($span2);
      $span1.fadeIn(1200);

  });


  }

});

}

function getOpenTickets(value){
  var company = value.substr(value.indexOf("=")+1);
  var parameter = value.substr(0, value.indexOf('=')+1);

  $.ajax({
      type: 'POST',
      url: "../../ajax/clientservices/getOpenTicketsEcho.php"+parameter+company,
      cache:false,
      success: function(json) {

                  avgTickets = [];
          for(var i = 0; i < json.length; i++) {

          avgTickets.push (json[i]["Avg_Daily_Total_Tickets"]);

      }



           $('#title #openTickets').fadeOut(500, function() {

          var $span1 = $('<h2 style="text-align:center;" id="openTickets">'+json+'</h2>');
          //var $span2 = $('<canvas style="background-color:#F7E109;"  class="col-md-3" id="projectsCreated" height="auto" width="200"></canvas>');
          $("#openTickets").replaceWith($span1);
          //$("#openProjects").replaceWith($span2);
          $span1.fadeIn(1200);

      });


      }

  });



}





function getServiceByType(value){
  var company = value.substr(value.indexOf("=")+1);
  var parameter = value.substr(0, value.indexOf('=')+1);

  $.ajax({
  type: 'POST',
  url: "../../ajax/clientservices/serviceType.php"+parameter+company,
  cache:false,
  success: function(json) {

    json = json.sort();
    json.sort(function (a, b) {
if (a.Description > b.Description) {
  return 1;
}
if (a.Description < b.Description) {
  return -1;
}
// a must be equal to b
return 0;
});

      //labels = ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sept","Oct","Nov","Dec"];
      var xlabels = [], type_count = [],total_count=[],colors = [];
          for(var i = 0; i < json.length; i++) {

              label:xlabels.push(json[i]["Description"]);
              value: type_count.push(json[i]["total_hours"]);
              value: total_count.push(json[i]["typeCount"]);
              //fillColor: colors.push (getRandomColor());

              }



function getRandomColor() {
  var letters = '0123456789ABCDEF'.split('');
  var color = '#';
  for (var i = 0; i < 6; i++ ) {
      color += letters[Math.floor(Math.random() * 16)];
  }
  return color;
}




      var radarChartData = {

      labels : xlabels,
      datasets : [

          {
              label:"Hours",
              fillColor : "rgba(207, 236, 116, .7)",
              strokeColor : "rgba(207, 236, 116, .8)",
              highlightFill: "rgba(207, 236, 116, .75)",
              highlightStroke: "rgba(207, 236, 116, 1)",
              data : type_count
          },
          {
              label:"Tickets",
              fillColor : "rgba(220,220,220,0.5)",
              strokeColor : "rgba(220,220,220,0.8)",
              highlightFill: "rgba(220,220,220,0.75)",
              highlightStroke: "rgba(220,220,220,1)",
              data : total_count
          }

      ]

  }








$('#wherethestuffis #serviceType').fadeOut(200, function() {





      var $span2 = $('<canvas id="serviceType" style="width:600px;height:300px;"></canvas>');
      //var $span2 = $('<canvas style="background-color:#F7E109;"  class="col-md-3" id="projectsCreated" height="auto" width="200"></canvas>');
      $("#serviceType").replaceWith($span2);
      //$("#openProjects").replaceWith($span2);
      $span2.fadeIn(1200);
      //$span2.fadeIn(500);

      var rCM = document.getElementById("serviceType").getContext("2d");

      var projectChart = new Chart(rCM).Radar(radarChartData);
      legend(document.getElementById("serviceTypeLegend"), radarChartData);

  });







  }

});


}




function getOSType(value){
  var company = value.substr(value.indexOf("=")+1);
  var parameter = value.substr(0, value.indexOf('=')+1);

  $.ajax({
    type:"POST",

    url:"../../ajax/clientservices/getOSType.php"+parameter+company,


    success:function(json){

      function getRandomColor() {
          var letters = '0123456789ABCDEF'.split('');
          var color = '#';
          for (var i = 0; i < 6; i++ ) {
              color += letters[Math.floor(Math.random() * 16)];
          }
          return color;
      }
            var count = [];
            var type = [];
            for($i=0;$i<json.length;$i++){

            //color1.push(getRandomColor());
            //color2.push(getRandomColor());
            count.push(json[$i]["osCount"]);
            type.push(json[$i]["OS"]);




            }



  $('#wherethestuffis #osType').fadeOut(200, function() {


   var $span2 = $('<canvas id="osType" style="width:400px;height:300px;" ></canvas>');
   //var $span2 = $('<canvas style="background-color:#F7E109;"  class="col-md-3" id="projectsCreated" height="auto" width="200"></canvas>');
   $("#osType").replaceWith($span2);
   //$("#openProjects").replaceWith($span2);
   $span2.fadeIn(900);
   //$span2.fadeIn(500);

   var RCM = document.getElementById("osType").getContext("2d");
   pieData = [];
   var myPieChart = new Chart(RCM).PolarArea(pieData);
   //legend(document.getElementById("osTypeLegend"), pieData);
   //myPieChart.clear();



   //myPieChart.removeData();
   //myPieChart.update();

   for($i=0;$i<json.length;$i++){

     myPieChart.addData({

         value: count[$i],
         color: getRandomColor(),
         highlight: getRandomColor(),
         label: type[$i]
     });


   }
   myPieChart.update();

  });









    }
  });


}





function getWorkstations(value){

  var company = value.substr(value.indexOf("=")+1);
  var parameter = value.substr(0, value.indexOf('=')+1);
  console.log(company);

  $.ajax({
      type: 'GET',
      url: "../../ajax/clientservices/getWorkstations.php"+parameter+company,
      cache:false,
      success: function(json) {

          var workstations = [];
          for(var i = 0; i < json.length; i++) {

         workstations.push (json[i]["workStations"]);
         //servers.push (json[i]["servers"])

      }

          function kFormatter(num) {
      return num > 999 ? (num/1000).toFixed(1) + 'k' : num
  }


  $('#comp').fadeOut(200, function() {

                 var $span1 = $('<h2 class="col-xs-6"style="text-align:center;" id="comp">'+workstations+'\n<span><img src="../../css/assets/icons/Computer.svg"/></span></h2>');

          $("#comp").replaceWith($span1);

          $span1.fadeIn(800);

      });


      }

  });

}



function getServers(value){
  var company = value.substr(value.indexOf("=")+1);
  var parameter = value.substr(0, value.indexOf('=')+1);

  $.ajax({
      type: 'GET',
      url: "../../ajax/clientservices/getServers.php"+parameter+company,
      cache:false,
      success: function(json) {

          var servers = [];
          for(var i = 0; i < json.length; i++) {

         servers.push (json[i]["servers"]);


      }

          function kFormatter(num) {
      return num > 999 ? (num/1000).toFixed(1) + 'k' : num
  }


  $('#serv').fadeOut(200, function() {

                 var $span1 = $('<h2 class="col-xs-6" style="text-align:center;" id="serv">'+servers+'\n<span><img style="color:#3CB371;" src="../../css/assets/icons/Server.svg"  /></span></h2>');

          $("#serv").replaceWith($span1);

          $span1.fadeIn(800);

      });


      }

  });

}





function getLocationCount(value){
  var company = value.substr(value.indexOf("=")+1);
  var parameter = value.substr(0, value.indexOf('=')+1);

  $.ajax({
      type: 'GET',
      url: "../../ajax/clientservices/getLocationCount.php"+parameter+company,
      cache:false,
      success: function(json) {

        locations = [];
          for(var i = 0; i < json.length; i++) {

         locations.push (json[i]["locationCount"]);


      }


  //<span><img style="height:70px;width:auto;" src="../../css/assets/building.svg"/></span>

  $('#locations').fadeOut(200, function() {

                 var $span1 = $('<div id="locations" class="panel-body"><h2 style="text-align:center;">'+locations+'</h2></div>');

          $("#locations").replaceWith($span1);

          $span1.fadeIn(800);

      });


      }

  });


}








$(document).ready(function(){

    $.ajax({
      url: "../../ajax/clientservices/getClientList.php",
                    context: document.body,

                    success: function(html){
                     $("#clientTable").append(html);

                    }

                    });

                    getMrr('');
                    getAvgTickets('');
                    getOpenTickets('');
                    getServiceByType('');
                    getOSType('');
                    getWorkstations('');
                    getServers('');
                    getLocationCount('');
              //drawTimeline1('');
              //drawTimeline2('');

              //drawTimeline('');

    $('#clientTable').on('click','a.client',function(e){
       e.preventDefault();
       //e.stopPropagation();
       $("#dropdown").removeClass("open");


       $("#timelineSection").removeClass("hidden");
        //var queryString = window.location.substring( window.location.indexOf('?') + 1 );
        //console.log(queryString);

        var clickedVal = $(this).attr('href');

        console.log(clickedVal);
        //console.log(data);
        var title = clickedVal.substr(clickedVal.indexOf("=") + 1);
        title = unescape(title)

        $("#title").text(title);
        getOSType(clickedVal);
        getWorkstations(clickedVal);
        getServers(clickedVal);
        getMrr(clickedVal);
        getAvgTickets(clickedVal);
        getOpenTickets(clickedVal);
        getServiceByType(clickedVal);


        getLocationCount(clickedVal);
        drawTimeline1(clickedVal);
        drawTimeline2(clickedVal);


        $("#timelineSection1").removeClass("hidden");
        $("#timelineSection2").removeClass("hidden");


    });
    //$("#clientTable").off('click','a.client');

});
///////////***************END CW DATA**************///////////////////

/*$(function() {


    // Get the form.
    var form = $('#companyForm');

    // Get the messages div.
    //var formMessages = $('#form-messages');

    // Set up an event listener for the contact form.
    $(form).submit(function(e) {






        // Stop the browser from submitting the form.
        e.preventDefault();
         event.stopPropagation();

        $('#companyForm input').on('click',function(){
            var clickedVal = $(this).attr('href');
             e.preventDefault();
             event.stopPropagation();
            console.log(clickedVal);










var title = clickedVal.substr(clickedVal.indexOf("=") + 1);

$("#title").text(title);
getClientData(clickedVal);
$('input').off('click');

        });



    });

});*/
