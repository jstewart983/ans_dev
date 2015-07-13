// Welcome to the RazorFlow Dashbord Quickstart. Simply copy this "dashboard_quickstart"
// to somewhere in your computer/web-server to have a dashboard ready to use.
// This is a great way to get started with RazorFlow with minimal time in setup.
// However, once you're ready to go into deployment consult our documentation on tips for how to
// maintain the most stable and secure


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
        var projects = new countUp("clientProjectCount", $projectEl, projectCount, 0,options);
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
        //counter options
        var options = {useEasing : true,useGrouping : true,separator : ',',decimal : '.',prefix : '',suffix : 'hrs'};        //set counter variable
        var remainingHours = new countUp("hoursRemaining", $remainingEl, remaining, 0,2.5,options);
            //start counter
            remainingHours.start();


        var variance  = hours['totalBudget'];
            variance  = hours['overage']/variance;
            console.log("Variance: "+variance);
        //get text element
        var $goalEl = $('#percentHoursGoal').text();
            $goalEl = parseInt($goalEl.replace(/\$|,/g, ''));
        //calculate the percent to goal
        var percent = (remaining/1920)*100;
            console.log(percent);

        if(percent > 90){
            color = "#2ECC71";
            //json[0]["Difference"] = "+"+json[0]["Difference"];
          }else if(percent > 80 && percent < 90){
            color = "#F1C40F";
          }else if(percent > 70 && percent < 80){
            color = "#E67E22";
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





$(document).ready(function(){
//get open client projects on page load
getOpenProjectCount();
//check for changes to the open client project count every minute
setInterval(function(){ getOpenProjectCount(); }, 60000);
//get hours left in queue on page load
getHoursLeft();
//check for changes to hours left in queue every 5 seconds
setInterval(function(){ getHoursLeft(); },5000);

var data = {
    labels: ["Mon", "Tues","Weds","Thurs","Fri"],
    datasets: [
        {

            fillColor: "rgba(220,220,220,0.5)",
            strokeColor: "rgba(220,220,220,0.8)",
            highlightFill: "rgba(220,220,220,0.75)",
            highlightStroke: "rgba(220,220,220,1)",
            data: [26, 30,60,45,33],
            label: "Hours"
        }
    ]
};



var ctx = document.getElementById("hrsDay").getContext("2d");
var myNewChart = new Chart(ctx).Bar(data);


var data2 = [
    {
        value: 30,
        color:"#F7464A",
        highlight: "#FF5A5E",
        label: "Lane"
    },
    {
        value: 60,
        color: "#46BFBD",
        highlight: "#5AD3D1",
        label: "Hogg"
    },
    {
        value: 75,
        color: "#FDB45C",
        highlight: "#FFC870",
        label: "Carnes"
    },
    {
        value: 24,
        color: "#4682B4",
        highlight: "#4682B1",
        label: "Collier"
    },
    {
        value: 24,
        color: "#E7ff89",
        highlight: "#E7ff80",
        label: "Sirovy"
    }
]



var ctx1 = document.getElementById("hrsMember").getContext("2d");
var myNewChart1 = new Chart(ctx1).Pie(data2);
legend(document.getElementById("hrsMemberLegend"), data2);



var data2 = [
    {
        value: 100,
        color:"#F7464A",
        highlight: "#FF5A5E",
        label: "Firewall Config"
    },
    {
        value: 60,
        color: "#46BFBD",
        highlight: "#5AD3D1",
        label: "Email Migration"
    },
    {
        value: 75,
        color: "#FDB45C",
        highlight: "#FFC870",
        label: "Virtualization"
    },
    {
        value: 24,
        color: "#4682B4",
        highlight: "#4682B1",
        label: "Network Assessment"
    },
    {
        value: 30,
        color: "#E7ff89",
        highlight: "#E7ff80",
        label: "Cloud Migration"
    }
]



var ctx1 = document.getElementById("hrsType").getContext("2d");
var myNewChart1 = new Chart(ctx1).Doughnut(data2);
legend(document.getElementById("hrsTypeLegend"), data2);



var data = {
    labels: ["March", "April","May","June","July","Aug","Sept","Oct","Nov","Dec"],
    datasets: [
        {

            fillColor: "rgba(220,220,220,0.5)",
            strokeColor: "rgba(220,220,220,0.8)",
            highlightFill: "rgba(220,220,220,0.75)",
            highlightStroke: "rgba(220,220,220,1)",
            data: [400, 200,70,30,12],
            label: "Hours"
        }
    ]
};



var ctx = document.getElementById("queue").getContext("2d");
var myNewChart = new Chart(ctx).Line(data);



});
