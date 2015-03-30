// Welcome to the RazorFlow Dashbord Quickstart. Simply copy this "dashboard_quickstart"
// to somewhere in your computer/web-server to have a dashboard ready to use.
// This is a great way to get started with RazorFlow with minimal time in setup.
// However, once you're ready to go into deployment consult our documentation on tips for how to
// maintain the most stable and secure


var clickedVal='';

/*function getServiceTimeline(value){

  $.ajax({
    type:"POST",
    url:"../../ajax/getServiceHistory.php"+value,
    success: function(json){

      data = [];

      for($i=0;$i<json.length;$i++){
        //var date = parseInt(json[$i]["yearNum"])+","+parseInt(json[$i]["monthNum"])+","+parseInt(json[$i]["dayNum"]);
        data.push({
          'start': new Date(parseInt(json[$i]["yearNum"])+","+parseInt(json[$i]["monthNum"])+","+parseInt(json[$i]["dayNum"])),
          'end':  new Date(json[$i]["yearRes"],json[$i]["monthRes"],json[$i]["dayRes"]),  // end is optional
          'content': json[$i]["ServiceType"]+"<br />"+json[$i]["Urgency"]
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
      timeline = new links.Timeline(document.getElementById('timeline'),options);

      timeline.draw(data);
      console.log(data);
      $('#timeline').fadeOut(200, function() {

                     var $span1 = $('<div  id="timeline" class="col-md-12"></div>');

              $("#timeline").replaceWith($span1);

              $span1.fadeIn(800);

          });
          timeline = new links.Timeline(document.getElementById('timeline'),options);

          timeline.draw(data);
    }
  });

}

function getOppTimeline(value){

  $.ajax({
    type:"POST",
    url:"../../ajax/getOppHistory.php"+value,
    success: function(json){

      data = [];

      for($i=0;$i<json.length;$i++){
        //var date = parseInt(json[$i]["yearNum"])+","+parseInt(json[$i]["monthNum"])+","+parseInt(json[$i]["dayNum"]);
        data.push({
          'start': new Date(parseInt(json[$i]["yearNum"])+","+parseInt(json[$i]["monthNum"])+","+parseInt(json[$i]["dayNum"])),
          'end':  new Date(json[$i]["yearRes"],json[$i]["monthRes"],json[$i]["dayRes"]),  // end is optional
          'content': json[$i]["ServiceType"]+"<br />"+json[$i]["Urgency"]
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
      timeline = new links.Timeline(document.getElementById('timeline'),options);

      //timeline.draw(data);
      console.log(data);


          timeline.draw(data);
          $("#service").removeClass("active");
          $("#opps").addClass("active");
    }
  });

}*/

function escapeHtml(text) {
  var map = {
    '&': '&amp;',
    '<': '&lt;',
    '>': '&gt;',
    '"': '&quot;',
    "'": '&#039;'
  };

  return text.replace(/[&<>"']/g, function(m) { return map[m]; });
}

function drawTimeline1(value){

  var company = value.substr(value.indexOf("=")+1);
  var parameter = value.substr(0, value.indexOf('=')+1);


  $.ajax({
    type:"POST",
    url:"../../ajax/getServiceHistory.php"+parameter+encodeURIComponent(company),
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
    url:"../../ajax/getOppHistory.php"+parameter+encodeURIComponent(company),
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



function getClientData(value){


  var company = value.substr(value.indexOf("=")+1);
  var parameter = value.substr(0, value.indexOf('=')+1);








//////////////**************CW DATA*******************////////////////////////////
/*var data = {
    labels: ["Mon", "Tues","Weds","Thurs","Fri"],
    datasets: [
        {

            fillColor: "rgba(220,220,220,0.5)",
            strokeColor: "rgba(220,220,220,0.8)",
            highlightFill: "rgba(220,220,220,0.75)",
            highlightStroke: "rgba(220,220,220,1)",
            data: [54, 30,111,98,33],
            label: "New Tickets"
        },
        {

            fillColor: "rgba(120,220,220,0.5)",
            strokeColor: "rgba(120,220,220,0.8)",
            highlightFill: "rgba(120,220,220,0.75)",
            highlightStroke: "rgba(120,220,220,1)",
            data: [120, 60,78,45,25],
            label: "Tickets Closed"
        }
    ]
};



var ctx = document.getElementById("newOld").getContext("2d");
var myNewChart = new Chart(ctx).Bar(data);
legend(document.getElementById("newOldLegend"), data);*/

$.ajax({
type: 'POST',
url: "../../ajax/lastMonthMrr.php"+parameter+encodeURIComponent(company),
success: function(json) {

            mrr = [];
    for(var i = 0; i < json.length; i++) {

    mrr.push (json[i]["MRR"]);

}



//console.log(mrr);

     $('#title #mrr').fadeOut(500, function() {

    if(mrr==0){
      var $span1 = $('<h1 style="text-align:center;" id="mrr">$0</h1>');
    }else{
      var total = mrr.reduce(function(a, b) {
        return a + b;
      });
      total = total.toFixed(2).replace(/./g, function(c, i, a) {
        return i && c !== "." && ((a.length - i) % 3 === 0) ? ',' + c : c;
        });
      var $span1 = $('<h1 style="text-align:center;" id="mrr">$'+total+'</h1>');
    }


    //var $span2 = $('<canvas style="background-color:#F7E109;"  class="col-md-3" id="projectsCreated" height="auto" width="200"></canvas>');
    $("#mrr").replaceWith($span1);
    //$("#openProjects").replaceWith($span2);
    $span1.fadeIn(1200);

});


}

});























    $.ajax({
    type: 'POST',
    url: "../../ajax/avgTicketsPerDay.php"+parameter+encodeURIComponent(company),
    success: function(json) {

                avgTickets = [];
        for(var i = 0; i < json.length; i++) {

        avgTickets.push (json[i]["Avg_Daily_Total_Tickets"]);

    }



         $('#title #avgTickets').fadeOut(500, function() {

        var $span1 = $('<h1 style="text-align:center;" id="avgTickets">'+json+'</h1>');
        //var $span2 = $('<canvas style="background-color:#F7E109;"  class="col-md-3" id="projectsCreated" height="auto" width="200"></canvas>');
        $("#avgTickets").replaceWith($span1);
        //$("#openProjects").replaceWith($span2);
        $span1.fadeIn(1200);

    });


    }

});














$.ajax({
    type: 'POST',
    url: "../../ajax/getOpenTicketsEcho.php"+parameter+encodeURIComponent(company),
    success: function(json) {

                avgTickets = [];
        for(var i = 0; i < json.length; i++) {

        avgTickets.push (json[i]["Avg_Daily_Total_Tickets"]);

    }



         $('#title #openTickets').fadeOut(500, function() {

        var $span1 = $('<h1 style="text-align:center;" id="openTickets">'+json+'</h1>');
        //var $span2 = $('<canvas style="background-color:#F7E109;"  class="col-md-3" id="projectsCreated" height="auto" width="200"></canvas>');
        $("#openTickets").replaceWith($span1);
        //$("#openProjects").replaceWith($span2);
        $span1.fadeIn(1200);

    });


    }

});







    $.ajax({
    type: 'POST',
    url: "../../ajax/serviceType.php"+parameter+encodeURIComponent(company),
    success: function(json) {
      console.log(json);
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
      console.log(json);
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
                fillColor : "rgba(220,220,220,0.5)",
                strokeColor : "rgba(220,220,220,0.8)",
                highlightFill: "rgba(220,220,220,0.75)",
                highlightStroke: "rgba(220,220,220,1)",
                data : total_count
            },

        ]

    }




doughnutData = [
                {
                    value: type_count[0],
                    color: getRandomColor(),
                    highlight: getRandomColor(),
                    label: xlabels[0]
                },
                {
                    value: type_count[1],
                    color: getRandomColor(),
                    highlight: getRandomColor(),
                    label: xlabels[1]
                },
                {
                    value: type_count[2],
                    color: getRandomColor(),
                    highlight: getRandomColor(),
                    label: xlabels[2]
                },
                {
                    value: type_count[3],
                    color: getRandomColor(),
                    highlight: getRandomColor(),
                    label: xlabels[3]
                },
                {
                    value: type_count[4],
                    color: getRandomColor(),
                    highlight: getRandomColor(),
                    label: xlabels[4]
                },
                {
                    value: type_count[5],
                    color: getRandomColor(),
                    highlight: getRandomColor(),
                    label: xlabels[5]
                },
                {
                    value: type_count[6],
                    color: getRandomColor(),
                    highlight: getRandomColor(),
                    label: xlabels[6]
                },
                {
                    value: type_count[7],
                    color: "#FDB45C",
                    highlight: "#FFC870",
                    label: xlabels[7]
                },
                {
                    value: type_count[8],
                    color: "#46BFBD",
                    highlight: "#5AD3D1",
                    label: xlabels[8]
                },
                {
                    value: type_count[9],
                    color:"#F7464A",
                    highlight: "#FF5A5E",
                    label: xlabels[9]
                },
            ];



        $('#wherethestuffis #serviceType2').fadeOut(200, function() {





        var $span2 = $('<canvas id="serviceType2" style="width:100%;height:200px;"></canvas>');
        //var $span2 = $('<canvas style="background-color:#F7E109;"  class="col-md-3" id="projectsCreated" height="auto" width="200"></canvas>');
        $("#serviceType2").replaceWith($span2);
        //$("#openProjects").replaceWith($span2);
        $span2.fadeIn(900);
        //$span2.fadeIn(500);

        var rCM = document.getElementById("serviceType2").getContext("2d");

        var projectChart = new Chart(rCM).Doughnut(doughnutData);

    });




$('#wherethestuffis #serviceType').fadeOut(200, function() {





        var $span2 = $('<canvas id="serviceType" style="width:100%;height:200px;"></canvas>');
        //var $span2 = $('<canvas style="background-color:#F7E109;"  class="col-md-3" id="projectsCreated" height="auto" width="200"></canvas>');
        $("#serviceType").replaceWith($span2);
        //$("#openProjects").replaceWith($span2);
        $span2.fadeIn(1200);
        //$span2.fadeIn(500);

        var rCM = document.getElementById("serviceType").getContext("2d");

        var projectChart = new Chart(rCM).Radar(radarChartData);

    });







    }

});



////////////////**************LABTECH DATA************/////////////////////////

$.ajax({
    type: 'POST',
    url: "../../ajax/getServersWorkstations.php"+parameter+encodeURIComponent(company),
    success: function(json) {

        workstations = []; servers = [];
        for(var i = 0; i < json.length; i++) {

       workstations.push (json[i]["workStations"]);
       servers.push (json[i]["servers"])

    }

        function kFormatter(num) {
    return num > 999 ? (num/1000).toFixed(1) + 'k' : num
}


$('#compServ').fadeOut(200, function() {

               var $span1 = $('<div id="compServ" class="panel-body"><div class="row"><h1 class="col-xs-6"style="text-align:center;" id="comp">'+workstations+'\n<span><img src="../../css/assets/icons/Computer.svg"/></span></h1><h1 class="col-xs-6" style="text-align:center;" id="serv">'+servers+'\n<span><img style="color:#3CB371;" src="../../css/assets/icons/Server.svg"  /></span></h1></div></div>');

        $("#compServ").replaceWith($span1);

        $span1.fadeIn(800);

    });


    }

});


//Get OS Type by client
$.ajax({
  type:"POST",
  url:"../../ajax/getOSType.php"+parameter+encodeURIComponent(company),
  success:function(json){

    function getRandomColor() {
        var letters = '0123456789ABCDEF'.split('');
        var color = '#';
        for (var i = 0; i < 6; i++ ) {
            color += letters[Math.floor(Math.random() * 16)];
        }
        return color;
    }
          var color1 = [],color2 = [],count = [],type = [];
          for($i=0;$i<json.length;$i++){

          color1.push(getRandomColor());
          color2.push(getRandomColor());
          count.push(json[$i]["osCount"]);
          type.push(json[$i]["OS"]);




          }



          $('#wherethestuffis #osType').fadeOut(200, function() {


 var $span2 = $('<canvas id="osType" style="width:100%;height:200px"></canvas>');
 //var $span2 = $('<canvas style="background-color:#F7E109;"  class="col-md-3" id="projectsCreated" height="auto" width="200"></canvas>');
 $("#osType").replaceWith($span2);
 //$("#openProjects").replaceWith($span2);
 $span2.fadeIn(900);
 //$span2.fadeIn(500);

 var RCM = document.getElementById("osType").getContext("2d");
 pieData = [];
 var myPieChart = new Chart(RCM).PolarArea(pieData);
 //myPieChart.clear();



 myPieChart.removeData();
 myPieChart.update();

 for($i=0;$i<count.length;$i++){

   myPieChart.addData({

       value: count[$i],
       color: color1[$i],
       highlight: color2[$i],
       label: type[$i]
   });

   myPieChart.update();
 }

});









  }
});






$.ajax({
    type: 'POST',
    url: "../../ajax/getLocationCount.php"+parameter+encodeURIComponent(company),
    success: function(json) {

      locations = [];
        for(var i = 0; i < json.length; i++) {

       locations.push (json[i]["locationCount"]);


    }


//<span><img style="height:70px;width:auto;" src="../../css/assets/building.svg"/></span>

$('#locations').fadeOut(200, function() {

               var $span1 = $('<div id="locations" class="panel-body"><h1 style="text-align:center;">'+locations+'</h1></div>');

        $("#locations").replaceWith($span1);

        $span1.fadeIn(800);

    });


    }

});
////////////////**************END LABTECH DATA************/////////////////////////
}
//////////////**************CW DATA*******************////////////////////////////







    /*$.ajax({
    type: 'POST',
    url: "../ajax/serviceType.php"+value,
    success: function(json) {
        //labels = ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sept","Oct","Nov","Dec"];
           //labels = ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sept","Oct","Nov","Dec"];
        var xlabels = [], type_count = [],colors = [];
            for(var i = 0; i < json.length; i++) {

                label:xlabels.push (json[i]["Description"]);
                value: type_count.push (parseInt(json[i]["total_hours"]));
                fillColor: colors.push (getRandomColor());
                highlight: colors.push (getRandomColor());

                }


             doughnutData = [
                {
                    value: type_count[0],
                    color: getRandomColor(),
                    highlight: getRandomColor(),
                    label: xlabels[0]
                },
                {
                    value: type_count[1],
                    color: getRandomColor(),
                    highlight: getRandomColor(),
                    label: xlabels[1]
                },
                {
                    value: type_count[2],
                    color: getRandomColor(),
                    highlight: getRandomColor(),
                    label: xlabels[2]
                },
                {
                    value: type_count[3],
                    color: getRandomColor(),
                    highlight: getRandomColor(),
                    label: xlabels[3]
                },
                {
                    value: type_count[4],
                    color: getRandomColor(),
                    highlight: getRandomColor(),
                    label: xlabels[4]
                },
                {
                    value: type_count[5],
                    color: getRandomColor(),
                    highlight: getRandomColor(),
                    label: xlabels[5]
                },
                {
                    value: type_count[6],
                    color: getRandomColor(),
                    highlight: getRandomColor(),
                    label: xlabels[6]
                },
                {
                    value: type_count[7],
                    color: "#FDB45C",
                    highlight: "#FFC870",
                    label: xlabels[7]
                },
                {
                    value: type_count[8],
                    color: "#46BFBD",
                    highlight: "#5AD3D1",
                    label: xlabels[8]
                },
                {
                    value: type_count[9],
                     color:"#F7464A",
                    highlight: "#FF5A5E",
                    label: xlabels[9]
                },
            ];



function getRandomColor() {
    var letters = '0123456789ABCDEF'.split('');
    var color = '#';
    for (var i = 0; i < 6; i++ ) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
}


        $('#wherethestuffis #serviceType2').fadeOut(200, function() {





        var $span2 = $('<canvas style="background-color:#fff;" id="serviceType2" height="300" width="300"></canvas>');
        //var $span2 = $('<canvas style="background-color:#F7E109;"  class="col-md-3" id="projectsCreated" height="auto" width="200"></canvas>');
        $("#serviceType2").replaceWith($span2);
        //$("#openProjects").replaceWith($span2);
        $span2.fadeIn(900);
        //$span2.fadeIn(500);

        var rCM = document.getElementById("serviceType2").getContext("2d");

        var projectChart = new Chart(rCM).Doughnut(doughnutData);

    });







    }

});*/




















   /* $.ajax({
    type: 'POST',
    url: "../../ajax/projects2014.php"+value,
    success: function(json) {
        labels = ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sept","Oct","Nov","Dec"];
        var xlabels = [], project_count = [],colors = [];
            for(var i = 0; i < json.length; i++) {

                label:xlabels.push (json[i]["computed"]);
                value: project_count.push (parseInt(json[i]["projectsCreated"]));
                fillColor: colors.push (getRandomColor());

                }



function getRandomColor() {
    var letters = '0123456789ABCDEF'.split('');
    var color = '#';
    for (var i = 0; i < 6; i++ ) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
}
        var barChartData = {
        title: "Projects Created by Month",
        labels : labels,
        datasets : [
            {
                fillColor : "rgba(220,220,220,0.5)",
                strokeColor : "rgba(220,220,220,0.8)",
                highlightFill: "rgba(220,220,220,0.75)",
                highlightStroke: "rgba(220,220,220,1)",
                data : project_count
            },

        ]

    }


$('#wherethestuffis #projectsCreated').fadeOut(500, function() {





        var $span2 = $('<canvas style="padding:10px;" id="projectsCreated" height="auto" width="auto"></canvas>');
        //var $span2 = $('<canvas style="background-color:#F7E109;"  class="col-md-3" id="projectsCreated" height="auto" width="200"></canvas>');
        $("#projectsCreated").replaceWith($span2);
        //$("#openProjects").replaceWith($span2);
        $span2.fadeIn(900);
        //$span2.fadeIn(500);

        var rCM = document.getElementById("projectsCreated").getContext("2d");

        var projectChart = new Chart(rCM).Bar(barChartData);

    });







    }

});*/


$(document).ready(function(){

    $.ajax({ url: "../../ajax/getClientList.php",
                    context: document.body,
                    success: function(html){
                     $("#clientTable").append(html);
                    }});

              getClientData('');
              //drawTimeline1('');
              //drawTimeline2('');

              //drawTimeline('');

    $('#clientTable').on('click','a.client',function(e){
       e.preventDefault();
       e.stopPropagation();
       $("#dropdown").removeClass("open");


       $("#timelineSection").removeClass("hidden");
        //var queryString = window.location.substring( window.location.indexOf('?') + 1 );
        //console.log(queryString);
        var clickedVal = $(this).attr('href');
        console.log(clickedVal);
        //console.log(data);
        var title = clickedVal.substr(clickedVal.indexOf("=") + 1);
        $("#title").text(title);
        getClientData(clickedVal);
        drawTimeline1(clickedVal);
        drawTimeline2(clickedVal);


        $("#timelineSection1").removeClass("hidden");
        $("#timelineSection2").removeClass("hidden");

        /*$('#toggleHistory').on('click','button.service',function(e){

            $("#timelineSection2").addClass("hidden");
            $("#timelineSection1").removeClass("hidden");
            $("#service").addClass("active");
            $("#opps").removeClass("active");

        });
        $('#toggleHistory').on('click','button.opps',function(e){
          //console.log(clickedVal);

          console.log(clickedVal);
          drawTimeline2();
          $("#timelineSection2").removeClass("hidden");
          $("#timelineSection1").addClass("hidden");

          $("#opps").addClass("active");
          $("#service").removeClass("active");


        });*/




    });


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
