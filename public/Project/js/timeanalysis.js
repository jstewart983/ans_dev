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
            $('#hoursByChargeCodeChart').replaceWith('<canvas id="hoursByChargeCodeChart" width="50" height="50"></canvas>');

          var rCM = document.getElementById("hoursByChargeCodeChart").getContext("2d");

          var projectChart = new Chart(rCM).Doughnut(doughnutData);
          //legend(document.getElementById("hoursByServiceTypeLegend"), doughnutData);

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
            $('#hoursByServiceTypeChart').replaceWith('<canvas id="hoursByServiceTypeChart" width="50" height="50"></canvas>');

          var rCM = document.getElementById("hoursByServiceTypeChart").getContext("2d");

          var projectChart = new Chart(rCM).Doughnut(doughnutData);
          //legend(document.getElementById("hoursByServiceTypeLegend"), doughnutData);

        }

      });

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

          $('#hoursByBoardChart').replaceWith('<canvas id="hoursByBoardChart" width="200" height="50"></canvas>');

          var ctx = document.getElementById("hoursByBoardChart").getContext("2d");
          barChart = new Chart(ctx).Bar(chartData);


        }//end success

      });//end hoursByBoard ajax call

    }else{

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

          $('#hoursByBoardChart').replaceWith('<canvas id="hoursByBoardChart" width="50" height="50"></canvas>');

          var ctx = document.getElementById("hoursByBoardChart").getContext("2d");
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
            $('#hoursByChargeCodeChart').replaceWith('<canvas id="hoursByChargeCodeChart" width="50" height="50"></canvas>');

          var rCM = document.getElementById("hoursByChargeCodeChart").getContext("2d");

          var projectChart = new Chart(rCM).Doughnut(doughnutData);
          //legend(document.getElementById("hoursByServiceTypeLegend"), doughnutData);

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
            $('#hoursByServiceType').replaceWith('<canvas id="hoursByServiceTypeChart" width="50" height="50"></canvas>');

          var rCM = document.getElementById("hoursByServiceTypeChart").getContext("2d");

          var projectChart = new Chart(rCM).Doughnut(doughnutData);
          //legend(document.getElementById("hoursByServiceTypeLegend"), doughnutData);
        }

      });//end hours by service type ajax call

    }

  });//end on click Analyze!










});
