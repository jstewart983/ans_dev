// Welcome to the RazorFlow Dashbord Quickstart. Simply copy this "dashboard_quickstart"
// to somewhere in your computer/web-server to have a dashboard ready to use.
// This is a great way to get started with RazorFlow with minimal time in setup.
// However, once you're ready to go into deployment consult our documentation on tips for how to 
// maintain the most stable and secure 

$(document).ready(function(){

var data = {
    labels: ["January", "February"],
    datasets: [
        {
            
            fillColor: "rgba(220,220,220,0.5)",
            strokeColor: "rgba(220,220,220,0.8)",
            highlightFill: "rgba(220,220,220,0.75)",
            highlightStroke: "rgba(220,220,220,1)",
            data: [65, 59],
            label: "Aaron"
        },
        {
            
            fillColor: "rgba(151,187,205,0.5)",
            strokeColor: "rgba(151,187,205,0.8)",
            highlightFill: "rgba(151,187,205,0.75)",
            highlightStroke: "rgba(151,187,205,1)",
            data: [80, 48],
            label: "Chris"
        },
        {
            
            fillColor: "rgba(151,110,205,0.5)",
            strokeColor: "rgba(151,110,205,0.8)",
            highlightFill: "rgba(151,110,205,0.75)",
            highlightStroke: "rgba(151,110,205,1)",
            data: [67, 89],
            label: "Jeff"
        },
        {
            
            fillColor: "rgba(670,198,105,0.5)",
            strokeColor: "rgba(670,198,105,0.8)",
            highlightFill: "rgba(670,198,105,0.75)",
            highlightStroke: "rgba(670,198,105,1)",
            data: [70, 100],
            label: "Kyle"
        }
    ]
};



var ctx = document.getElementById("salesByVcio").getContext("2d");
var myNewChart = new Chart(ctx).Bar(data);
legend(document.getElementById("salesByVcioLegend"), data);
console.log(legend(document.getElementById("salesByVcioLegend"), data));


var data2 = [
    {
        value: 300000,
        color:"#F7464A",
        highlight: "#FF5A5E",
        label: "Results"
    },
    {
        value: 50000,
        color: "#46BFBD",
        highlight: "#5AD3D1",
        label: "Kenny Pipe"
    },
    {
        value: 70000,
        color: "#FDB45C",
        highlight: "#FFC870",
        label: "Legal Aid"
    }
]



var ctx1 = document.getElementById("salesByClient").getContext("2d");
var myNewChart1 = new Chart(ctx1).Doughnut(data2);
legend(document.getElementById("salesByClientLegend"), data2);


  
            
});




