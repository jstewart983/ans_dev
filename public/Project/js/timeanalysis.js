var chartData = null;
var barChart = null;
var pieChart = null;
var doughnutChart = null;
var lineChart = null;
var start = null;
var end = null;

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
    $('#memberOptions').val('All');

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

  $.ajax({
    url:"../../../ajax/"+$team+"/getTime.php",
    success:function(json){
      var hours = [];
      var boards = [];
      for(i=0;i<json.length;i++){

        hours.push (json[i]['hours']);
        boards.push (json[i]['board_name']);

      }

      //data = [];

      var data = {
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
      var ctx = document.getElementById("hoursByBoardChart").getContext("2d");
      var barChart = new Chart(ctx).Bar(data);

      /*for(i=0;i<json.length;i++){
        barChart.addData({
            labels:json[i]['board_name'],
            datasets:[

              {

            fillColor: "rgba(227, 75, "+i+", .5)",
            strokeColor: "rgba(227, 75, "+i+", .8)",
            highlightFill: "rgba(227, 75, "+i+", .75)",
            highlightStroke: "rgba(227, 75, "+i+", .1)",
            data:json[i]['hours'],
            label: "hrs"
            }
          ]
        });
      }//end for loop*/

    }//end success

  });//end ajax call

});//end on click
$(document).ready(function(){
  $('input[name="daterange"]').daterangepicker();

  $('#daterange').on('apply.daterangepicker', function(ev, picker) {
    var start = picker.startDate.format('YYYY-MM-DD');
    var end = picker.endDate.format('YYYY-MM-DD');
  });
});
