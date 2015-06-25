$(document).ready(function(){

  var chartData = null;
  //var barChart = new Chart;
  var pieChart = null;
  var doughnutChart = null;
  var lineChart = null;
  var start = null;
  var end = null;

  //console.log(barChart);
  $('input[name="daterange"]').daterangepicker();

  $('#daterange').on('apply.daterangepicker', function(ev, picker) {

    start = picker.startDate.format('YYYY-MM-DD');
    end = picker.endDate.format('YYYY-MM-DD');
    console.log(start);
    console.log(end);
  });




  $('#options').on('change','#teamOptions',function(){

    $('#member').removeClass('hidden');
    $team = $('#teamOptions option:selected').val();
    if($('#teamOptions option:selected').val() !== "All"){
      $('#memberOptions').empty();
      $.ajax({
        url: "../../../ajax/"+$team+"/getMembers.php",
        context: document.body,
        success: function(html){

          $("#memberOptions").append('<option value="All">All</option>'+html);

          }

        });
    }else{
      $('#memberOptions').empty();
      $("#memberOptions").append('<option value="All">All</option>');
    }
    if($('#teamOptions').val() == "All"){

      $('#member').addClass('hidden');
      $('#memberOptions').empty();

    }

  });

  $('#busUnits').on('change','#salescheckbox',function(){

    if ($(this).is(':checked')) {

      $('#sales').removeClass('hidden');

    }else{
      $('#sales').addClass('hidden');

    }

  });

  $('#busUnits').on('change','#professionalcheckbox',function(){

    if ($(this).is(':checked')) {

      $('#proServices').removeClass('hidden');

    }else{
      $('#proServices').addClass('hidden');

    }

  });



  $('#runQueryButton').on('click','#runQuery',function(){




    if($('#memberOptions option:selected').val() !== "All"){

      $member = $('#memberOptions option:selected').val();
        $team = $('#teamOptions option:selected').val();

      $.ajax({
        url:"../../../ajax/"+$team+"/getTime.php?range1="+start+"&range2="+end+"&member="+$member,
        success:function(json){
          var hours = [];
          var boards = [];
          for(i=0;i<json.length;i++){

            hours.push (json[i]['hours']);
            boards.push (json[i]['board_name']);

          }

          var chartData = {
              labels: boards,
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
          $('#boardTitle').text("Hours by Board");
          $('#hoursByBoardChart').replaceWith('<canvas id="hoursByBoardChart" width="200" height="200"></canvas>');

          var ctx = document.getElementById("hoursByBoardChart").getContext("2d");
          ctx.canvas.width = 300;
          ctx.canvas.height = 300;
          barChart = new Chart(ctx).Bar(chartData);


        }//end success

      });//end hoursByBoard ajax call

      $.ajax({
        url:"../../../ajax/"+$team+"/getTimeChargeCode.php?range1="+start+"&range2="+end+"&member="+$member,
        success:function(json){

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
            $('#chargeCodeTitle').text("Hours by Charge Code");
            $('#hoursByChargeCodeChart').replaceWith('<canvas id="hoursByChargeCodeChart" width="200" height="200"></canvas>');

          var rCM = document.getElementById("hoursByChargeCodeChart").getContext("2d");

          var projectChart = new Chart(rCM).Doughnut(doughnutData);
          //legend(document.getElementById("hoursByServiceTypeLegend"), doughnutData);





          $("#hoursByChargeCodeChart").click(function(e) {//on doughnut chart click////


             var activeBars = projectChart.getSegmentsAtEvent(e);


             $.ajax({
               type:"GET",
                url:"../../../ajax/"+$team+"/getTimeChargeCode.php?range1="+start+"&range2="+end+"&code="+activeBars[0].label+"&member="+$member,
               success:function(json){


                 //$('#hoursByChargeCode').empty();

                 function getRandomColor() {
                     var letters = '0123456789ABCDEF'.split('');
                     var color = '#';
                     for (var i = 0; i < 6; i++ ) {
                         color += letters[Math.floor(Math.random() * 16)];
                     }
                     return color;
                 }


                 var members = [];
                 var fillColor = [];
                 var hours = [];
                 var highlightFill = [];
                 var highlightStroke = [];



                   for($i=0;$i<json.length;$i++){


                     members.push(json[$i]["member_id"]);
                     hours.push(json[$i]["typeCount"]);
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
                       label: "hrs"
                   }
               ]
           };




                  $('#hoursByChargeCodeChart').replaceWith('<span><a href="#" id="chargeCodeBack"><span class="fui-arrow-left"></span>back </a></span><canvas id="hoursByChargeCodeChart">');
                     var ctx2 = document.getElementById("hoursByChargeCodeChart").getContext("2d");
                     var modalChart = new Chart(ctx2).Bar(data);




               }//end success ajax call

             });


          });//end drill down for hours by charge code
          $("#hoursByChargeCode").on('click','#chargeCodeBack',function(e) {
            $member = $('#memberOptions option:selected').val();
              $team = $('#teamOptions option:selected').val();
            //$('#daterange4').val('');
            //$('#sup').empty();
            $('#chargeCodeBack').remove();
            //$('#dude').empty();
            e.preventDefault();


            $.ajax({
              url:"../../../ajax/"+$team+"/getTimeChargeCode.php?range1="+start+"&range2="+end+"&member="+$member,
              success:function(json){

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
                  $('#chargeCodeTitle').text("Hours by Charge Code");
                  $('#hoursByChargeCodeChart').replaceWith('<canvas id="hoursByChargeCodeChart" width="200" height="200"></canvas>');

                var rCM = document.getElementById("hoursByChargeCodeChart").getContext("2d");

                var projectChart = new Chart(rCM).Doughnut(doughnutData);
                //legend(document.getElementById("hoursByServiceTypeLegend"), doughnutData);
                $("#hoursByChargeCodeChart").click(function(e) {


                   var activeBars = projectChart.getSegmentsAtEvent(e);
                    //$('#basicModal2').modal('show');
                   //$('#basicModal2').find(".modal-title").text(activeBars[0].label);

                   /*if(ranges && datetype !== ''){
                     var memberurl = "../../ajax/servicedelivery/billableByMember.php"+ranges+datetype+"&member="+activeBars[0].label;
                   }else{
                     var memberurl = "../../ajax/servicedelivery/billableByMember.php?member="+activeBars[0].label+"&datetype=day";
                   }*/


                   $.ajax({
                     type:"GET",
                      url:"../../../ajax/"+$team+"/getTimeChargeCode.php?range1="+start+"&range2="+end+"&code="+activeBars[0].label+"&member="+$member,
                     success:function(json){


                       //$('#hoursByChargeCode').empty();

                       function getRandomColor() {
                           var letters = '0123456789ABCDEF'.split('');
                           var color = '#';
                           for (var i = 0; i < 6; i++ ) {
                               color += letters[Math.floor(Math.random() * 16)];
                           }
                           return color;
                       }


                       var members = [];
                       var fillColor = [];
                       var hours = [];
                       var highlightFill = [];
                       var highlightStroke = [];



                         for($i=0;$i<json.length;$i++){


                           members.push(json[$i]["member_id"]);
                           hours.push(json[$i]["typeCount"]);
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
                             label: "hrs"
                         }
                     ]
                 };
                        //console.log(data);



                        $('#hoursByChargeCodeChart').replaceWith('<span><a href="#" id="chargeCodeBack"><span class="fui-arrow-left"></span>back </a></span><canvas id="hoursByChargeCodeChart">');
                           var ctx2 = document.getElementById("hoursByChargeCodeChart").getContext("2d");
                           var modalChart = new Chart(ctx2).Bar(data);




                     }//end success ajax call

                   });


                });//end drill down for hours by charge code
                $("#hoursByChargeCode").on('click','#chargeCodeBack',function(e) {

                  //$('#daterange4').val('');
                  //$('#sup').empty();
                  //$('#billableDay').remove();
                  //$('#dude').empty();
                  e.preventDefault();


                });


              }

            });

          });


        }

      });

      $.ajax({


        url:"../../../ajax/"+$team+"/getTimeServiceType.php?range1="+start+"&range2="+end+"&member="+$member,
        success:function(json){

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
            $('#serviceTypeTitle').text("Hours By Service Type");
            $('#hoursByServiceTypeChart').replaceWith('<canvas id="hoursByServiceTypeChart" width="200" height="200"></canvas>');

          var rCM = document.getElementById("hoursByServiceTypeChart").getContext("2d");
            rCM.canvas.width = 300;
            rCM.canvas.height = 300;
          var projectChart = new Chart(rCM).Doughnut(doughnutData);
          //legend(document.getElementById("hoursByServiceTypeLegend"), doughnutData);
          $("#hoursByServiceTypeChart").click(function(e) {


             var activeBars = projectChart.getSegmentsAtEvent(e);

             $.ajax({
               type:"GET",
                url:"../../../ajax/"+$team+"/getTimeServiceType.php?range1="+start+"&range2="+end+"&type="+activeBars[0].label+"&member="+$member,
               success:function(json){


                 //$('#hoursByChargeCode').empty();

                 function getRandomColor() {
                     var letters = '0123456789ABCDEF'.split('');
                     var color = '#';
                     for (var i = 0; i < 6; i++ ) {
                         color += letters[Math.floor(Math.random() * 16)];
                     }
                     return color;
                 }


                 var type = [];
                 var fillColor = [];
                 var hours = [];
                 var highlightFill = [];
                 var highlightStroke = [];



                   for($i=0;$i<json.length;$i++){


                     type.push(json[$i]["type"]);
                     hours.push(json[$i]["typeCount"]);
                     fillColor.push("rgba(227, 75, 0, .5)");
                     highlightFill.push("rgba(227, 75, 0, .8)");
                     highlightStroke.push("rgba(227, 75, 0, .7)");

                   }







           var data = {
               labels: type,
               datasets: [
                   {

                       fillColor: "rgba(227, 75, 0, .5)",
                       strokeColor: "rgba(227, 75, 0, .8)",
                       highlightFill: "rgba(227, 75, 0, .75)",
                       highlightStroke: "rgba(227, 75, 0, .1)",
                       data:hours,
                       label: "hrs"
                   }
               ]
           };




                  $('#hoursByServiceTypeChart').replaceWith('<span><a href="#" id="serviceTypeBack"><span class="fui-arrow-left"></span>back </a></span><canvas id="hoursByServiceTypeChart">');
                     var ctx2 = document.getElementById("hoursByServiceTypeChart").getContext("2d");
                     var modalChart = new Chart(ctx2).Bar(data);




               }//end success ajax call

             });




           });
           $("#hoursByServiceType").on('click','#serviceTypeBack',function(e) {
             $member = $('#memberOptions option:selected').val();
               $team = $('#teamOptions option:selected').val();
             e.preventDefault();

             $.ajax({


               url:"../../../ajax/"+$team+"/getTimeServiceType.php?range1="+start+"&range2="+end+"&member="+$member,
               success:function(json){

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
                   $('#serviceTypeBack').remove();
                   $('#serviceTypeTitle').text("Hours By Service Type");
                   $('#hoursByServiceTypeChart').replaceWith('<canvas id="hoursByServiceTypeChart" width="200" height="200"></canvas>');

                 var rCM = document.getElementById("hoursByServiceTypeChart").getContext("2d");
                   rCM.canvas.width = 300;
                   rCM.canvas.height = 300;
                 var projectChart = new Chart(rCM).Doughnut(doughnutData);
                 //legend(document.getElementById("hoursByServiceTypeLegend"), doughnutData);
                 $("#hoursByServiceTypeChart").click(function(e) {


                    var activeBars = projectChart.getSegmentsAtEvent(e);

                    $.ajax({
                      type:"GET",
                       url:"../../../ajax/"+$team+"/getTimeServiceType.php?range1="+start+"&range2="+end+"&type="+activeBars[0].label+"&member="+$member,
                      success:function(json){


                        //$('#hoursByChargeCode').empty();

                        function getRandomColor() {
                            var letters = '0123456789ABCDEF'.split('');
                            var color = '#';
                            for (var i = 0; i < 6; i++ ) {
                                color += letters[Math.floor(Math.random() * 16)];
                            }
                            return color;
                        }


                        var type = [];
                        var fillColor = [];
                        var hours = [];
                        var highlightFill = [];
                        var highlightStroke = [];



                          for($i=0;$i<json.length;$i++){


                            type.push(json[$i]["type"]);
                            hours.push(json[$i]["typeCount"]);
                            fillColor.push("rgba(227, 75, 0, .5)");
                            highlightFill.push("rgba(227, 75, 0, .8)");
                            highlightStroke.push("rgba(227, 75, 0, .7)");

                          }







                  var data = {
                      labels: type,
                      datasets: [
                          {

                              fillColor: "rgba(227, 75, 0, .5)",
                              strokeColor: "rgba(227, 75, 0, .8)",
                              highlightFill: "rgba(227, 75, 0, .75)",
                              highlightStroke: "rgba(227, 75, 0, .1)",
                              data:hours,
                              label: "hrs"
                          }
                      ]
                  };




                         $('#hoursByServiceTypeChart').replaceWith('<span><a href="#" id="serviceTypeBack"><span class="fui-arrow-left"></span>back </a></span><canvas id="hoursByServiceTypeChart">');
                            var ctx2 = document.getElementById("hoursByServiceTypeChart").getContext("2d");
                            var modalChart = new Chart(ctx2).Bar(data);




                      }//end success ajax call

                    });




                  });
                  $("#hoursByChargeCode").on('click','#chargeCodeBack',function(e) {






                  });



               }

             });//end hours by service type ajax call


           });



        }

      });//end hours by service type ajax call

    }//end if member selected block



//front end and back end for entire team is ready for drilldowns





    else{//get the time for the entire team

      $.ajax({
        url:"../../../ajax/"+$team+"/getTime.php?range1="+start+"&range2="+end,
        success:function(json){
          var hours = [];
          var boards = [];
          for(i=0;i<json.length;i++){

            hours.push (json[i]['hours']);
            boards.push (json[i]['board_name']);

          }

          var chartData = {
              labels: boards,
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
          $('#boardTitle').text("Hours by Board");
          $('#hoursByBoardChart').replaceWith('<canvas id="hoursByBoardChart" width="200" height="200"></canvas>');

          var ctx = document.getElementById("hoursByBoardChart").getContext("2d");
          ctx.canvas.width = 300;
          ctx.canvas.height = 300;
          barChart = new Chart(ctx).Bar(chartData);


        }//end success

      });//end hoursByBoard ajax call

      $.ajax({
        url:"../../../ajax/"+$team+"/getTimeChargeCode.php?range1="+start+"&range2="+end,
        success:function(json){

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
            $('#chargeCodeTitle').text("Hours by Charge Code");
            $('#hoursByChargeCodeChart').replaceWith('<canvas id="hoursByChargeCodeChart" width="200" height="200"></canvas>');

          var rCM = document.getElementById("hoursByChargeCodeChart").getContext("2d");

          var projectChart = new Chart(rCM).Doughnut(doughnutData);
          //legend(document.getElementById("hoursByServiceTypeLegend"), doughnutData);





          $("#hoursByChargeCodeChart").click(function(e) {//on doughnut chart click////


             var activeBars = projectChart.getSegmentsAtEvent(e);


             $.ajax({
               type:"GET",
                url:"../../../ajax/"+$team+"/getTimeChargeCode.php?range1="+start+"&range2="+end+"&code="+activeBars[0].label,
               success:function(json){


                 //$('#hoursByChargeCode').empty();

                 function getRandomColor() {
                     var letters = '0123456789ABCDEF'.split('');
                     var color = '#';
                     for (var i = 0; i < 6; i++ ) {
                         color += letters[Math.floor(Math.random() * 16)];
                     }
                     return color;
                 }


                 var members = [];
                 var fillColor = [];
                 var hours = [];
                 var highlightFill = [];
                 var highlightStroke = [];



                   for($i=0;$i<json.length;$i++){


                     members.push(json[$i]["member_id"]);
                     hours.push(json[$i]["typeCount"]);
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
                       label: "hrs"
                   }
               ]
           };




                  $('#hoursByChargeCodeChart').replaceWith('<span><a href="#" id="chargeCodeBack"><span class="fui-arrow-left"></span>back </a></span><canvas id="hoursByChargeCodeChart">');
                     var ctx2 = document.getElementById("hoursByChargeCodeChart").getContext("2d");
                     var modalChart = new Chart(ctx2).Bar(data);




               }//end success ajax call

             });


          });//end drill down for hours by charge code
          $("#hoursByChargeCode").on('click','#chargeCodeBack',function(e) {

            //$('#daterange4').val('');
            //$('#sup').empty();
            $('#chargeCodeBack').remove();
            //$('#dude').empty();
            e.preventDefault();
            $.ajax({
              url:"../../../ajax/"+$team+"/getTime.php?range1="+start+"&range2="+end,
              success:function(json){
                var hours = [];
                var boards = [];
                for(i=0;i<json.length;i++){

                  hours.push (json[i]['hours']);
                  boards.push (json[i]['board_name']);

                }

                var chartData = {
                    labels: boards,
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


                $('#hoursByBoardChart').replaceWith('<canvas id="hoursByBoardChart" width="200" height="200"></canvas>');

                var ctx = document.getElementById("hoursByBoardChart").getContext("2d");
                ctx.canvas.width = 300;
                ctx.canvas.height = 300;
                barChart = new Chart(ctx).Bar(chartData);
                  $('#chargeCodeBack').remove();

              }//end success

            });//end hoursByBoard ajax call

            $.ajax({
              url:"../../../ajax/"+$team+"/getTimeChargeCode.php?range1="+start+"&range2="+end,
              success:function(json){

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
                  $('#chargeCodeTitle').text("Hours by Charge Code");
                  $('#hoursByChargeCodeChart').replaceWith('<canvas id="hoursByChargeCodeChart" width="200" height="200"></canvas>');

                var rCM = document.getElementById("hoursByChargeCodeChart").getContext("2d");

                var projectChart = new Chart(rCM).Doughnut(doughnutData);
                //legend(document.getElementById("hoursByServiceTypeLegend"), doughnutData);
                $("#hoursByChargeCodeChart").click(function(e) {


                   var activeBars = projectChart.getSegmentsAtEvent(e);
                    //$('#basicModal2').modal('show');
                   //$('#basicModal2').find(".modal-title").text(activeBars[0].label);

                   /*if(ranges && datetype !== ''){
                     var memberurl = "../../ajax/servicedelivery/billableByMember.php"+ranges+datetype+"&member="+activeBars[0].label;
                   }else{
                     var memberurl = "../../ajax/servicedelivery/billableByMember.php?member="+activeBars[0].label+"&datetype=day";
                   }*/


                   $.ajax({
                     type:"GET",
                      url:"../../../ajax/"+$team+"/getTimeChargeCode.php?range1="+start+"&range2="+end+"&code="+activeBars[0].label,
                     success:function(json){


                       //$('#hoursByChargeCode').empty();

                       function getRandomColor() {
                           var letters = '0123456789ABCDEF'.split('');
                           var color = '#';
                           for (var i = 0; i < 6; i++ ) {
                               color += letters[Math.floor(Math.random() * 16)];
                           }
                           return color;
                       }


                       var members = [];
                       var fillColor = [];
                       var hours = [];
                       var highlightFill = [];
                       var highlightStroke = [];



                         for($i=0;$i<json.length;$i++){


                           members.push(json[$i]["member_id"]);
                           hours.push(json[$i]["typeCount"]);
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
                             label: "hrs"
                         }
                     ]
                 };
                        //console.log(data);



                        $('#hoursByChargeCodeChart').replaceWith('<span><a href="#" id="chargeCodeBack"><span class="fui-arrow-left"></span>back </a></span><canvas id="hoursByChargeCodeChart">');
                           var ctx2 = document.getElementById("hoursByChargeCodeChart").getContext("2d");
                           var modalChart = new Chart(ctx2).Bar(data);




                     }//end success ajax call

                   });


                });//end drill down for hours by charge code
                $("#hoursByChargeCode").on('click','#chargeCodeBack',function(e) {

                  //$('#daterange4').val('');
                  //$('#sup').empty();
                  //$('#billableDay').remove();
                  //$('#dude').empty();
                  e.preventDefault();


                });


              }

            });

          });


        }

      });

      $.ajax({


        url:"../../../ajax/"+$team+"/getTimeServiceType.php?range1="+start+"&range2="+end,
        success:function(json){

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
            $('#serviceTypeTitle').text("Hours By Service Type");
            $('#hoursByServiceTypeChart').replaceWith('<canvas id="hoursByServiceTypeChart" width="200" height="200"></canvas>');

          var rCM = document.getElementById("hoursByServiceTypeChart").getContext("2d");
            rCM.canvas.width = 300;
            rCM.canvas.height = 300;
          var projectChart = new Chart(rCM).Doughnut(doughnutData);
          //legend(document.getElementById("hoursByServiceTypeLegend"), doughnutData);
          $("#hoursByServiceTypeChart").click(function(e) {


             var activeBars = projectChart.getSegmentsAtEvent(e);

             $.ajax({
               type:"GET",
                url:"../../../ajax/"+$team+"/getTimeServiceType.php?range1="+start+"&range2="+end+"&type="+activeBars[0].label,
               success:function(json){


                 //$('#hoursByChargeCode').empty();

                 function getRandomColor() {
                     var letters = '0123456789ABCDEF'.split('');
                     var color = '#';
                     for (var i = 0; i < 6; i++ ) {
                         color += letters[Math.floor(Math.random() * 16)];
                     }
                     return color;
                 }


                 var type = [];
                 var fillColor = [];
                 var hours = [];
                 var highlightFill = [];
                 var highlightStroke = [];



                   for($i=0;$i<json.length;$i++){


                     type.push(json[$i]["type"]);
                     hours.push(json[$i]["typeCount"]);
                     fillColor.push("rgba(227, 75, 0, .5)");
                     highlightFill.push("rgba(227, 75, 0, .8)");
                     highlightStroke.push("rgba(227, 75, 0, .7)");

                   }







           var data = {
               labels: type,
               datasets: [
                   {

                       fillColor: "rgba(227, 75, 0, .5)",
                       strokeColor: "rgba(227, 75, 0, .8)",
                       highlightFill: "rgba(227, 75, 0, .75)",
                       highlightStroke: "rgba(227, 75, 0, .1)",
                       data:hours,
                       label: "hrs"
                   }
               ]
           };




                  $('#hoursByServiceTypeChart').replaceWith('<span><a href="#" id="serviceTypeBack"><span class="fui-arrow-left"></span>back </a></span><canvas id="hoursByServiceTypeChart">');
                     var ctx2 = document.getElementById("hoursByServiceTypeChart").getContext("2d");
                     var modalChart = new Chart(ctx2).Bar(data);




               }//end success ajax call

             });




           });
           $("#hoursByServiceType").on('click','#serviceTypeBack',function(e) {

             e.preventDefault();

             $.ajax({


               url:"../../../ajax/"+$team+"/getTimeServiceType.php?range1="+start+"&range2="+end,
               success:function(json){

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
                   $('#serviceTypeBack').remove();
                   $('#serviceTypeTitle').text("Hours By Service Type");
                   $('#hoursByServiceTypeChart').replaceWith('<canvas id="hoursByServiceTypeChart" width="200" height="200"></canvas>');

                 var rCM = document.getElementById("hoursByServiceTypeChart").getContext("2d");
                   rCM.canvas.width = 300;
                   rCM.canvas.height = 300;
                 var projectChart = new Chart(rCM).Doughnut(doughnutData);
                 //legend(document.getElementById("hoursByServiceTypeLegend"), doughnutData);
                 $("#hoursByServiceTypeChart").click(function(e) {


                    var activeBars = projectChart.getSegmentsAtEvent(e);

                    $.ajax({
                      type:"GET",
                       url:"../../../ajax/"+$team+"/getTimeServiceType.php?range1="+start+"&range2="+end+"&type="+activeBars[0].label,
                      success:function(json){


                        //$('#hoursByChargeCode').empty();

                        function getRandomColor() {
                            var letters = '0123456789ABCDEF'.split('');
                            var color = '#';
                            for (var i = 0; i < 6; i++ ) {
                                color += letters[Math.floor(Math.random() * 16)];
                            }
                            return color;
                        }


                        var type = [];
                        var fillColor = [];
                        var hours = [];
                        var highlightFill = [];
                        var highlightStroke = [];



                          for($i=0;$i<json.length;$i++){


                            type.push(json[$i]["type"]);
                            hours.push(json[$i]["typeCount"]);
                            fillColor.push("rgba(227, 75, 0, .5)");
                            highlightFill.push("rgba(227, 75, 0, .8)");
                            highlightStroke.push("rgba(227, 75, 0, .7)");

                          }







                  var data = {
                      labels: type,
                      datasets: [
                          {

                              fillColor: "rgba(227, 75, 0, .5)",
                              strokeColor: "rgba(227, 75, 0, .8)",
                              highlightFill: "rgba(227, 75, 0, .75)",
                              highlightStroke: "rgba(227, 75, 0, .1)",
                              data:hours,
                              label: "hrs"
                          }
                      ]
                  };




                         $('#hoursByServiceTypeChart').replaceWith('<span><a href="#" id="serviceTypeBack"><span class="fui-arrow-left"></span>back </a></span><canvas id="hoursByServiceTypeChart">');
                            var ctx2 = document.getElementById("hoursByServiceTypeChart").getContext("2d");
                            var modalChart = new Chart(ctx2).Bar(data);




                      }//end success ajax call

                    });




                  });
                  $("#hoursByChargeCode").on('click','#chargeCodeBack',function(e) {






                  });



               }

             });//end hours by service type ajax call


           });



        }

      });//end hours by service type ajax call

    }
    $('#chargeCodeTitle').removeClass('hidden');
      $('#serviceTypeTitle').removeClass('hidden');
        $('#boardTitle').removeClass('hidden');
  });//end on click Analyze!










});
