$(document).ready(function(){

var data2 = {
labels:["2015","2016","2017","2018","2019","2020"],
datasets: [
{

fillColor: "rgba(212, 216, 212, .9)",
strokeColor: "rgba(212, 216, 212,0.9)",
highlightFill: "rgba(212, 216, 212,0.9)",
highlightStroke: "rgba(212, 216, 212,.9)",
data:[20,30,60,90,105,127],
label: "This data"
}

]
};


var ctx = document.getElementById("bar").getContext("2d");
var myNewBar = new Chart(ctx).Bar(data2,{scaleShowGridLines:false,scaleShowVerticalLines: false,scaleShowHorizontalLines:false});

var data = [
    {
        value: 70,
        color:"#F7464A",
        highlight: "#FF5A5E",
        label: "Employer Contribution"
    },
    {
        value: 30,
        color: "#46BFBD",
        highlight: "#5AD3D1",
        label: "Employee Contribution"
    }
]

var rCM = document.getElementById("pie").getContext("2d");
var myPieChart = new Chart(rCM).Pie(data);



var salary = new countUp("avgSalary", 0, 67569, 0, 1.5);
salary.start();


var employees = new countUp("employees", 0,41, 0, 1.5);
employees.start();

});
