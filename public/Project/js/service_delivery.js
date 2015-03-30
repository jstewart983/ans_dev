
function ticketsClosedThisWeek(){

  $.ajax({
    type:"GET",
    url:"../ajax/ticketsClosed.php",
    success:function(json){

        var closed_tickets = [];

        for($i=0;$i<json.length;$i++){

          closed_tickets.push(json[$i]["closedTickets"]);

        }

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
  url:"../ajax/getOpenTicketsService.php",
success:function(json){

  var open_tickets = [];

  for($i=0;$i<json.length;$i++){

    open_tickets.push(json[$i]["openTickets"]);


      }

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
    url:"../ajax/closedFirstCall.php",
    success: function(json){

      var first_call = [];

      for($i=0;$i<json.length;$i++){

        first_call.push(json[$i]["CFC"]);


      }

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
    url:"../ajax/getServiceBillableHours.php",
    success:function(json){

      var total_hours = [];

      for($i=0;$i<json.length;$i++){

        total_hours.push(json[$i]["Billable_Hours"]);

      }

      $("#title #totalBillable").fadeOut(500,function(){

        if(total_hours==0){
          var $span1 = $('<h1 style="text-align:center;" id="closedFirst">0 hrs</h1>');
        }else{
          var $span1 = $('<h1 style="text-align:center;" id="closedFirst">'+Math.round(total_hours)+' hrs</h1>');
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
      url:"../ajax/avgInitialResponse.php",
      success:function(json){

        var avg_response = [];

        for($i=0;$i<json.length;$i++){

          avg_response.push(json[$i]["Average_IRT"]);

        }

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
    url:"../ajax/serviceBillableByMember.php",
    success:function(json){

      var day_labels = [];
      var hours = [];

      for($i=0;$i<json.length;$i++){

        day_labels.push(json[$i]["Week_Day"]);
        hours.push(json[$i]["Billable_Hours"]);

      }

      var data = {
          labels: day_labels,
          datasets: [
              {

                  fillColor: "rgba(220,220,220,0.5)",
                  strokeColor: "rgba(220,220,220,0.8)",
                  highlightFill: "rgba(220,220,220,0.75)",
                  highlightStroke: "rgba(220,220,220,1)",
                  data: hours,
                  label: "Hours"
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

      var ctx = document.getElementById("billableDay").getContext("2d");
      var myNewChart = new Chart(ctx).Bar(data);

    }

  })

}


function newVsOld(){

  $.ajax({

    type:"GET",
    url:"../ajax/closedTicketsTrailingSeven.php",
    success:function(json1){
      var tickets_created = [];
      var tickets_closed = [];
      var day_labels = [];

      $.ajax({

        type:"GET",
        url:"../ajax/openTicketsTrailingSeven.php",
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






$(document).ready(function(){


//closed by service desk and client IT managers
ticketsClosedThisWeek();
setInterval(function(){ ticketsClosedThisWeek(); }, 10000);
//tickets that service delivery is responsible for
ticketsOpen();
setInterval(function(){ ticketsOpen(); }, 10000);

//closed first call % this year
closedFirstCall();

//billable hours this week
getBillableHoursTotal();
setInterval(function(){ getBillableHoursTotal(); }, 60000);


//last 7 business days
avgInitialResponse()


//billable by day - last 7 days
billableByDay();


//new tickets vs tickets closed by day - last 7 days
newVsOld();






























var data2 = [
    {
        value: 30,
        color:"#F7464A",
        highlight: "#FF5A5E",
        label: "Application"
    },
    {
        value: 60,
        color: "#46BFBD",
        highlight: "#5AD3D1",
        label: "Printer"
    },
    {
        value: 12,
        color: "#FDB45C",
        highlight: "#FFC870",
        label: "Internet"
    },
    {
        value: 24,
        color: "#FDB433",
        highlight: "#FFC870",
        label: "Permissions"
    },
    {
        value: 97,
        color: "#E7ff89",
        highlight: "#E7ff80",
        label: "Email"
    }
]



var ctx1 = document.getElementById("ticketsByType").getContext("2d");
var myNewChart1 = new Chart(ctx1).Pie(data2);
legend(document.getElementById("ticketsByTypeLegend"), data2);




});
