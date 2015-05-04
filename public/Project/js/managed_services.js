


function topTypes(value,value2,value3){

  $.ajax({

    type:"GET",
    url:"../../ajax/servicedelivery/topTypes.php"+value+value2+value3,
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

$.ajax({
  url: "../../ajax/clientservices/getClientList2.php",
                context: document.body,

                success: function(html){
                 $("#client2").append(html);

                }

                });


$.ajax({
url: "../../ajax/managedservices/getMembers.php",
context: document.body,
success: function(html){
$("#member").append(html);

}

});

$.ajax({
url: "../../ajax/managedservices/topTypesTable.php",
context: document.body,
success: function(html){
$("#msTypeTable").append(html);

}

});

topTypes('','','');


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

$('#nav').on('click','#full_screen',function(){

  $('#nav').addClass('hidden');

});

});
