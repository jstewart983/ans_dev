// Welcome to the RazorFlow Dashbord Quickstart. Simply copy this "dashboard_quickstart"
// to somewhere in your computer/web-server to have a dashboard ready to use.
// This is a great way to get started with RazorFlow with minimal time in setup.
// However, once you're ready to go into deployment consult our documentation on tips for how to 
// maintain the most stable and secure 

$(document).ready(function(){

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



var ctx = document.getElementById("billableDay").getContext("2d");
var myNewChart = new Chart(ctx).Bar(data);







var data = {
    labels: ["Mon", "Tues","Weds","Thurs","Fri"],
    datasets: [
        {
            
            fillColor: "rgba(220,220,220,0.5)",
            strokeColor: "rgba(220,220,220,0.8)",
            highlightFill: "rgba(220,220,220,0.75)",
            highlightStroke: "rgba(220,220,220,1)",
            data: [54, 30,111,98,33],
            label: "New Tickets"
        },
        {
            
            fillColor: "rgba(120,220,220,0.5)",
            strokeColor: "rgba(120,220,220,0.8)",
            highlightFill: "rgba(120,220,220,0.75)",
            highlightStroke: "rgba(120,220,220,1)",
            data: [120, 60,78,45,25],
            label: "Tickets Closed"
        }
    ]
};



var ctx = document.getElementById("newOld").getContext("2d");
var myNewChart = new Chart(ctx).Bar(data);
legend(document.getElementById("newOldLegend"), data);


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





