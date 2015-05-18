


function topTypes(value,value2,value3){

if(value == 'undefined' && value2 == 'undefined' && value3 == 'undefined'){

  var url = "../../ajax/managedservices/topTypes.php";
}else{

  var url = "../../ajax/managedservices/topTypes.php"+value+value2+value3;

}


  $.ajax({

    type:"GET",
    url:url,
    success:function(json){

        var xlabels = [], type_count = [],colors = [];
        var backup = 0;

console.log(json[0]['backupHours']);


            /*for(var i = 0; i < json.length; i++) {

                label:xlabels.push(json[i]["type"]);
                //value: type_count.push(json[i]["total_hours"]);
                value: type_count.push(json[i]["typeCount"]);
                //fillColor: colors.push (getRandomColor());

              }*/



function getRandomColor() {
    var letters = '0123456789ABCDEF'.split('');
    var color = '#';
    for (var i = 0; i < 6; i++ ) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
}



doughnutData = [];




/*for(var i = 0; i < xlabels.length;i++){
if(xlabels[i] != "undefined"){
  doughnutData.push({
    value:type_count[i],
    color:getRandomColor(),
    highlight:getRandomColor(),
    label:xlabels[i]
  });
}


}*/
if(json[0]['backupHours'] == null){
  doughnutData.push({
    value:0,
    color:getRandomColor(),
    highlight:getRandomColor(),
    label:'Backup'
  });
json[0]['backupHours'] = 0;
}else{

  doughnutData.push({
    value:json[0]['backupHours'],
    color:getRandomColor(),
    highlight:getRandomColor(),
    label:'Backup'
  });
}


if(json[1]['avHours'] == null){

  doughnutData.push({
    value:0,
    color:getRandomColor(),
    highlight:getRandomColor(),
    label:'AV'
  });
  json[1]['avHours'] = 0;
}else{

  doughnutData.push({
    value:json[1]['avHours'],
    color:getRandomColor(),
    highlight:getRandomColor(),
    label:'AV'
  });

}

if(json[2]['bobHours'] == null){
  json[2]['bobHours'] = 0;
  doughnutData.push({
    value:json[2]['bobHours'],
    color:getRandomColor(),
    highlight:getRandomColor(),
    label:'BOB'
  });
}else{
doughnutData.push({
  value:json[2]['bobHours'],
  color:getRandomColor(),
  highlight:getRandomColor(),
  label:'BOB'
});
}

if(json[3]['adminHours'] == null){
  json[3]['adminHours'] = 0;
  doughnutData.push({
    value:json[3]['adminHours'],
    color:getRandomColor(),
    highlight:getRandomColor(),
    label:'Admin'
  });

}else{
doughnutData.push({
  value:json[3]['adminHours'],
  color:getRandomColor(),
  highlight:getRandomColor(),
  label:'Admin'
});
}

if(json[4]['meetingHours'] == null){
  json[4]['meetingHours'] = 0;
  doughnutData.push({
    value:json[4]['meetingHours'],
    color:getRandomColor(),
    highlight:getRandomColor(),
    label:'Meeting'
  });
}else{

  doughnutData.push({
    value:json[4]['meetingHours'],
    color:getRandomColor(),
    highlight:getRandomColor(),
    label:'Meeting'
  });
}


if(json[5]['projectHours'] == null){
  json[5]['projectHours'] = 0;
  doughnutData.push({
    value:json[5]['projectHours'],
    color:getRandomColor(),
    highlight:getRandomColor(),
    label:'Project'
  });

}else{

  doughnutData.push({
    value:json[5]['projectHours'],
    color:getRandomColor(),
    highlight:getRandomColor(),
    label:'Project'
  });
}



if(json[6]['ptoHours'] == null){
  doughnutData.push({
    value:0,
    color:getRandomColor(),
    highlight:getRandomColor(),
    label:'PTO'
  });
  json[6]['ptoHours'] = 0;

}else{

  doughnutData.push({
    value:json[6]['ptoHours'],
    color:getRandomColor(),
    highlight:getRandomColor(),
    label:'PTO'
  });

}



/*if(json[8]['internalHours'] == null){

  doughnutData.push({
    value:0,
    color:getRandomColor(),
    highlight:getRandomColor(),
    label:'Internal'
  });
}else{

  doughnutData.push({
    value:json[8]['internalHours'],
    color:getRandomColor(),
    highlight:getRandomColor(),
    label:'Internal'
  });

}*/
if(json[9]['requestHours'] == null){

  doughnutData.push({
    value:0,
    color:getRandomColor(),
    highlight:getRandomColor(),
    label:'MS Requests'
  });

  json[9]['requestHours'] = 0;
}else{

  doughnutData.push({
    value:json[9]['requestHours'],
    color:getRandomColor(),
    highlight:getRandomColor(),
    label:'MS Requests'
  });

}

if(json[7]['otherChargeHours'] == null){
  doughnutData.push({
    value:0,
    color:getRandomColor(),
    highlight:getRandomColor(),
    label:'Other'
  });

  json[7]['otherChargeHours'] = 0;
}else{
  doughnutData.push({
    value:json[7]['otherChargeHours'],
    color:getRandomColor(),
    highlight:getRandomColor(),
    label:'Other'
  });
}

var total_hours = parseInt(json[0]['backupHours']) + parseInt(json[1]['avHours']) +
parseInt(json[2]['bobHours']) + parseInt(json[3]['adminHours']) +
parseInt(json[4]['meetingHours']) + parseInt(json[6]['ptoHours']) + parseInt(json[5]['projectHours'])
+ parseInt(json[7]['otherChargeHours']) + parseInt(json[9]['requestHours']);
total_hours = parseInt(total_hours);

console.log(total_hours);

var options = {useEasing : true,useGrouping : true,separator : ',',decimal : '.',prefix : '',suffix : 'hrs'}

          var hours = new countUp("totalHours", 0, total_hours, 0, 2,options);
          hours.start();



console.log(doughnutData);
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
  $('#boardTable').empty();
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
setInterval(function(){ ticketsByBoard(); }, 10000);

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
$("#member1").append(html);

}

});

/*$.ajax({
url: "../../ajax/managedservices/topTypesTable.php",
context: document.body,
success: function(html){
$("#msTypeTable").append(html);

}

});*/

//topTypes('','','');


$('input[name="daterange2"]').daterangepicker();

$('#daterange2').on('apply.daterangepicker', function(ev, picker) {
  var start = picker.startDate.format('YYYY-MM-DD');
  var end = picker.endDate.format('YYYY-MM-DD');
  var company = $( "#client2 option:selected" ).text();
  var type = $('#member1 option:selected').text();

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
