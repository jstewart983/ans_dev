var hoursByPEFrozen = false;
function getRandomColor1() {
    var letters = '0123456789ABCDEF'.split('');
    var color = '#F';
    for (var i = 0; i < 2; i++ ) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
}

function addWeekdays(date, days) {
  date.setDate(date.getDate());
    var counter = 0;
      if(days > 0 ){
        while (counter < days) {
         date.setDate(date.getDate() + 1 ); // Add a day to get the date tomorrow
         //console.log(date);
         var check = date.getDay(); // turns the date into a number (0 to 6)
             if (check == 0 || check == 6) {
                 // Do nothing it's the weekend (0=Sun & 6=Sat)
                 days = days -1;
             }
             else{

                 counter++;
                 //console.log(counter);  // It's a weekday so increase the counter
             }
           }
         }
         return counter+1;
       }

function legend(parent, data) {
    parent.className = 'legend';
    var datas = data.hasOwnProperty('datasets') ? data.datasets : data;

    // remove possible children of the parent
    while(parent.hasChildNodes()) {
        parent.removeChild(parent.lastChild);
    }

    datas.forEach(function(d) {
        var title = document.createElement('td');
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
Date.prototype.getWeek = function(start)
{
       //Calcing the starting point
   start = start || 0;
   var today = new Date(this.setHours(0, 0, 0, 0));
   var day = today.getDay() - start;
   var date = today.getDate() - day;

       // Grabbing Start/End Dates
   var StartDate = new Date(today.setDate(date));
   var EndDate = new Date(today.setDate(date + 6));
   return [StartDate, EndDate];
}

function getHoursExecuted(start,end){
  $.ajax({
    type:"GET",//GET Request
    url:"../../ajax/solutiondelivery/getProjectHoursExecuted.php?"+start+end,//url with optional parameters
    success:function(json){//success callback
      //weekly goal is 192 hours divided by 5 to get the daily goal
      var weeklyGoal = 192/5;
      var hoursExecuted;
      if(json[0]['thisWeek'] == null){
          hoursExecuted = 0;
      }else{
        //set project hours equal to first position of json array
            hoursExecuted = parseFloat(json[0]['thisWeek']);
            //hoursExecuted = hoursExecuted.toFixed(2);
      }
      //get text from element
      var $executedEl = parseFloat($('#executed').text());
      //get text from percent to goal element
      var $percentToGoalEl = $('#percentToGoal').text();
          //strip everything but the numerical characters and convert that to an integer
          $percentToGoalEl = parseInt($percentToGoalEl.replace(/[^0-9.]/g, ""));
      //get text from week to date goal element
      var $weekToDateGoalEl = $('#weekToDateGoal').text();
          //strip everything but the numerical characters and convert that to an integer
          $weekToDateGoalEl = parseInt($weekToDateGoalEl.replace(/[^0-9.]/g, ""));
      //set the color based on the value of the percentToGoal variable
      //initialize color variable
      var color = '';
          //if greater than or equal to 90%

      //initialize the startDate variable with the start param passed in the function
      var startDate = new Date(start);
      //initialize the startDate variable with the end param passed in the function
      var endDate = new Date(end);
      //initialize the dayCount variable to zero
      var dayCount = 0;
      //Check if the start variable contains a date an not one of the values below
      if(start !== 'this' && start !=='nodate' && start !== ''){
        //Define local variable count as the number of days between the two dates passed
          //to the days_between function
        var count = days_between(startDate,endDate);
            //set the dayCount variable equal the number of business days in between the start and end date
            dayCount = addWeekdays(startDate, count);
        //weekly goal so far is the weeklyGoal(38.4) * the number of business days
        var weeklyGoalSoFar = parseInt(weeklyGoal * dayCount);
        //Calculate the percentage to the goal so far
        var percentToGoal = parseInt((hoursExecuted / weeklyGoalSoFar) * 100);
        if(percentToGoal > 100 ){
            color = "#2ECC71";
            //json[0]["Difference"] = "+"+json[0]["Difference"];
          }else if(percentToGoal > 80 && percentToGoal < 101){
            color = "#F1C40F";
          }else if(percentToGoal > 70 && percentToGoal < 80){
            color = "#E74C3C";
          }else{
            color = "#E74C3C";
          }
          console.log( hoursExecuted);
            //check to see if there was a change in hours executed
            if(hoursExecuted !== $executedEl){
              //counter options
              var options = {useEasing : true,useGrouping : true,separator : ',',decimal : '.',prefix : '',suffix : 'hrs'};
              //counter for total hours executed
              var hoursEx = new countUp("executed", $executedEl, hoursExecuted, 2,2.5,options);
                  //animate to color specified above
                  $('#executed').animate({color: color}, 1000);
                  //start counter animation
                  hoursEx.start();
                  //call the getHoursbyPE function with the dates passed in the function
                  getHoursByPE(start+end);
                  //call the getHoursByProject function with the dates passed in the function
                  getHoursByProject(start+end);
                }//end check to see if hours executed changed
        //set options for week to date goal counter
        var options1 = {useEasing : true,useGrouping : true,separator : ',',decimal : '.',prefix : ' to a goal of ',suffix : 'hrs'};
        //set counter variable for week to date goal
        var hoursExLast2 = new countUp("weekToDateGoal",parseInt($weekToDateGoalEl),parseInt(weeklyGoalSoFar), 0,2.5,options1);
            //start counter animation
            hoursExLast2.start();
            //counter options
            var options = {useEasing : true,useGrouping : true,separator : ',',decimal : '.',prefix : '',suffix : '%'};
            //set counter variable
            var hoursExLast = new countUp("percentToGoal",$percentToGoalEl,percentToGoal, 0,2.5,options);
                  $('#percentToGoal').animate({color: color}, 1000);
                //start counter
                hoursExLast.start();
      //if the start variable did not contain a date execute the following
    }else if(start=='nodate'){
      var Dates = new Date().getWeek();
      var today = new Date();
      Dates[0].setHours(12);
      console.log(Dates[0]);
      console.log(today);
      dayCount = 0;
      if(today.getDay() == 6 || today.getDay() == 0){
        dayCount = 5;
        var weeklyGoalSoFar = parseInt(weeklyGoal * dayCount);
        var percentToGoal = parseInt((hoursExecuted / weeklyGoalSoFar) * 100);
        if(percentToGoal > 100 ){
            color = "#2ECC71";
            //json[0]["Difference"] = "+"+json[0]["Difference"];
          }else if(percentToGoal > 80 && percentToGoal < 101){
            color = "#F1C40F";
          }else if(percentToGoal > 70 && percentToGoal < 80){
            color = "#E74C3C";
          }else{
            color = "#E74C3C";
          }
        var options1 = {useEasing : true,useGrouping : true,separator : ',',decimal : '.',prefix : ' to a week to date goal of ',suffix : 'hrs'};
        //set counter variable
        var hoursExLast2 = new countUp("weekToDateGoal",parseInt($weekToDateGoalEl),parseInt(weeklyGoalSoFar), 0,2.5,options1);
            //start counter
            hoursExLast2.start();
            //counter options
            var options = {useEasing : true,useGrouping : true,separator : ',',decimal : '.',prefix : '',suffix : '%'};
            //set counter variable
            var hoursExLast = new countUp("percentToGoal",$percentToGoalEl,percentToGoal, 0,2.5,options);
                  $('#percentToGoal').animate({color: color}, 1000);
                //start counter
                hoursExLast.start();
      }else{
        dayCount = days_between(Dates[0],today);
        var weeklyGoalSoFar = parseInt(weeklyGoal * dayCount);
        var percentToGoal = parseInt((hoursExecuted / weeklyGoalSoFar) * 100);
        if(percentToGoal > 100 ){
            color = "#2ECC71";
            //json[0]["Difference"] = "+"+json[0]["Difference"];
          }else if(percentToGoal > 80 && percentToGoal < 101){
            color = "#F1C40F";
          }else if(percentToGoal > 70 && percentToGoal < 80){
            color = "#E74C3C";
          }else{
            color = "#E74C3C";
          }
        var options1 = {useEasing : true,useGrouping : true,separator : ',',decimal : '.',prefix : ' to a week to date goal of ',suffix : 'hrs'};
        //set counter variable
        var hoursExLast2 = new countUp("weekToDateGoal",parseInt($weekToDateGoalEl),parseInt(weeklyGoalSoFar), 0,2.5,options1);
            //start counter
            hoursExLast2.start();
            //counter options
            var options = {useEasing : true,useGrouping : true,separator : ',',decimal : '.',prefix : '',suffix : '%'};
            //set counter variable
            var hoursExLast = new countUp("percentToGoal",$percentToGoalEl,percentToGoal, 0,2.5,options);
                  $('#percentToGoal').animate({color: color}, 1000);
                //start counter
                hoursExLast.start();
      }

    //check to see if the element is equal to the data from the ajax request
    if(parseFloat(hoursExecuted) !== parseFloat($executedEl)){
      //counter options
      var options = {useEasing : true,useGrouping : true,separator : ',',decimal : '.',prefix : '',suffix : 'hrs'};
      //set counter variable
      var hoursEx = new countUp("executed", $executedEl, hoursExecuted, 2,2.5,options);
          $('#executed').animate({color: color}, 1000);
          hoursEx.start();
            getHoursByPE('');
            getHoursByProject('');
        }
    }
      //console.log(dayCount);





    }
  });
}


function getHoursExecutedLastWeek(){
  $.ajax({
    type:"GET",
    url:"../../ajax/solutiondelivery/getProjectHoursExecuted.php?lastweek=true",
    success:function(json){
      var weeklyGoal = 192/5;
      //set project hours equal to first position of json array
      var hoursExecuted = parseFloat(json[0]['thisWeek']);
          hoursExecuted = hoursExecuted.toFixed(2);
      //get text from element
      var $executedEl = parseInt($('#executed').text());
      //set hours week equal to variable
      //var hoursExecutedLastWeek = parseInt(hoursExecuted - parseInt(json[1]['lastWeek']));
      //get text from vs element

      var $percentToGoalEl = parseFloat($('#percentToGoal').text());
      var $weekToDateGoalEl = parseFloat($('#weekToDateGoal').text());
      /*if(variance < 5){
          color = "#2ECC71";
          //json[0]["Difference"] = "+"+json[0]["Difference"];
        }else if(variance > 5 && variance < 10){
          color = "#F1C40F";
        }else if(variance > 10 && percent < 30){
          color = "#E67E22";
        }else{
          color = "#E74C3C";
        }*/
      var Dates = new Date().getWeek();
      var today = new Date();
      var dayCount = days_between(Dates[0],today)-1;

      var weeklyGoalSoFar = parseFloat(weeklyGoal * 5);
      var percentToGoal = parseInt((hoursExecuted / weeklyGoalSoFar) * 100);

      if(percentToGoal > 100 ){
          color = "#2ECC71";
          //json[0]["Difference"] = "+"+json[0]["Difference"];
        }else if(percentToGoal > 80 && percentToGoal < 101){
          color = "#F1C40F";
        }else if(percentToGoal > 70 && percentToGoal < 80){
          color = "#E74C3C";
        }else{
          color = "#E74C3C";
        }

      //check to see if the element is equal to the data from the ajax request
      if(hoursExecuted !== $executedEl){
        //counter options
        var options = {useEasing : true,useGrouping : true,separator : ',',decimal : '.',prefix : '',suffix : 'hrs'};
        //set counter variable
        var hoursEx = new countUp("executed", $executedEl, hoursExecuted, 2,2.5,options);
            $('#executed').animate({color: color}, 1000);
            hoursEx.start();
        //counter options
        var options = {useEasing : true,useGrouping : true,separator : ',',decimal : '.',prefix : '',suffix : '%'};
        //set counter variable
        var hoursExLast = new countUp("percentToGoal",$percentToGoalEl,percentToGoal, 0,2.5,options);
              $('#percentToGoal').animate({color: color}, 1000);
            //start counter
            hoursExLast.start();
        var options = {useEasing : true,useGrouping : true,separator : ',',decimal : '.',prefix : ' to a goal of ',suffix : 'hrs'};
        //set counter variable
        var hoursExLast2 = new countUp("weekToDateGoal",$weekToDateGoalEl,192, 0,2.5,options);
            //start counter
            hoursExLast2.start();
            getHoursByProject('lastweek=true');
            getHoursByPE('lastweek=true');
          }
    }
  });
}



function getOpenProjectCount(){
  $.ajax({
    type:"GET",
    url:"../../ajax/solutiondelivery/getOpenProjectCount.php",
    success:function(json){
      //set projectCount equal to first position of json array
      var projectCount = parseInt(json[0]['openProjects']);
      //get text from element
      var $projectEl = parseInt($('#clientProjectCount').text());
      //check to see if we need to use the counter or not
      if(projectCount !== $projectEl){
        //counter options
        var options = {useEasing : true,useGrouping : true,separator : ',',decimal : '.',prefix : '',suffix : ''};
        //set counter variable
        var projects = new countUp("clientProjectCount", $projectEl, projectCount, 0,2.5,options);
            //start counter
            projects.start();
        }//end check to see if there is a need to increase or decrease the open project count
    }//end success
  });//end ajax call
}//end getOpenProjectCount




function getHoursLeft(){
  $.ajax({
    type:"GET",
    url:"../../ajax/solutiondelivery/hoursLeft.php",
    success:function(hours){
      //set projectCount equal to first position of json array
      var remaining = hours['queue'];
      //get text from element
      var $remainingEl = $('#hoursRemaining').text();
      $remainingEl = parseInt($remainingEl.replace(/\$|,/g, ''));
      //check to see if we need to use the counter or not
      if(remaining !== $remainingEl){
        var $totalEl = $('#totalBudget').text();
            $totalEl = parseInt($totalEl.replace(/\$|,/g, ''));

        var options = {useEasing : true,useGrouping : true,separator : ',',decimal : '.',prefix : '',suffix : ' total budgeted hours'};        //set counter variable
        var total = new countUp("totalBudget", $totalEl, parseInt(hours['totalBudget']), 0,2.5,options);
            //start counter
            total.start();
        //0 total budgeted hours



        //counter options
        var options = {useEasing : true,useGrouping : true,separator : ',',decimal : '.',prefix : '',suffix : 'hrs'};        //set counter variable
        var remainingHours = new countUp("hoursRemaining", $remainingEl, remaining, 0,2.5,options);
            //start counter
            remainingHours.start();


        var variance  = hours['totalBudget'];
            variance  = (hours['overage']/variance)*100;
            console.log("Variance: "+variance);
            if(variance < 5){
                color = "#2ECC71";
                //json[0]["Difference"] = "+"+json[0]["Difference"];
              }else if(variance > 5 && variance < 10){
                color = "#F1C40F";
              }else if(variance > 10 && percent < 30){
                color = "#E67E22";
              }else{
                color = "#E74C3C";
              }
            var $varianceEl = $('#overVariance').text();
                $varianceEl = parseInt($varianceEl.replace(/\$|,/g, ''));
            //set options for percentGoal counter
            var options = {useEasing : true,useGrouping : true,separator : ',',decimal : '.',prefix : '',suffix : '% variance'};
            //set counter variable
            var varianceCounter = new countUp("overVariance", $varianceEl,variance, 0,2.5,options);
                $('#overVariance').animate({color: color}, 1000);
                varianceCounter.start();


        //get text element
        var $goalEl = $('#percentHoursGoal').text();
            $goalEl = parseInt($goalEl.replace(/\$|,/g, ''));
        //calculate the percent to goal
        var percent = (remaining/1920)*100;
            console.log(percent);

            if(percent > 100 ){
                color = "#2ECC71";
                //json[0]["Difference"] = "+"+json[0]["Difference"];
              }else if(percentToGoal > 80 && percent < 101){
                color = "#F1C40F";
              }else if(percent > 70 && percent < 80){
                color = "#E74C3C";
              }else{
                color = "#E74C3C";
              }

        //set options for percentGoal counter
        var options = {useEasing : true,useGrouping : true,separator : ',',decimal : '.',prefix : '',suffix : '%'};
        //set counter variable
        var percentGoal = new countUp("percentHoursGoal", $goalEl, percent, 0,2.5,options);
            $('#percentHoursGoal').animate({color: color}, 1000);
            percentGoal.start();

        var $weeksEl = $('#hoursInWeeks').text();
            $weeksEl = parseFloat($weeksEl.replace(/\$|,/g, ''));
        var weeksCalc = remaining/192;
        var options = {useEasing : true,useGrouping : true,separator : ',',decimal : '.',prefix : '',suffix : ' weeks'};
        var weeks = new countUp("hoursInWeeks", $weeksEl, weeksCalc, 0,2.5,options);
            weeks.start();


        var $overEl = $('#hoursOver').text();
            $overEl = parseFloat($overEl.replace(/\$|,/g, ''));
        var overCalc = parseInt(hours['overage']);
        var options = {useEasing : true,useGrouping : true,separator : ',',decimal : '.',prefix : '',suffix : 'hrs'};
        var over = new countUp("hoursOver", $overEl, overCalc, 0,2.5,options);
            over.start();
        }//end check to see if there is a need to increase or decrease the open project count
    }//end success
  });//end ajax call
}

function getHoursByPE(value){
  $.ajax({
    type:"GET",
    url:"../../ajax/solutiondelivery/getProjectHoursExecuted.php?member=true&"+value,
    success:function(json){
      hoursByGuy = json;
      var total = 0;
      for(var i = 0;i < json.length;i++){
        total = total + parseFloat(json[i]["thisWeek"]);
      }
      var xlabels = [], type_count = [],colors = [],percent = [];
          for(var i = 0; i < json.length; i++) {
              label:xlabels.push(json[i]["member_id"]);
              value: type_count.push(json[i]["thisWeek"]);
              //value2:percent.push(((parseInt(json[i]['thisWeek'])/total)*100).toFixed());
              }

        doughnutData = [];
        for(var i = 0; i < xlabels.length;i++){
        //if(xlabels[i] != "undefined"){
          doughnutData.push({
            value:type_count[i],
            //value2:type_count[i],
            color:getRandomColor1(),
            highlight:getRandomColor1(),
            label:xlabels[i]
            });
          //}
        }
        var options =
    {
        tooltipTemplate: "<%= label %> <%= value %>",

        onAnimationComplete: function()
        {
            this.showTooltip(this.segments, true);
        },

        tooltipEvents: [],

        showTooltips: true
    }
      $('#hoursbyPM').replaceWith('<canvas id="hoursByPM" width="300" height="300"></canvas>');
      var rCM = document.getElementById("hoursByPM").getContext("2d");
      rCM.canvas.width = 300;
      rCM.canvas.height = 300;
      var projectChart = new Chart(rCM).Doughnut(doughnutData,options);
      legend(document.getElementById("hoursByPMLegend"), doughnutData);
    }
  });
}

function getHoursByProject(value){
  $.ajax({
    type:"GET",
    url:"../../ajax/solutiondelivery/getHoursByProject.php?"+value,
    success:function(html){
      $('#projectTable').replaceWith("<div id='projectTable'>"+html+"</div>");
    }
  });
}



$(document).ready(function(){

$('[data-toggle="tooltip"]').tooltip();

var hoursExecutedID = null;
//get open client projects on page load
getHoursExecuted('nodate','');
//check for changes to the open client project count every minute
hoursExecutedID = setInterval(function(){ getHoursExecuted('nodate',''); }, 5000);
//get open client projects on page load
getOpenProjectCount();
//check for changes to the open client project count every minute
setInterval(function(){ getOpenProjectCount(); }, 60000);
//get hours left in queue on page load
getHoursLeft();
//check for changes to hours left in queue every 5 seconds
setInterval(function(){ getHoursLeft(); },5000);

//getHoursByPE();
//setInterval(function(){ getHoursByPE(); },5000);


//setInterval(function(){ getHoursByProject(); },10000);


$('input[name="daterange"]').daterangepicker();

$('#daterange').on('apply.daterangepicker', function(ev, picker) {
  var start = picker.startDate.format('YYYY-MM-DD');
  var end = picker.endDate.format('YYYY-MM-DD');
  clearInterval(hoursExecutedID);
  hoursByPEFrozen = true
  $('#lastWkHours').replaceWith('<a style="float:right;"  id="thisWkHours" class="btn btn-md btn-default">This Wk</a>');


    getHoursExecuted("start="+start,"&end="+end);


});



$('#dateSwitchHours').on('click','#lastWkHours',function(e){
$('#lastWkHours').replaceWith('<a style="float:right;"  id="thisWkHours" class="btn btn-md btn-default">This Wk</a>');
$('#vsExecuted').replaceWith('<p style="text-align:center;" id="vsExecuted"><span id="percentToGoal">0% to a goal of </span><span id="weekToDateGoal">0hrs</span></p>');
clearInterval(hoursExecutedID);
$('#daterange').attr('value','');
e.preventDefault();
getHoursExecutedLastWeek();

});

$('#dateSwitchHours').on('click','#thisWkHours',function(e){

$('#thisWkHours').replaceWith('<a style="float:right;"  id="lastWkHours" class="btn btn-md btn-info">Last Wk</a>');
$('#vsExecuted').replaceWith('<p style="text-align:center;" id="vsExecuted"><span id="percentToGoal">0%</span><span id="weekToDateGoal">0hrs</span></p>');
hoursExecutedID = setInterval(function(){ getHoursExecuted('nodate'); }, 5000);
e.preventDefault();
getHoursExecuted('nodate','');

});


});
