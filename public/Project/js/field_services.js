var members = [];
var label = [];
var lessSevenAr = [];
var sevenToFourteenAr = [];
var fourteenToThirtyAr = [];
 var greaterThirtyAr = [];
 var ctx = null;
 var chart = null;
 var ticketsOpenCheck = null;
  //console.log(members);
function searchArray(value, myArray){
for (var i=0; i < myArray.length; i++) {
    if (myArray[i].member.toString() === value.toString()) {
        return i;
    }
 }
};

ticketsOpenByDays = function(){
$.ajax({
  type:'GET',
  url:'../../ajax/fieldservices/getTicketsAssigned.php',
  success:function(json){
        console.log(json);
        //console.log(members[0].member);
        //console.log(members[1].member);

        //console.log(searchArray('hey',members));
  members = [];
    for(var i =0;i<json.length;i++){



      if(searchArray(json[i]['resourceList'],members) > -1){

          if(json[i]['daysOpen'] <= 7){
          members[searchArray(json[i]['resourceList'],members)].lessSeven += json[i]['daysOpenCount'];
        }else if(json[i]['daysOpen'] <= 14 && json[i]['daysOpen'] > 7){
          members[searchArray(json[i]['resourceList'],members)].sevenToFourteen += json[i]['daysOpenCount'];

        }	else if(json[i]['daysOpen'] > 14 && json[i]['daysOpen'] <= 30){
          members[searchArray(json[i]['resourceList'],members)].fourteenToThirty += json[i]['daysOpenCount'];
        }else{
          members[searchArray(json[i]['resourceList'],members)].greaterThirty += json[i]['daysOpenCount'];
        }
      }else{

          members.push({
            'member':json[i]['resourceList'].toString(),
            'lessSeven':0,
            'sevenToFourteen':0,
            'fourteenToThirty':0,
            'greaterThirty':0,
          });


      }//end
    }
        console.log(members);


        label = [];
        lessSevenAr = [];
        sevenToFourteenAr = [];
        fourteenToThirtyAr = [];
         greaterThirtyAr = [];
      for(var i = 0;i<members.length;i++){

        label.push(members[i].member.toString());
        lessSevenAr.push(members[i].lessSeven);
        sevenToFourteenAr.push(members[i].sevenToFourteen);
        fourteenToThirtyAr.push(members[i].fourteenToThirty);
         greaterThirtyAr.push(members[i].greaterThirty);
      }


              function legend2(parent, data) {
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
                      colorSample.style.backgroundColor = d.hasOwnProperty('highlightFill') ? d.highlightFill : d.color;
                      colorSample.style.borderColor = d.hasOwnProperty('fillColor') ? d.fillColor : d.color;
                      title.appendChild(colorSample);

                      var text = document.createTextNode(d.title);

                      title.appendChild(text);

                  });
              }


              var ChartData = {
                labels : label,
          datasets : [{fillColor :"rgba(43,179,59,0.7)",highlightFill : "rgba(43,179,59,1)",pointColor : "rgba(52,152,219,1)",markerShape :"circle",pointStrokeColor : "rgba(43,179,59,1)",
            data : lessSevenAr,title:"<7"},
          {fillColor :"rgba(237,255,41,0.7)",highlightFill : "rgba(237,255,41,1)",pointColor : "rgba(46,204,113,1)",markerShape :"circle",pointStrokeColor : "rgba(255,255,255,1.00)",
            data : sevenToFourteenAr,title:"7-14"},
          {fillColor :"rgba(224,112,47,0.7)",highlightFill : "rgba(224,112,47,1)",pointColor : "rgba(155,89,182,1)",markerShape :"circle",pointStrokeColor : "rgba(255,255,255,1.00)",
            data : fourteenToThirtyAr,title:"14-30"},
          {fillColor :"rgba(242,53,53,0.7)",highlightFill : "rgba(242,53,53,1)",pointColor : "rgba(241,196,15,1)",markerShape :"circle",pointStrokeColor : "rgba(255,255,255,1)",
            data :greaterThirtyAr,title:">30"},
          ]};
              if(chart !==null){
                chart.update();
              }else{
                ctx = document.getElementById('canvas').getContext('2d');
                chart = new Chart(ctx).Bar(ChartData);
            legend2(document.getElementById("legend"), ChartData,chart);
              }


          $("#chart").on('click','#canvas',function(e) {
            clearInterval(ticketsOpenCheck);
            //clearInterval(ticketsClosedByMemberID);
             var activeBars = chart.getBarsAtEvent(e);
              //$('#basicModal2').modal('show');
             //$('#basicModal2').find(".modal-title").text(activeBars[0].label);

             $.ajax({
              type:'GET',
              url:'../../ajax/fieldservices/getTicketsAssigned.php?member='+activeBars[0].label,
              success:function(table){
                //$('#tableShow').removeClass('hidden');
                  //$('#tableShow').show();
                $('#table').empty();
                if($('#tableShow').is(':visible') == false && $('#tableHide').is(':visible') == false){
                  $('#tableShow').removeClass('hidden');
                  //$('#tableHide').hide();
                    $('#table').hide();
                    $('#table').empty();
                    $('#table').append(table);
                }else if($('#tableShow').is(':visible') == false && $('#tableHide').is(':visible') == true){
                  //$('#tableShow').show();
                  //$('#tableHide').hide();
                    //$('#table').hide();
                    $('#table').empty();
                    $('#table').append(table);
                }else{
                    $('#table').append(table);
                }



              }
            });
          });
  }
});
}

$('#tableShow').on('click',function(){
  $('#tableShow').hide();
    $('#tableHide').removeClass('hidden');
  $('#tableHide').show();

  $( "#table" ).show("fast");
});

$('#tableHide').on('click',function(){
  $('#tableShow').show();
  $('#tableHide').hide();

  $( "#table" ).hide("fast");
});

$(document).ready(function(){
  ticketsOpenByDays();
  ticketsOpenCheck = setInterval(function(){ ticketsOpenByDays(); }, 30000);
});
