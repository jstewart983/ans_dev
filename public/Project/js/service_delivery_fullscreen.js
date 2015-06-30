var ticketsClosedByMemberID = null;
var billableByDayID = null;
var billableChart = null;
var ticketsClosedChart = null;
function ticketsClosedThisWeek(){

  $.ajax({
    type:"GET",
    url:"../../../ajax/servicedelivery/ticketsClosed.php",
    success:function(json){

        var closed_tickets = [];

        for($i=0;$i<json.length;$i++){

          closed_tickets.push(json[$i]["closedTickets"]);

        }

        if(parseInt(json[0]["Difference"])>1){
          color = "#2ECC71;";
          json[0]["Difference"] = "+"+json[0]["Difference"];
        }else{
          color = "#E74C3C;";
        }

        var getTicketsClosedText = parseInt($('#ticketsClosed').text());
        if(getTicketsClosedText !== parseInt(closed_tickets)){

        $("#title #closedTicketsTitle").fadeOut(500,function(){

          $modal = $('#modal-title').text();

          $title = $('#closedTicketsTitle').text();

          $modal = $title;

          $p = $('<h5 id="closedTicketsTitle"  style="text-align:center;">'+json[0]["Title"]+'</h5>');
          $("#closedTicketsTitle").replaceWith($p);
          $p.fadeIn(1200);

        });
        $("#title #ticketsClosed").fadeOut(500,function(){

          if(closed_tickets==0){
            var $span1 = $('<h1 style="text-align:center;" id="ticketsClosed">0</h1>');
          }else{
            var $span1 = $('<h1 style="text-align:center;" id="ticketsClosed">'+closed_tickets+'</h1>');
          }
          var $span2 = $('<h5 id="vsTickets" style="text-align:center;"><span style="text-align:center;color:'+color+'">'+json[0]['Difference']+'</span> this time last week</h5>')
          //var $span2 = $('<canvas style="background-color:#F7E109;"  class="col-md-3" id="projectsCreated" height="auto" width="200"></canvas>');
          $("#ticketsClosed").replaceWith($span1);
          //$("#openProjects").replaceWith($span2);
          $("#vsTickets").replaceWith($span2);
          //$("#openProjects").replaceWith($span2);
          $span1.fadeIn(1200);
          $span2.fadeIn(1200);

        });
      }
      $("#dateSwitchTickets #thisWkTickets").fadeOut(500,function(){

        var $button = $('<a style="float:right;"  id="lastWkTickets" class="btn btn-xs btn-info">Last Wk</a>');

        $('#thisWkTickets').replaceWith($button);

        $button.fadeIn(1200);
      });

    }

  });


}

function ticketsOpen(){

$.ajax({
  type:"GET",
  url:"../../../ajax/servicedelivery/getOpenTicketsService.php",
success:function(json){

  var open_tickets = [];

  for($i=0;$i<json.length;$i++){

    open_tickets.push(json[$i]["openTickets"]);


      }

      var getTicketsOpenText = parseInt($('#openTickets').text());
      if(getTicketsOpenText !== parseInt(open_tickets)){
      $("#title #openTicketsTitle").fadeOut(500,function(){
        $title = $('#openTicketsTitle').text();
        $p = $('<h5 id="openTicketsTitle"  style="text-align:center;">'+json[0]["Title"]+'</h5>');
        $("#openTicketsTitle").replaceWith($p);
        $p.fadeIn(1200);

      });
      var existing = parseInt($('#openTickets').text());
      var color = "";
      if(parseInt(open_tickets) > existing ){
        color = parseInt(open_tickets) - parseInt(existing);
        colorhtml = '<span style="color:#E74C3C;" class="fa fa-arrow-up"></span><span style="color:#E74C3C;"> '+color+'</span>';
      }else{
          color = parseInt(open_tickets) - parseInt(existing);
          colorhtml = '<span style="color:#2ECC71;" class="fa fa-arrow-down"></span><span style="color:#2ECC71;"> '+color+'</span>';
      }
//" <span class='fa fa-arrow-down'></span>"+
//" <span class='fa fa-arrow-up'></span> "+
      console.log(color);

      $('#title #vsOpen').fadeOut(500, function() {

        var $replace = $('<h5 id="vsOpen" style="text-align:center;">'+colorhtml+'</h5>');
        $("#vsOpen").replaceWith($replace);
        //$("#openProjects").replaceWith($span2);
        $replace.fadeIn(1200);
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
    }
  });
}

function closedFirstCall(){

  $.ajax({
    type:"GET",
    url:"../../../ajax/servicedelivery/closedFirstCall.php",
    success: function(json){

      var first_call = [];

      for($i=0;$i<json.length;$i++){

        first_call.push(json[$i]["CFC"]);


      }
      var firstCallText = $('#closedFirst').text();
      firstCallText = firstCallText.substring(0,firstCallText.indexOf('%'));
      firstCallText = parseInt(firstCallText);
      if(firstCallText !== Math.round((first_call*100))){

      $("#title #closedFirstTitle").fadeOut(500,function(){
        $title = $('#closedFirstTitle').text();
        $p = $('<h5 id="closedFirstTitle"  style="text-align:center;">'+json[0]["Title"]+'</h5>');
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
    }


  });


}

function getBillableHoursTotal(){

  $.ajax({
    type:"GET",
    url:"../../../../ajax/servicedelivery/getServiceBillableHours.php",
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

      //$("#totalBillableTitle").empty();
      $("#title #totalBillableTitle").fadeOut(500,function(){
        $title = $('#totalBillableTitle').text();
        $p = $('<h5 id="totalBillableTitle"  style="text-align:center;">'+json[0]["Title"]+'</h5>');
        $("#totalBillableTitle").replaceWith($p);
        $p.fadeIn(1200);

      });

      //$("#totalBillable").empty();
      $("#title #totalBillable").fadeOut(500,function(){


          var $span1 = $('<h1 style="text-align:center;" id="totalBillable">'+Math.round(total_hours)+' hrs</h1>');
          var $span2 = $('<h5 id="vs" style="text-align:center;"><span style="text-align:center;color:'+color+'">'+json[0]['Difference']+'</span> this time last week</h5>')


        //var $span2 = $('<canvas style="background-color:#F7E109;"  class="col-md-3" id="projectsCreated" height="auto" width="200"></canvas>');
        $("#totalBillable").replaceWith($span1);
        $("#vs").replaceWith($span2);
        //$("#openProjects").replaceWith($span2);
        $span1.fadeIn(1200);
        $span2.fadeIn(1200);

      });

      $("#dateSwitch #thisWk").fadeOut(500,function(){

        var $button = $('<a style="float:right;"  id="lastWk" class="btn btn-xs btn-info">Last Wk</a>');

        $('#thisWk').replaceWith($button);

        $button.fadeIn(1200);
      });



    }

  });
  if(totalID){
    clearInterval(totalID);
    var totalID = setInterval(function(){ getBillableHoursTotal(); }, 3000);
  }

}

function avgInitialResponse(){

    $.ajax({

      type:"GET",
      url:"../../../ajax/servicedelivery/avgInitialResponse.php",
      success:function(json){

        var avg_response = [];

        for($i=0;$i<json.length;$i++){

          avg_response.push(json[$i]["Average_IRT"]);

        }
        if(parseInt(json[0]["Difference"])>1){
          color = "#E74C3C;";
          json[0]["Difference"] = "+"+json[0]["Difference"];
        }else{
          color = "#2ECC71;";
        }

        var avg_responseText = parseInt($('#avgResponse').text());
        if(avg_responseText !== Math.round(avg_response)){

        $("#title #avgResponseTitle").fadeOut(500,function(){
          $title = $('#avgResponseTitle').text();
          $p = $('<h5 id="avgResponseTitle"  style="text-align:center;">'+json[0]["Title"]+'</h5>');
          $("#avgResponseTitle").replaceWith($p);
          $p.fadeIn(1200);

        });

        $("#title #avgResponse").fadeOut(500,function(){

          if(avg_response==0){
            var $span1 = $('<h1 style="text-align:center;" id="avgResponse">0 minutes</h1>');
          }else{
            var $span1 = $('<h1 style="text-align:center;" id="avgResponse">'+Math.round(avg_response)+' minutes</h1>');
          }

          $('#title #vsAvgResponse').fadeOut(500,function(){
            var $span2 = $('<h5 id="vsAvgResponse" style="text-align:center;"><span style="text-align:center;color:'+color+'">'+json[0]['Difference']+'</span> vs last week</h5>')
            $("#vsAvgResponse").replaceWith($span2);
            $span2.fadeIn(1200);



          });


          //var $span2 = $('<canvas style="background-color:#F7E109;"  class="col-md-3" id="projectsCreated" height="auto" width="200"></canvas>');
          $("#avgResponse").replaceWith($span1);
          //$("#openProjects").replaceWith($span2);
          $span1.fadeIn(1200);

        });
        $("#dateSwitchResponse #thisWkResponse").fadeOut(500,function(){

          var $button = $('<a style="float:right;"  id="lastWkResponse" class="btn btn-xs btn-info">Last Wk</a>');

          $('#thisWkResponse').replaceWith($button);

          $button.fadeIn(1200);
        });

      }
      }
    });



}



function avgInitialResponseLastWeek(){

    $.ajax({

      type:"GET",
      url:"../../../ajax/servicedelivery/avgInitialResponseLastWeek.php",
      success:function(json){

        var avg_response = [];

        for($i=0;$i<json.length;$i++){

          avg_response.push(json[$i]["Average_IRT"]);

        }
        if(parseInt(json[0]["Difference"])>1){
          color = "#E74C3C;";
          json[0]["Difference"] = "+"+json[0]["Difference"];
        }else{
          color = "#2ECC71;";
        }

        var avg_responseText = parseInt($('#avgResponse').text());
        if(avg_responseText !== Math.round(avg_response)){

        $("#title #avgResponseTitle").fadeOut(500,function(){
          $title = $('#avgResponseTitle').text();
          $p = $('<h5 id="avgResponseTitle"  style="text-align:center;">'+json[0]["Title"]+' <span><a id="info" data-description="'+json[0]["Description"]+'"  data-datasource="'+json[0]["Datasource"]+'" data-title="'+json[0]["Title"]+'" data-query="'+json[0]["Query"]+'" href="#" class="fui-info-circle"data-toggle="modal"data-target="#basicModal"></a></span></h5>');
          $("#avgResponseTitle").replaceWith($p);
          $p.fadeIn(1200);

        });

        $("#title #avgResponse").fadeOut(500,function(){

          if(avg_response==0){
            var $span1 = $('<h1 style="text-align:center;" id="avgResponse">0 minutes</h1>');
          }else{
            var $span1 = $('<h1 style="text-align:center;" id="avgResponse">'+Math.round(avg_response)+' minutes</h1>');
          }

          $('#title #vsAvgResponse').fadeOut(500,function(){
            var $span2 = $('<h5 id="vsAvgResponse" style="text-align:center;"><span style="text-align:center;color:'+color+'">'+json[0]['Difference']+'</span> vs previous week</h5>')
            $("#vsAvgResponse").replaceWith($span2);
            $span2.fadeIn(1200);



          });


          //var $span2 = $('<canvas style="background-color:#F7E109;"  class="col-md-3" id="projectsCreated" height="auto" width="200"></canvas>');
          $("#avgResponse").replaceWith($span1);
          //$("#openProjects").replaceWith($span2);
          $span1.fadeIn(1200);

        });
        $("#dateSwitchResponse #lastWkResponse").fadeOut(500,function(){

          var $button = $('<a style="float:right;"  id="thisWkResponse" class="btn btn-xs btn-inverse">This Wk</a>');

          $('#lastWkResponse').replaceWith($button);

          $button.fadeIn(1200);
        });
      }
      }
    });



}


function billableByDay(ranges,datetype){
  //$('#billableDay').remove();

  $.ajax({

    type:"GET",
    url:"../../../ajax/servicedelivery/billableByMember.php"+ranges+datetype,
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



if(billableChart == null){


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
  $p = $('<h5 id="billableDayTitle"  style="text-align:center;">'+json[0]["Title"]+ '</h5>');
  $("#billableDayTitle").replaceWith($p);
  $p.fadeIn(1200);

});
$('#sup').empty();
$('#sup').replaceWith('<div id="sup"><canvas style="padding:10px;width:auto;height:100px;" id="billableDay"></div>');

      var ctx = document.getElementById("billableDay").getContext("2d");
       billableChart = new Chart(ctx).Bar(data);

}else{
  var chartLabels = [];
for(i=0;i<billableChart.datasets[0].bars.length;i++){
chartLabels.push(billableChart.datasets[0].bars[i].label);
}
  for(var i= 0; i < json.length;i++ ){

    for(var j = 0; j<billableChart.datasets[0].bars.length;j++){
        if(billableChart.datasets[0].bars[j].label == json[i]['member_id']){
          billableChart.datasets[0].bars[j].value = json[i]['billable_hours'];
        }/*else if(jQuery.inArray( json[i]['member_id'], billableChart.datasets[0].labels) == -1){

          billableChart.addData(json[i]['billable_hours'], json[i]['member_id']);

        }*/
      }
      if(jQuery.inArray(json[i]['member_id'], chartLabels) == -1){

        billableChart.addData(json[i]['billable_hours'], json[i]['member_id']);

      }
  }
      billableChart.update();


}
      $("#billableDay").click(function(e) {
        clearInterval(billableByDayID);
         var activeBars = billableChart.getBarsAtEvent(e);
    	    //$('#basicModal2').modal('show');
         //$('#basicModal2').find(".modal-title").text(activeBars[0].label);

         if(ranges && datetype !== ''){
           var memberurl = "../../../ajax/servicedelivery/billableByMember.php"+ranges+datetype+"&member="+activeBars[0].label;
         }else{
           var memberurl = "../../../ajax/servicedelivery/billableByMember.php?member="+activeBars[0].label+"&datetype=day";
         }

         $.ajax({
           type:"GET",
           url:memberurl,
           success:function(json){
             $('#sup').empty();
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


              $('#sup').empty();
              $('#sup').append('<a href="#" id="billableBack"><span class="fui-arrow-left"></span>back </a> <span> '+activeBars[0].label+': <span id="memberHours"></span></span><canvas style="padding:10px;width:auto;height:100px;" id="billableDay">');
                 var ctx2 = document.getElementById("billableDay").getContext("2d");
                 var modalChart = new Chart(ctx2).Bar(data);
                //console.log(ctx2);
                //console.log(modalChart);
                var total_hours = parseInt(activeBars[0].value);
                var options = {useEasing : true,useGrouping : true,separator : ',',decimal : '.',prefix : '',suffix : 'hrs'}

                var hours = new countUp("memberHours", 0, total_hours, 0, 2,options);
                hours.start();


           }
         });


      });
      $("#sup").on('click','#billableBack',function(e) {

        $('#daterange4').val('');
        $('#sup').empty();
        //$('#billableDay').remove();
        //$('#dude').empty();
        e.preventDefault();
        //$('.sup').append('<canvas style="padding:10px;width:720px;height:231px;" id="billableDay">');
        billableByDay('','');
        billableByDayID = setInterval(function(){billableByDay('','');},20000);

      });


    }


  });

}


function newVsOld(value){

  $.ajax({

    type:"GET",
    url:"../../../ajax/servicedelivery/closedTicketsTrailingSeven.php"+value,
    success:function(json1){
      var tickets_created = [];
      var tickets_closed = [];
      var day_labels = [];

      $.ajax({

        type:"GET",
        url:"../../../ajax/servicedelivery/openTicketsTrailingSeven.php"+value,
        success:function(json2){

          for($i=0;$i<json2.length;$i++){

            //day_labels.push(json2[$i]["Week_Day"]);
            tickets_created.push(json2[$i]["Opened_Tickets"]);
            day_labels.push(json2[$i]["Week_Day"]);
          }

          for($i=0;$i<json1.length;$i++){


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
            $p = $('<h5 id="newOldTitle"  style="text-align:center;">'+json2[0]["Title"]+' <span><a id="info" data-description="'+json2[0]["Description"]+'"  data-datasource="'+json2[0]["Datasource"]+'" data-title="'+json2[0]["Title"]+'" data-query="'+json2[0]["Query"]+'" href="#" class="fui-info-circle"data-toggle="modal"data-target="#basicModal"></a></span></h5>');
            $("#newOldTitle").replaceWith($p);
            $p.fadeIn(1200);

          });

          if(value == '?lastwk=true'){
            $("#dateSwitchTrailing #lastWkTrailing").fadeOut(500,function(){

              var $button = $('<a style="float:right;"  id="thisWkTrailing" class="btn btn-xs btn-inverse">This Wk</a>');

              $('#lastWkTrailing').replaceWith($button);

              $button.fadeIn(1200);
            });

          }else{

            $("#dateSwitchTrailing #thisWkTrailing").fadeOut(500,function(){

              var $button = $('<a style="float:right;"  id="lastWkTrailing" class="btn btn-xs btn-info">Last Wk</a>');

              $('#thisWkTrailing').replaceWith($button);

              $button.fadeIn(1200);
            });
          }



          $('#newOldChart').empty();
          $('#newOldChart').append('<canvas style="margin-left:-2px;padding:15px;width:90%;height:200px;" id="newOld"></canvas>');
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
    url:"../../../ajax/servicedelivery/ticketCountHistory.php"+value+value2+value3,
    success:function(json){

      var ticket_day_labels = [];
      var hours_day_labels = [];
      var tickets = [];

      var workHours = [];


      $.ajax({
        type:"GET",
        url:"../../../ajax/servicedelivery/hoursByMonthResults.php"+value+value2+value3,
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
              $p = $('<h5 id="ticketChartTitle"  style="text-align:center;">'+json[0]["Title"]+' <span><a id="info" data-description="'+json[0]["Description"]+'"  data-datasource="'+json[0]["Datasource"]+'" data-title="'+json[0]["Title"]+'" data-query="'+json[0]["Query"]+"<br />******************<br />"+json1[0]["Query"]+'" href="#" class="fui-info-circle"data-toggle="modal"data-target="#basicModal"></a></span></h5>');
              $("#ticketChartTitle").replaceWith($p);
              $p.fadeIn(1200);

            });




          $('#chart').empty();
          $('#chart').append('<h5 style="text-align:center;">Tickets Opened</h5><canvas style="padding:10px;width:90%;height:200px;" id="ticketChart">');
          $('#chart').append('<h5 style="text-align:center;">Hours Worked</h5><canvas style="padding:10px;width:90%;height:200px;" id="hoursChart">');
            var ctx = document.getElementById("ticketChart").getContext("2d");
            var ctx2 = document.getElementById("hoursChart").getContext("2d");
            var ticketChart = new Chart(ctx).Line(data);
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
    url:"../../../ajax/servicedelivery/openUrgentTickets.php",
    success:function(table){



      $('#urgentTicketsTable').fadeOut(600, function() {

            var $span1 = $('<div id ="urgentTicketsTable">'+table+'</div>');



             $("#urgentTicketsTable").replaceWith($span1);

           $span1.fadeIn(800);



          });


    }
  });

}

function topTypes(value,value2,value3){

  $.ajax({

    type:"GET",
    url:"../../../ajax/servicedelivery/topTypes.php"+value+value2+value3,
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



            $("#title #ticketsByTypeTitle").fadeOut(500,function(){
              //$title = $('#newOldTitle').text();
              $p = $('<h5 id="ticketsByTypeTitle"  style="text-align:center;">'+json[0]["Title"]+' <span><a id="info" data-description="'+json[0]["Description"]+'"  data-datasource="'+json[0]["Datasource"]+'" data-title="'+json[0]["Title"]+'" data-query="'+json[0]["Query"]+'" href="#" class="fui-info-circle"data-toggle="modal"data-target="#basicModal"></a></span></h5>');
              $("#ticketsByTypeTitle").replaceWith($p);
              $p.fadeIn(1200);

            });

        $('#title #ticketsByType').fadeOut(200, function() {





        var $span2 = $('<canvas id="ticketsByType" style="margin-left:-2px;padding:15px;width:90%;height:90%;""></canvas>');
        //var $span2 = $('<canvas style="background-color:#F7E109;"  class="col-md-3" id="projectsCreated" height="auto" width="200"></canvas>');
        $("#ticketsByType").replaceWith($span2);
        //$("#openProjects").replaceWith($span2);
        $span2.fadeIn(900);
        //$span2.fadeIn(500);

        var rCM = document.getElementById("ticketsByType").getContext("2d");

        var projectChart = new Chart(rCM).Doughnut(doughnutData);
        legend(document.getElementById("ticketsByTypeLegend"), doughnutData);

    });







    }

  });

}

function getBillableLastWeek(){

  $.ajax({
    type:"GET",
    url:"../../../ajax/fieldservices/getHoursLastWeek.php",
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

      var totalHoursText = parseInt($('#totalBillable').text());
      if(totalHoursText !== Math.round(total_hours)){

      $("#title #totalBillableTitle").fadeOut(500,function(){
        $title = $('#totalBillableTitle').text();
        $p = $('<h5 id="totalBillableTitle"  style="text-align:center;">'+json[0]["Title"]+'</h5>');
        $("#totalBillableTitle").replaceWith($p);
        $p.fadeIn(1200);

      });


      $("#title #totalBillable").fadeOut(500,function(){


          var $span1 = $('<h1 style="text-align:center;" id="totalBillable">'+Math.round(total_hours)+' hrs</h1>');


        //var $span2 = $('<canvas style="background-color:#F7E109;"  class="col-md-3" id="projectsCreated" height="auto" width="200"></canvas>');
        $("#totalBillable").replaceWith($span1);
        //$("#openProjects").replaceWith($span2);
        $span1.fadeIn(1200);

      });

      $('#title #vs').fadeOut(500,function(){
        var $span2 = $('<h5 id="vs" style="text-align:center;"><span style="text-align:center;color:'+color+'">'+json[0]['Difference']+'</span> vs previous week</h5>')
        $("#vs").replaceWith($span2);
        $span2.fadeIn(1200);



      });

      $("#dateSwitch #lastWk").fadeOut(500,function(){

        var $button = $('<a style="float:right;"  id="thisWk" class="btn btn-xs btn-inverse">This Wk</a>');

        $('#lastWk').replaceWith($button);

        $button.fadeIn(1200);
      });
    }
    }

  });
}



function getTicketsClosedLastWeek(){

  $.ajax({
    type:"GET",
    url:"../../../ajax/servicedelivery/getTicketsClosedLastWeek.php",
    success:function(json){

      var total_hours = [];

      for($i=0;$i<json.length;$i++){

        total_hours.push(json[$i]["closedTickets"]);


      }

      var color = "";

      if(parseInt(json[0]["Difference"])>1){
        color = "#2ECC71;";
        json[0]["Difference"] = "+"+json[0]["Difference"];
      }else{
        color = "#E74C3C;";
      }

      //var totalHoursText = parseInt($('#ticketsClosed').text());
      //if(totalHoursText !== Math.round(total_hours)){

      $("#title #closedTicketsTitle").fadeOut(500,function(){
        $title = $('#closedTicketsTitle').text();
        $p = $('<h5 id="closedTicketsTitle"  style="text-align:center;">'+json[0]["Title"]+'</h5>');
        $("#closedTicketsTitle").replaceWith($p);
        $p.fadeIn(1200);

      });


      $("#title #ticketsClosed").fadeOut(500,function(){


          var $span1 = $('<h1 style="text-align:center;" id="ticketsClosed">'+Math.round(total_hours)+'</h1>');


        //var $span2 = $('<canvas style="background-color:#F7E109;"  class="col-md-3" id="projectsCreated" height="auto" width="200"></canvas>');
        $("#ticketsClosed").replaceWith($span1);
        //$("#openProjects").replaceWith($span2);
        $span1.fadeIn(1200);

      });

      $('#title #vsTickets').fadeOut(500,function(){
        var $span2 = $('<h5 id="vsTickets" style="text-align:center;"><span style="text-align:center;color:'+color+'">'+json[0]['Difference']+'</span> vs previous week</h5>')
        $("#vsTickets").replaceWith($span2);
        $span2.fadeIn(1200);



      });

      $("#dateSwitchTickets #lastWkTickets").fadeOut(500,function(){

        var $button = $('<a style="float:right;"  id="thisWkTickets" class="btn btn-xs btn-inverse">This Wk</a>');

        $('#lastWkTickets').replaceWith($button);

        $button.fadeIn(1200);
      });
    //}
    }

  });
}



function legendHours(parent, data) {
    parent.className = 'legend';
    var datas = data.hasOwnProperty('datasets') ? data.datasets : data;

    // remove possible children of the parent
    while(parent.hasChildNodes()) {
        parent.removeChild(parent.lastChild);
    }

    datas.forEach(function(d) {
        var title = document.createElement('span');
        title.className = 'title';
        parent.appendChild(title);

        var colorSample = document.createElement('div');
        colorSample.className = 'color-sample';
        colorSample.style.backgroundColor = d.hasOwnProperty('strokeColor') ? d.strokeColor : d.color;
        colorSample.style.borderColor = d.hasOwnProperty('fillColor') ? d.fillColor : d.color;
        title.appendChild(colorSample);

        var text1 = document.createTextNode(d.label);
        var text2 = document.createTextNode(d.value);
        var space = document.createTextNode(": ");
        var suffix = document.createTextNode("hrs");
        title.appendChild(text1);
        title.appendChild(space);
        title.appendChild(text2);
        title.appendChild(suffix);
    });
}


function topClients(value){

  $.ajax({

    type:"GET",
    url:"../../../ajax/servicedelivery/hoursByClient.php"+value,
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
        var companies = [], clientHours = [],colors = [];
            for(var i = 0; i < json.length; i++) {

                label:companies.push(json[i]["co"]);
                //value: type_count.push(json[i]["total_hours"]);
                value: clientHours.push(json[i]["clientHours"]);
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


doughnutDataHours = [];



for(var i = 0; i < companies.length;i++){
if(companies[i] != "undefined"){

  doughnutDataHours.push({
    value:clientHours[i],
    color:getRandomColor(),
    highlight:getRandomColor(),
    label:companies[i]
  });

  }


}

            $("#title #clientsByHoursTitle").fadeOut(500,function(){
              //$title = $('#newOldTitle').text();
              $p = $('<h5 id="clientsByHoursTitle"  style="text-align:center;">'+json[0]["Title"]+' <span><a id="info" data-description="'+json[0]["Description"]+'"  data-datasource="'+json[0]["Datasource"]+'" data-title="'+json[0]["Title"]+'" data-query="'+json[0]["Query"]+'" href="#" class="fui-info-circle"data-toggle="modal"data-target="#basicModal"></a></span></h5>');
              $("#clientsByHoursTitle").replaceWith($p);
              $p.fadeIn(1200);

            });

        $('#title #clientsByHours').fadeOut(200, function() {





        var $span2 = $('<canvas id="clientsByHours" style="margin-left:-2px;padding:15px;width:90%;height:90%;""></canvas>');
        //var $span2 = $('<canvas style="background-color:#F7E109;"  class="col-md-3" id="projectsCreated" height="auto" width="200"></canvas>');
        $("#clientsByHours").replaceWith($span2);
        //$("#openProjects").replaceWith($span2);
        $span2.fadeIn(900);
        //$span2.fadeIn(500);
        var options =
    {
        tooltipTemplate: "<%= value %>",

        onAnimationComplete: function()
        {
            this.showTooltip(this.segments, true);
        },

        tooltipEvents: [],

        showTooltips: true
    }
        var rCM1 = document.getElementById("clientsByHours").getContext("2d");
        var clientHoursChart = new Chart(rCM1).Doughnut(doughnutDataHours,options);
        legendHours(document.getElementById("clientsByHoursLegend"), doughnutDataHours);

    });

    }

  });

}


function ticketsByBoard(){

  $('#boardTable').replaceWith('<ul id="boardTable" class="nav nav-pills"></ul>');

  var colors = ['#A0EEC0','#50C5B7','#9CEC5B','#8AE9C1'];
  $.ajax({
    type:'GET',
    url:"../../../ajax/managedservices/openTicketsByBoard.php",
    success:function(json){
      var board_name = '';
      for(var $i = 0; $i < json.length;$i++){
        board_name = json[$i]['board_name'];
        $('<a class="btn" id="board" href="?board='+board_name.replace(' ','%20')+'" style="margin-right:5px;background-color:'+colors[$i]+'" href="#">'+json[$i]['board_name']+' '+json[$i]['openTickets']+'</a>').hide().appendTo("#boardTable").fadeIn(500);


      }



    }

  });


}

function ticketsByBoardService(){

  $('#boardTable').empty();

  var colors = ['#A0EEC0','#50C5B7','#9CEC5B','#8AE9C1'];
  $.ajax({
    type:'GET',
    url:"../../../ajax/managedservices/openTicketsByBoard.php",
    success:function(json){
      var board_name = '';
      var html = '';
      for(var $i = 0; $i < json.length;$i++){

        board_name = json[$i]['board_name'];
        html = html + '<a class="btn" id="board" href="?board='+board_name.replace(' ','%20')+'" style="margin-right:5px;background-color:'+colors[$i]+'" href="#">'+json[$i]['board_name']+' '+json[$i]['openTickets']+'</a>';


      }



      //$p = $(html);

      $('#boardTable').empty();
      $('#boardTable').replaceWith('<ul id="boardTable" class="nav nav-pills">'+html+'</ul>');



    }

  });


}

function tickets(board){
  $("#allTickets").empty();
  $.ajax({
    type:'GET',
    url:"../../../ajax/getTickets.php"+board,
    success:function(json){

      $(json).hide().appendTo("#allTickets").fadeIn(500);
    }

  });

}





function ticketsClosedByMember(ranges,datetype){
  //$('#billableDay').remove();

  $.ajax({

    type:"GET",
    url:"../../../ajax/servicedelivery/closedTicketsByMember.php"+ranges+datetype,
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
        hours.push(json[$i]["ticketsMember"]);
        fillColor.push("rgba(227, 75, 0, .5)");
        highlightFill.push("rgba(227, 75, 0, .8)");
        highlightStroke.push("rgba(227, 75, 0, .7)");

    }
if(ticketsClosedChart == null){






var data = {
    labels: members,
    datasets: [
        {

          fillColor: "rgba(134, 205, 130, .5)",
          strokeColor: "rgba(134, 205, 130, .8)",
          highlightFill: "rgba(134, 205, 130, .75)",
          highlightStroke: "rgba(134, 205, 130, .1)",
            data:hours,
            label: "Tickets Closed"
        }
    ]
};

$("#title #memberTicketsTitle").fadeOut(500,function(){
  $title = $('#memberTicketsTitle').text();
  $p = $('<h5 id="memberTicketsTitle"  style="text-align:center;">'+json[0]["Title"]+ '</h5>');
  $("#memberTicketsTitle").replaceWith($p);
  $p.fadeIn(1200);

});
$('#memberTicketsChart').empty();
$('#memberTicketsChart').replaceWith('<div id="memberTicketsChart"><canvas style="padding:10px;width:auto;height:100px;" id="memberTickets"></div>');

      var ctx = document.getElementById("memberTickets").getContext("2d");
      ticketsClosedChart = new Chart(ctx).Bar(data);

}else{
  var chartLabels = [];
  for(i=0;i<billableChart.datasets[0].bars.length;i++){
    chartLabels.push(billableChart.datasets[0].bars[i].label);
  }
  for(var i= 0; i < json.length;i++ ){

    for(var j = 0; j < ticketsClosedChart.datasets[0].bars.length;j++){

        if(ticketsClosedChart.datasets[0].bars[j].label == json[i]['member_id']){
          ticketsClosedChart.datasets[0].bars[j].value = json[i]['ticketsMember'];
        }/*else{

          ticketsClosedChart.addData(json[i]['ticketsMember'], json[i]['member_id']);

        }*/
      }
      if(jQuery.inArray(json[i]['member_id'], chartLabels) == -1){

              billableChart.addData(json[i]['ticketsMember'], json[i]['member_id']);

            }
  }
      ticketsClosedChart.update();



}
      $("#memberTicketsChart").on('click','#memberTickets',function(e) {
        clearInterval(ticketsClosedByMemberID);
         var activeBars = myNewChart1.getBarsAtEvent(e);
    	    //$('#basicModal2').modal('show');
         //$('#basicModal2').find(".modal-title").text(activeBars[0].label);

         if(ranges && datetype !== ''){
           var memberurl = "../../../ajax/servicedelivery/closedTicketsByMember.php"+ranges+datetype+"&member="+activeBars[0].label;
         }else{
           var memberurl = "../../../ajax/servicedelivery/closedTicketsByMember.php?member="+activeBars[0].label+"&datetype=day";
         }

         $.ajax({
           type:"GET",
           url:memberurl,
           success:function(json){
             //$('#memberTicketsChart').empty();
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
                 hours.push(json[$i]["ticketsMember"]);
                 fillColor.push("rgba(227, 75, 0, .5)");
                 highlightFill.push("rgba(227, 75, 0, .8)");
                 highlightStroke.push("rgba(227, 75, 0, .7)");

               }







       var data = {
           labels: days,
           datasets: [
               {

                   fillColor: "rgba(134, 205, 130, .5)",
                   strokeColor: "rgba(134, 205, 130, .8)",
                   highlightFill: "rgba(134, 205, 130, .75)",
                   highlightStroke: "rgba(134, 205, 130, .1)",
                   data:hours,
                   label: "Tickets Closed"
               }
           ]
       };
              //console.log(data);


              $('#memberTicketsChart').empty();
              $('#memberTicketsChart').append('<a href="#" id="memberTicketsBack"><span class="fui-arrow-left"></span>back </a> <span> '+activeBars[0].label+': <span id="memberTicketsCount"></span></span><canvas style="padding:10px;width:auto;height:100px;" id="memberTickets"></canvas>');
                 var ctx3 = document.getElementById("memberTickets").getContext("2d");
                 var modalChart1 = new Chart(ctx3).Bar(data);
                //console.log(ctx2);
                //console.log(modalChart);
                var total_hours = parseInt(activeBars[0].value);
                var options = {useEasing : true,useGrouping : true,separator : ',',decimal : '.',prefix : '',suffix : ' tickets'}

                var tickets = new countUp("memberTicketsCount", 0, total_hours, 0, 2,options);
                tickets.start();


           }
         });


      });
      $("#memberTicketsChart").on('click','#memberTicketsBack',function(e) {
        e.preventDefault();
        $('#daterange5').val('');
        $('#memberTicketsChart').empty();
        //$('#billableDay').remove();
        //$('#dude').empty();

        //$('.sup').append('<canvas style="padding:10px;width:720px;height:231px;" id="billableDay">');
        ticketsClosedByMember('','');
        ticketsClosedByMemberID = setInterval(function(){ ticketsClosedByMember('',''); },20000);

      });


    }


  });

}







$(document).ready(function(){




//closed by service desk and client IT managers
ticketsClosedThisWeek();
var totalTicketsID = setInterval(function(){ ticketsClosedThisWeek(); }, 10000);


ticketsOpen();
setInterval(function(){ ticketsOpen(); }, 10000);


//ticketsByBoardService();
//setInterval(function(){ ticketsByBoardService(); }, 60000);


//billable hours this week
getBillableHoursTotal();
var totalID = setInterval(function(){ getBillableHoursTotal(); }, 10000);


//closed first call % this year
closedFirstCall();
setInterval(function(){ closedFirstCall(); }, 10000);


//last 7 business days
avgInitialResponse();
var responseID = setInterval(function(){ avgInitialResponse(); }, 10000);


//billable by day - last 7 days
billableByDay('','');
//setInterval(function(){ billableByDay('',''); }, 60000);
billableByDayID = setInterval(function(){billableByDay('','');},20000);

ticketsClosedByMember('','');
ticketsClosedByMemberID = setInterval(function(){ ticketsClosedByMember('',''); },20000);
//new tickets vs tickets closed by day - last 7 days
//newVsOld('');
//var trailingID = setInterval(function(){ newVsOld(''); }, 60000);

//urgent tickets that are open
//urgentTickets();
//setInterval(function(){ urgentTickets(); }, 100000);



//top tickets by service type this week
//topTypes('','','');
//topClients('');
//setInterval(function(){ topTypes(); }, 60000);

/*$.ajax({
  url: "../../../ajax/clientservices/getClientList2.php",
                context: document.body,

                success: function(html){
                 $("#client2").append(html);

                }

                });


$.ajax({
url: "../../../ajax/servicedelivery/getMembers.php",
context: document.body,
success: function(html){
$("#member").append(html);

}

});



$.ajax({
  url: "../../../ajax/clientservices/getClientList2.php",
                context: document.body,

                success: function(html){
                 $("#client").append(html);

                }

                });

                $.ajax({
                  url: "../../../ajax/getServiceTypes.php",
                                context: document.body,

                                success: function(html){
                                 $("#typeTable").append(html);

                                }

                              });*/

//Ticket count since the beginning of time(for ANS)
//getTicketHistory('','','');

//Ticket count since the beginning of time(for ANS)
//getTicketHistory();

$('#dateSwitch').on('click','#lastWk',function(e){
clearInterval(totalID);
e.preventDefault();
getBillableLastWeek();



});

$('#dateSwitch').on('click','#thisWk',function(e){

e.preventDefault();
getBillableHoursTotal();
//var totalID = setInterval(function(){ getBillableHoursTotal(); }, 3000);



});

$('#dateSwitchTickets').on('click','#lastWkTickets',function(e){
clearInterval(totalTicketsID);
e.preventDefault();
getTicketsClosedLastWeek();



});

$('#dateSwitchTickets').on('click','#thisWkTickets',function(e){

e.preventDefault();
ticketsClosedThisWeek();
//var totalID = setInterval(function(){ getBillableHoursTotal(); }, 3000);



});

$('#dateSwitchResponse').on('click','#lastWkResponse',function(e){
clearInterval(responseID);
e.preventDefault();
avgInitialResponseLastWeek();



});

$('#dateSwitchResponse').on('click','#thisWkResponse',function(e){

e.preventDefault();
avgInitialResponse();
//var totalID = setInterval(function(){ getBillableHoursTotal(); }, 3000);



});


$('#dateSwitchTrailing').on('click','#lastWkTrailing',function(e){
clearInterval(trailingID);
e.preventDefault();
newVsOld('?lastwk=true');



});

$('#dateSwitchTrailing').on('click','#thisWkTrailing',function(e){

e.preventDefault();
newVsOld('');
//var totalID = setInterval(function(){ getBillableHoursTotal(); }, 3000);



});


// Fill modal with content from link href
$("#basicModal").on("show.bs.modal", function(e) {

    var link = $(e.relatedTarget);
    $(this).find(".modal-title").text(link.attr("data-title"));
    $(this).find("#query").text(link.attr("data-query"));
    $(this).find("#datasource").text(link.attr("data-datasource"));
    $(this).find("#description").text(link.attr("data-description"));

});



$('input[name="daterange"]').daterangepicker();

$('#daterange').on('apply.daterangepicker', function(ev, picker) {
  var start = picker.startDate.format('YYYY-MM-DD');
  var end = picker.endDate.format('YYYY-MM-DD');
  var company = $( "#client option:selected" ).text();
  var type = $('#typeTable option:selected').text();

  if(company == "Choose a Client" && type == "Choose a Service Type"){
    company = encodeURIComponent(company);
    getTicketHistory("?range1="+start+"&range2="+end,'','');

  }else if(type == "Choose a Service Type" && company !="Choose a Client"){
    company = encodeURIComponent(company);

    getTicketHistory("?range1="+start+"&range2="+end,"&company="+company,'');

  }else if(type != "Choose a Service Type" && company =="Choose a Client"){
    company = encodeURIComponent(company);

    getTicketHistory("?range1="+start+"&range2="+end,'','&type='+type);

  }else if(type != "Choose a Service Type" && company !="Choose a Client"){
    company = encodeURIComponent(company);

    getTicketHistory("?range1="+start+"&range2="+end,"&company="+company,'&type='+type);

  }

});


$('input[name="daterange2"]').daterangepicker();

$('#daterange2').on('apply.daterangepicker', function(ev, picker) {
  var start = picker.startDate.format('YYYY-MM-DD');
  var end = picker.endDate.format('YYYY-MM-DD');
  var company = $( "#client2 option:selected" ).text();
  var type = $('#member option:selected').text();

  if(company == "Choose a Client" && type == "Choose a Member"){
    company = encodeURIComponent(company);
    topTypes("?range1="+start+"&range2="+end,'','');

  }else if(type == "Choose a Member" && company !="Choose a Client"){
    company = encodeURIComponent(company);

    topTypes("?range1="+start+"&range2="+end,"&company="+company,'');

  }else if(type != "Choose a Member" && company =="Choose a Client"){
    company = encodeURIComponent(company);

    topTypes("?range1="+start+"&range2="+end,'','&member='+type);

  }else if(type != "Choose a Member" && company !="Choose a Client"){
    company = encodeURIComponent(company);

    topTypes("?range1="+start+"&range2="+end,"&company="+company,'&member='+type);

  }
});



$('input[name="daterange4"]').daterangepicker();

$('#daterange4').on('apply.daterangepicker', function(ev, picker) {
  var start = picker.startDate.format('YYYY-MM-DD');
  var end = picker.endDate.format('YYYY-MM-DD');
  function days_between(date1, date2) {

      // The number of milliseconds in one day
      var ONE_DAY = 1000 * 60 * 60 * 24;

      // Convert both dates to milliseconds
      var date1_ms = date1.getTime();
      var date2_ms = date2.getTime();

      // Calculate the difference in milliseconds
      var difference_ms = Math.abs(date1_ms - date2_ms);

      // Convert back to days and return
      return Math.round(difference_ms/ONE_DAY);

  }
  function parseDate(input) {
  var parts = input.match(/(\d+)/g);
  // new Date(year, month [, date [, hours[, minutes[, seconds[, ms]]]]])
  return new Date(parts[0], parts[1]-1, parts[2]); // months are 0-based
}


  if (days_between(parseDate(start),parseDate(end)) > 30){
    billableByDay("?range1="+start+"&range2="+end,"&datetype=month");
    clearInterval(billableByDayID);
  }else{

    billableByDay("?range1="+start+"&range2="+end,"&datetype=day");
    clearInterval(billableByDayID);
  }

  $('#messageHours').append('refresh page to reset live reload');

});




$('input[name="daterange3"]').daterangepicker();

$('#daterange3').on('apply.daterangepicker', function(ev, picker) {
  var start = picker.startDate.format('YYYY-MM-DD');
  var end = picker.endDate.format('YYYY-MM-DD');
  //var company = $( "#client2 option:selected" ).text();
  //var type = $('#member option:selected').text();



    topClients("?range1="+start+"&range2="+end);

    //company = encodeURIComponent(company);

    //topClients("?range1="+start+"&range2="+end,"&company="+company,'&member='+type);


});

$('#boardTable').on('click','#board',function(e){
  e.preventDefault();
  var clickedVal = $(this).attr('href');
  var title = clickedVal.substr(clickedVal.indexOf("=") + 1);
  var title = unescape(title);
  $('#myModalLabel4').text(title);
  tickets(clickedVal);
  $('#issueModal4').modal('show');


});


$('input[name="daterange5"]').daterangepicker();

$('#daterange5').on('apply.daterangepicker', function(ev, picker) {
  var start = picker.startDate.format('YYYY-MM-DD');
  var end = picker.endDate.format('YYYY-MM-DD');
  function days_between(date1, date2) {

      // The number of milliseconds in one day
      var ONE_DAY = 1000 * 60 * 60 * 24;

      // Convert both dates to milliseconds
      var date1_ms = date1.getTime();
      var date2_ms = date2.getTime();

      // Calculate the difference in milliseconds
      var difference_ms = Math.abs(date1_ms - date2_ms);

      // Convert back to days and return
      return Math.round(difference_ms/ONE_DAY);

  }
  function parseDate(input) {
  var parts = input.match(/(\d+)/g);
  // new Date(year, month [, date [, hours[, minutes[, seconds[, ms]]]]])
  return new Date(parts[0], parts[1]-1, parts[2]); // months are 0-based
}


  if (days_between(parseDate(start),parseDate(end)) > 30){
    ticketsClosedByMember("?range1="+start+"&range2="+end,"&datetype=month");
    clearInterval(ticketsClosedByMemberID);
  }else{

    ticketsClosedByMember("?range1="+start+"&range2="+end,"&datetype=day");
    clearInterval(ticketsClosedByMemberID);
  }

$('#messageTickets').append('refresh page to reset live reload');

});




});
