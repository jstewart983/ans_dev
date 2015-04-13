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



var ctx = document.getElementById("hrsDay").getContext("2d");
var myNewChart = new Chart(ctx).Bar(data);







/*var data = {
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
legend(document.getElementById("newOldLegend"), data);*/


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

$(function() {
 $("#basicModal").modal();
});

});
