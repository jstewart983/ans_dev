
function ticketsClosedThisWeek(){

  $.ajax({
    type:"GET",
    url:"../../ajax/servicedelivery/ticketsClosed.php",
    success:function(json){

        var closed_tickets = [];

        for($i=0;$i<json.length;$i++){

          closed_tickets.push(json[$i]["closedTickets"]);

        }

        $("#title #closedTicketsTitle").fadeOut(500,function(){

          $modal = $('#modal-title').text();

          $title = $('#closedTicketsTitle').text();

          $modal = $title;

          $p = $('<p id="closedTicketsTitle"  style="text-align:center;">'+json[0]["Title"]+' <span><a id="info" data-description="'+json[0]["Description"]+'"  data-datasource="'+json[0]["Datasource"]+'" data-title="'+json[0]["Title"]+'" data-query="'+json[0]["Query"]+'" href="#" class="fui-info-circle"data-toggle="modal"data-target="#basicModal"></a></span></p>');
          $("#closedTicketsTitle").replaceWith($p);
          $p.fadeIn(1200);

        });
        $("#title #ticketsClosed").fadeOut(500,function(){

          if(closed_tickets==0){
            var $span1 = $('<h1 style="text-align:center;" id="ticketsClosed">0</h1>');
          }else{
            var $span1 = $('<h1 style="text-align:center;" id="ticketsClosed">'+closed_tickets+'</h1>');
          }

          //var $span2 = $('<canvas style="background-color:#F7E109;"  class="col-md-3" id="projectsCreated" height="auto" width="200"></canvas>');
          $("#ticketsClosed").replaceWith($span1);
          //$("#openProjects").replaceWith($span2);
          $span1.fadeIn(1200);

        });

    }

  });


}

function ticketsOpen(){

$.ajax({
  type:"GET",
  url:"../../ajax/servicedelivery/getOpenTicketsService.php",
success:function(json){

  var open_tickets = [];

  for($i=0;$i<json.length;$i++){

    open_tickets.push(json[$i]["openTickets"]);


      }
      $("#title #openTicketsTitle").fadeOut(500,function(){
        $title = $('#openTicketsTitle').text();
        $p = $('<p id="openTicketsTitle"  style="text-align:center;">'+json[0]["Title"]+' <span><a id="info" data-description="'+json[0]["Description"]+'"  data-datasource="'+json[0]["Datasource"]+'" data-title="'+json[0]["Title"]+'" data-query="'+json[0]["Query"]+'" href="#" class="fui-info-circle"data-toggle="modal"data-target="#basicModal"></a></span></p>');
        $("#openTicketsTitle").replaceWith($p);
        $p.fadeIn(1200);

      });


      $('#title #openTickets').fadeOut(500, function() {

     if(open_tickets==0){
       var $span1 = $('<h1 style="text-align:center;" id="openTickets">0</h1>');
     }else{
       var $span1 = $('<h1 style="text-align:center;" id="openTickets">'+open_tickets+'</h1>');
     }


     //var $span2 = $('<canvas style="background-color:#F7E109;"  class="col-md-3" id="projectsCreated" height="auto" width="200"></canvas>');
     $("#openTickets").replaceWith($span1);
     //$("#openProjects").replaceWith($span2);
     $span1.fadeIn(1200);

      });

    }
  });
}

function closedFirstCall(){

  $.ajax({
    type:"GET",
    url:"../../ajax/servicedelivery/closedFirstCall.php",
    success: function(json){

      var first_call = [];

      for($i=0;$i<json.length;$i++){

        first_call.push(json[$i]["CFC"]);


      }

      $("#title #closedFirstTitle").fadeOut(500,function(){
        $title = $('#closedFirstTitle').text();
        $p = $('<p id="closedFirstTitle"  style="text-align:center;">'+json[0]["Title"]+' <span><a id="info" data-description="'+json[0]["Description"]+'"  data-datasource="'+json[0]["Datasource"]+'" data-title="'+json[0]["Title"]+'" data-query="'+json[0]["Query"]+'" href="#" class="fui-info-circle"data-toggle="modal"data-target="#basicModal"></a></span></p>');
        $("#closedFirstTitle").replaceWith($p);
        $p.fadeIn(1200);

      });

      $("#title #closedFirst").fadeOut(500,function(){

        if(first_call==0){
          var $span1 = $('<h1 style="text-align:center;" id="closedFirst">0%</h1>');
        }else{
          var $span1 = $('<h1 style="text-align:center;" id="closedFirst">'+Math.round((first_call*100))+'%</h1>');
        }


        //var $span2 = $('<canvas style="background-color:#F7E109;"  class="col-md-3" id="projectsCreated" height="auto" width="200"></canvas>');
        $("#closedFirst").replaceWith($span1);
        //$("#openProjects").replaceWith($span2);
        $span1.fadeIn(1200);

      });

    }


  });


}

function getBillableHoursTotal(){

  $.ajax({
    type:"GET",
    url:"../../ajax/servicedelivery/getServiceBillableHours.php",
    success:function(json){

      var total_hours = [];

      for($i=0;$i<json.length;$i++){

        total_hours.push(json[$i]["computed"]);


      }

      var color = "";

      if(parseInt(json[0]["Difference"])>1){
        color = "#2ECC71;";
        json[0]["Difference"] = "+"+json[0]["Difference"];
      }else{
        color = "#E74C3C;";
      }


      $("#title #totalBillableTitle").fadeOut(500,function(){
        $title = $('#totalBillableTitle').text();
        $p = $('<p id="totalBillableTitle"  style="text-align:center;">'+json[0]["Title"]+' <span><a id="info" data-description="'+json[0]["Description"]+'"  data-datasource="'+json[0]["Datasource"]+'" data-title="'+json[0]["Title"]+'" data-query="'+json[0]["Query"]+'" href="#" class="fui-info-circle"data-toggle="modal"data-target="#basicModal"></a></span></p>');
        $("#totalBillableTitle").replaceWith($p);
        $p.fadeIn(1200);

      });


      $("#title #totalBillable").fadeOut(500,function(){

        if(total_hours==0){
          var $span1 = $('<h1 style="text-align:center;" id="closedFirst">0 hrs</h1><p style="text-align:center;"><span style="text-align:center;color:'+color+'">'+json[0]['Difference']+'</span> vs previous week</p>');
        }else{
          var $span1 = $('<h1 style="text-align:center;" id="closedFirst">'+Math.round(total_hours)+' hrs</h1><p style="text-align:center;"><span style="text-align:center;color:'+color+'">'+json[0]['Difference']+'</span> vs last week</p>');
        }


        //var $span2 = $('<canvas style="background-color:#F7E109;"  class="col-md-3" id="projectsCreated" height="auto" width="200"></canvas>');
        $("#totalBillable").replaceWith($span1);
        //$("#openProjects").replaceWith($span2);
        $span1.fadeIn(1200);

      });

    }

  });

}

function avgInitialResponse(){

    $.ajax({

      type:"GET",
      url:"../../ajax/servicedelivery/avgInitialResponse.php",
      success:function(json){

        var avg_response = [];

        for($i=0;$i<json.length;$i++){

          avg_response.push(json[$i]["Average_IRT"]);

        }

        $("#title #avgResponseTitle").fadeOut(500,function(){
          $title = $('#avgResponseTitle').text();
          $p = $('<p id="avgResponseTitle"  style="text-align:center;">'+json[0]["Title"]+' <span><a id="info" data-description="'+json[0]["Description"]+'"  data-datasource="'+json[0]["Datasource"]+'" data-title="'+json[0]["Title"]+'" data-query="'+json[0]["Query"]+'" href="#" class="fui-info-circle"data-toggle="modal"data-target="#basicModal"></a></span></p>');
          $("#avgResponseTitle").replaceWith($p);
          $p.fadeIn(1200);

        });

        $("#title #avgResponse").fadeOut(500,function(){

          if(avg_response==0){
            var $span1 = $('<h1 style="text-align:center;" id="avgResponse">0 minutes</h1>');
          }else{
            var $span1 = $('<h1 style="text-align:center;" id="avgResponse">'+Math.round(avg_response)+' minutes</h1>');
          }


          //var $span2 = $('<canvas style="background-color:#F7E109;"  class="col-md-3" id="projectsCreated" height="auto" width="200"></canvas>');
          $("#avgResponse").replaceWith($span1);
          //$("#openProjects").replaceWith($span2);
          $span1.fadeIn(1200);

        });

      }
    });



}


function billableByDay(){
  $.ajax({

    type:"GET",
    url:"../../ajax/servicedelivery/billableByMember.php",
    success:function(json){

      function getRandomColor() {
          var letters = '0123456789ABCDEF'.split('');
          var color = '#';
          for (var i = 0; i < 6; i++ ) {
              color += letters[Math.floor(Math.random() * 16)];
          }
          return color;
      }

      var day_labels = ["Mon","Tues","Weds","Thurs","Fri"];
      var members = [];
      var fillColor = [];
      var hours = [];
      var highlightFill = [];
      var highlightStroke = [];



      for($i=0;$i<json.length;$i++){


        members.push(json[$i]["member_id"]);
        hours.push(json[$i]["billable_hours"]);
        fillColor.push("rgba(227, 75, 0, .5)");
        highlightFill.push("rgba(227, 75, 0, .8)");
        highlightStroke.push("rgba(227, 75, 0, .7)");

    }




var data = {
    labels: members,
    datasets: [
        {

            fillColor: "rgba(227, 75, 0, .5)",
            strokeColor: "rgba(227, 75, 0, .8)",
            highlightFill: "rgba(227, 75, 0, .75)",
            highlightStroke: "rgba(227, 75, 0, .1)",
            data:hours,
            label: "Billable hrs"
        }
    ]
};

$("#title #billableDayTitle").fadeOut(500,function(){
  $title = $('#billableDayTitle').text();
  $p = $('<p id="billableDayTitle"  style="text-align:center;">'+json[0]["Title"]+ ' <span><a id="info" data-description="'+json[0]["Description"]+'"  data-datasource="'+json[0]["Datasource"]+'" data-title="'+json[0]["Title"]+'" data-query="'+json[0]["Query"]+'" href="#" class="fui-info-circle"data-toggle="modal"data-target="#basicModal"></a></span></p>');
  $("#billableDayTitle").replaceWith($p);
  $p.fadeIn(1200);

});
$('.sup').empty();
$('.sup').append('<canvas style="padding:10px;width:720px;height:431px;" id="billableDay">');

      var ctx = document.getElementById("billableDay").getContext("2d");
      var myNewChart = new Chart(ctx).Bar(data);

      $("#billableDay").click(function(e) {
         var activeBars = myNewChart.getBarsAtEvent(e);
    //$('#basicModal2').modal('show');
         //$('#basicModal2').find(".modal-title").text(activeBars[0].label);



         $.ajax({
           type:"GET",
           url:"../../ajax/servicedelivery/billableByMember.php?member="+activeBars[0].label,
           success:function(json){
             $('.sup').empty();
             function getRandomColor() {
                 var letters = '0123456789ABCDEF'.split('');
                 var color = '#';
                 for (var i = 0; i < 6; i++ ) {
                     color += letters[Math.floor(Math.random() * 16)];
                 }
                 return color;
             }


             var days = [];
             var fillColor = [];
             var hours = [];
             var highlightFill = [];
             var highlightStroke = [];



             for($i=0;$i<json.length;$i++){


               days.push(json[$i]["day"]);
               hours.push(json[$i]["billable_hours"]);
               fillColor.push("rgba(227, 75, 0, .5)");
               highlightFill.push("rgba(227, 75, 0, .8)");
               highlightStroke.push("rgba(227, 75, 0, .7)");

           }




       var data = {
           labels: days,
           datasets: [
               {

                   fillColor: "rgba(227, 75, 0, .5)",
                   strokeColor: "rgba(227, 75, 0, .8)",
                   highlightFill: "rgba(227, 75, 0, .75)",
                   highlightStroke: "rgba(227, 75, 0, .1)",
                   data:hours,
                   label: "Billable hrs"
               }
           ]
       };
              console.log(data);



              $('.sup').append('<a href="#" id="billableBack"><span class="fui-arrow-left"></span>back </a> <span> '+activeBars[0].label+' has worked '+activeBars[0].value+' hrs this week so far</span><canvas style="padding:10px;width:720px;height:231px;" id="billableDay">');
                 var ctx2 = document.getElementById("billableDay").getContext("2d");
                 var modalChart = new Chart(ctx2).Bar(data);
                console.log(ctx2);
                console.log(modalChart);
           }
         });


      });
      $(".sup").on('click','#billableBack',function(e) {
        $('.sup').empty();
        //$('#dude').empty();
        e.preventDefault();
        $('.sup').append('<canvas style="padding:10px;width:720px;height:231px;" id="billableDay">');

        billableByDay();

      });


    }


  });

}


function newVsOld(){

  $.ajax({

    type:"GET",
    url:"../../ajax/servicedelivery/closedTicketsTrailingSeven.php",
    success:function(json1){
      var tickets_created = [];
      var tickets_closed = [];
      var day_labels = [];

      $.ajax({

        type:"GET",
        url:"../../ajax/servicedelivery/openTicketsTrailingSeven.php",
        success:function(json2){

          for($i=0;$i<json2.length;$i++){

            //day_labels.push(json2[$i]["Week_Day"]);
            tickets_created.push(json2[$i]["Opened_Tickets"]);

          }

          for($i=0;$i<json1.length;$i++){

            day_labels.push(json1[$i]["Week_Day"]);
            tickets_closed.push(json1[$i]["Closed_Tickets"]);

          }


          var data = {
              labels: day_labels,
              datasets: [
                  {

                      fillColor: "rgba(220,220,220,0.5)",
                      strokeColor: "rgba(220,220,220,0.8)",
                      highlightFill: "rgba(220,220,220,0.75)",
                      highlightStroke: "rgba(220,220,220,1)",
                      data:tickets_created,
                      label: "New Tickets"
                  },
                  {

                      fillColor: "rgba(120,220,220,0.5)",
                      strokeColor: "rgba(120,220,220,0.8)",
                      highlightFill: "rgba(120,220,220,0.75)",
                      highlightStroke: "rgba(120,220,220,1)",
                      data:tickets_closed,
                      label: "Tickets Closed"
                  }
              ]
          };

          $("#title #newOldTitle").fadeOut(500,function(){
            //$title = $('#newOldTitle').text();
            $p = $('<p id="newOldTitle"  style="text-align:center;">'+json2[0]["Title"]+' <span><a id="info" data-description="'+json2[0]["Description"]+'"  data-datasource="'+json2[0]["Datasource"]+'" data-title="'+json2[0]["Title"]+'" data-query="'+json2[0]["Query"]+'" href="#" class="fui-info-circle"data-toggle="modal"data-target="#basicModal"></a></span></p>');
            $("#newOldTitle").replaceWith($p);
            $p.fadeIn(1200);

          });

          var ctx = document.getElementById("newOld").getContext("2d");
          var myNewChart = new Chart(ctx).Bar(data);
          legend(document.getElementById("newOldLegend"), data);

          //console.log(tickets_created);
        }

      });




      /*for($i=0;$i<json.length;$i++){

        day_labels.push(json[$i]["Week_Day"]);
        tickets_closed.push(json[$i]["Closed_Tickets"]);

      }*/
      //console.log(tickets_created);


      /*$("#title #billableDay").fadeOut(500,function(){


        $span1 = $('<canvas id ="billableDay"height="auto"width="auto"></canvas>');

        //var $span2 = $('<canvas style="background-color:#F7E109;"  class="col-md-3" id="projectsCreated" height="auto" width="200"></canvas>');
        $("#billableDay").replaceWith($span1);
        //$("#openProjects").replaceWith($span2);
        $span1.fadeIn(1200);

      });*/



    }

  });

}

function getTicketHistory(value,value2,value3){
  if(value != ''){
    var frame = "Day";
  }else{
    var frame = "Month";
  }
  $.ajax({

    type:"GET",
    url:"../../ajax/servicedelivery/ticketCountHistory.php"+value+value2+value3,
    success:function(json){

      var ticket_day_labels = [];
      var hours_day_labels = [];
      var tickets = [];

      var workHours = [];


      $.ajax({
        type:"GET",
        url:"../../ajax/servicedelivery/hoursByMonthResults.php"+value+value2+value3,
        success:function(json1){

          for($i=0;$i<json.length;$i++){
            //var frame = "Month";
            if(frame == "Day"){
              ticket_day_labels.push(json[$i]["month"]+"/"+json[$i]["day"]+"/"+json[$i]["year"]);
            }else{
              ticket_day_labels.push(json[$i]["month"]+"-"+json[$i]["year"]);
            }


            tickets.push(json[$i]["Tickets"]);
            //hours2.push(json[$i]["Closed"]);

          }

          for($i=0;$i<json1.length;$i++){



              //var frame = "Month";
              if(frame == "Day"){
                hours_day_labels.push(json1[$i]["month"]+"/"+json1[$i]["day"]+"/"+json1[$i]["year"]);
              }else{
                hours_day_labels.push(json1[$i]["month"]+"-"+json1[$i]["year"]);
              }
            workHours.push(json1[$i]["Billable_Hours"]);

          }






          var data = {
              labels: ticket_day_labels,
              datasets: [

                  {

                      fillColor: "rgba(220,220,220,0.5)",
                      strokeColor: "rgba(220,220,220,0.8)",
                      pointColor: "rgba(220,220,220,1)",
                      pointStrokeColor: "#fff",
                      pointHighlightFill: "#fff",
                      pointHighlightStroke: "rgba(220,220,220,1)",
                      data: tickets,
                      label: "Tickets Created"
                  }
              ]
          };
          var data2= {
              labels: hours_day_labels,
              datasets: [

                  {
                  fillColor: "rgba(255, 99, 71, .5)",
                  strokeColor: "rgba(255, 99, 71, .8)",
                  pointColor: "rgba(255, 99, 71, 1)",
                  pointStrokeColor: "#fff",
                  pointHighlightFill: "#fff",
                  pointHighlightStroke: "rgba(220,220,220,1)",
                  data: workHours,
                  label: "Hours Worked"
                }
              ]
          };

          /*$("#title #billableDay").fadeOut(500,function(){


            $span1 = $('<canvas id ="billableDay"height="auto"width="auto"></canvas>');

            //var $span2 = $('<canvas style="background-color:#F7E109;"  class="col-md-3" id="projectsCreated" height="auto" width="200"></canvas>');
            $("#billableDay").replaceWith($span1);
            //$("#openProjects").replaceWith($span2);
            $span1.fadeIn(1200);

          });*/


            $("#title #ticketChartTitle").fadeOut(500,function(){
              //$title = $('#newOldTitle').text();
              $p = $('<p id="ticketChartTitle"  style="text-align:center;">'+json[0]["Title"]+' <span><a id="info" data-description="'+json[0]["Description"]+'"  data-datasource="'+json[0]["Datasource"]+'" data-title="'+json[0]["Title"]+'" data-query="'+json[0]["Query"]+"<br />******************<br />"+json1[0]["Query"]+'" href="#" class="fui-info-circle"data-toggle="modal"data-target="#basicModal"></a></span></p>');
              $("#ticketChartTitle").replaceWith($p);
              $p.fadeIn(1200);

            });




          $('#chart').empty();
          $('#chart').append('<p style="text-align:center;">Tickets Opened</p><canvas style="padding:10px;width:90%;height:200px;" id="ticketChart">');
          $('#chart').append('<p style="text-align:center;">Hours Worked</p><canvas style="padding:10px;width:90%;height:200px;" id="hoursChart">');
            var ctx = document.getElementById("ticketChart").getContext("2d");
            var ctx2 = document.getElementById("hoursChart").getContext("2d");
            var ticketChart = new Chart(ctx).Line(data)
            var hoursChart = new Chart(ctx2).Line(data2);



            //legend(document.getElementById("ticketChartLegend"), data);

          }






      });


    }

  });


}

function urgentTickets(){

  $.ajax({
    type:"GET",
    url:"../../ajax/servicedelivery/openUrgentTickets.php",
    success:function(table){



      $('#urgentTicketsTable').fadeOut(600, function() {

            var $span1 = $('<div id ="urgentTicketsTable">'+table+'</div>');



             $("#urgentTicketsTable").replaceWith($span1);

           $span1.fadeIn(800);



          });


    }
  });

}

function topTypes(){

  $.ajax({

    type:"GET",
    url:"../../ajax/servicedelivery/topTypes.php",
    success:function(json){

      //console.log(json);
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
      //console.log(json);
        //labels = ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sept","Oct","Nov","Dec"];
        var xlabels = [], type_count = [],colors = [];
            for(var i = 0; i < json.length; i++) {

                label:xlabels.push(json[i]["type"]);
                //value: type_count.push(json[i]["total_hours"]);
                value: type_count.push(json[i]["typeCount"]);
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



doughnutData = [];



for(var i = 0; i < xlabels.length;i++){
if(xlabels[i] != "undefined"){
  doughnutData.push({
    value:type_count[i],
    color:getRandomColor(),
    highlight:getRandomColor(),
    label:xlabels[i]
  });
}


}
//console.log(doughnutData);
/*doughnutData = [
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
            ];*/


            $("#title #ticketsByTypeTitle1").fadeOut(500,function(){
              //$title = $('#newOldTitle').text();
              $p = $('<p id="ticketsByTypeTitle1"  style="text-align:center;">'+json[0]["Title"]+' <span><a id="info" data-description="'+json[0]["Description"]+'"  data-datasource="'+json[0]["Datasource"]+'" data-title="'+json[0]["Title"]+'" data-query="'+json[0]["Query"]+'" href="#" class="fui-info-circle"data-toggle="modal"data-target="#basicModal"></a></span></p>');
              $("#ticketsByTypeTitle1").replaceWith($p);
              $p.fadeIn(1200);

            });

        $('#title #ticketsByType1').fadeOut(200, function() {





        var $span2 = $('<canvas id="ticketsByType1" style="margin-left:-2px;padding:15px;width:90%;height:90%;""></canvas>');
        //var $span2 = $('<canvas style="background-color:#F7E109;"  class="col-md-3" id="projectsCreated" height="auto" width="200"></canvas>');
        $("#ticketsByType1").replaceWith($span2);
        //$("#openProjects").replaceWith($span2);
        $span2.fadeIn(900);
        //$span2.fadeIn(500);

        var rCM = document.getElementById("ticketsByType1").getContext("2d");

        var projectChart = new Chart(rCM).Doughnut(doughnutData);
        legend(document.getElementById("ticketsByTypeLegend1"), doughnutData);

    });







    }

  });

}

function ticketsByBoard(){

  $.ajax({
    type:'GET',
    url:"../../ajax/managedservices/openTicketsByBoard.php",
    success:function(table){
      $('#boardTable').append(table);
    }

  });


}


$(document).ready(function(){

ticketsByBoard();
topTypes();


});