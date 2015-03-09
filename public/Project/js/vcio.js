// Welcome to the RazorFlow Dashbord Quickstart. Simply copy this "dashboard_quickstart"
// to somewhere in your computer/web-server to have a dashboard ready to use.
// This is a great way to get started with RazorFlow with minimal time in setup.
// However, once you're ready to go into deployment consult our documentation on tips for how to 
// maintain the most stable and secure 

$(document).ready(function(){




$.ajax({
    type: 'GET',
    url: "../ajax/getProjectRev.php",
    success: function(json) {
        
               /* avgTickets = [];
        for(var i = 0; i < json.length; i++) {
        
        avgTickets.push (json[i]["tot_NonMRR_Revenue"]);
        
    }*/
    
        function kFormatter(num) {
    return num > 999 ? (num/1000).toFixed(1) + 'k' : num
}


$('#projectRev1').fadeOut(200, function() {


            
            if(json==''){
                
               var $span1 = $('<h1 style="text-align:center;" id="projectRev1">$0</h1>'); 
            }else{
                var $span1 = $('<h1 style="text-align:center;" id="projectRev1">$'+kFormatter(json)+'</h1>');
            }
        
            
        



         
        
        
        $("#projectRev1").replaceWith($span1);
        
        $span1.fadeIn(800);
     
    });
        

    }

});






$.ajax({
    type: 'GET',
    url: "../ajax/getProjectRevMonth.php",
    success: function(json) {
        
               /* avgTickets = [];
        for(var i = 0; i < json.length; i++) {
        
        avgTickets.push (json[i]["tot_NonMRR_Revenue"]);
        
    }*/
    
        function kFormatter(num) {
    return num > 999 ? (num/1000).toFixed(1) + 'k' : num
}


$('#projectRev2').fadeOut(200, function() {


            
            if(json==''){
                
               var $span1 = $('<h1 style="text-align:center;" id="projectRev2">$0</h1>'); 
            }else{
                var $span1 = $('<h1 style="text-align:center;" id="projectRev2">$'+kFormatter(json)+'</h1>');
            }
        
            
        



         
        
        
        $("#projectRev2").replaceWith($span1);
        
        $span1.fadeIn(800);
     
    });
        

    }

});







$.ajax({
    type: 'GET',
    url: "../ajax/getMrrRev.php",
    success: function(json) {
        
               /* avgTickets = [];
        for(var i = 0; i < json.length; i++) {
        
        avgTickets.push (json[i]["tot_NonMRR_Revenue"]);
        
    }*/
    
        function kFormatter(num) {
    return num > 999 ? (num/1000).toFixed(1) + 'k' : num
}


 $('#mrrRev1').fadeOut(200, function() {


            
            if(!json==''){
                
               var $span1 = $('<h1 style="text-align:center;" id="mrrRev1">$0</h1>'); 
            }else{
                var $span1 = $('<h1 style="text-align:center;" id="mrrRev1">$'+kFormatter(json)+'</h1>');
            }
        
            
        



         
        
        
        $("#mrrRev1").replaceWith($span1);
        
        $span1.fadeIn(800);
     
    });
        

    }

});








$.ajax({
    type: 'GET',
    url: "../ajax/getMrrRevMonth.php",
    success: function(json) {
        
               /* avgTickets = [];
        for(var i = 0; i < json.length; i++) {
        
        avgTickets.push (json[i]["tot_NonMRR_Revenue"]);
        
    }*/
    
        function kFormatter(num) {
    return num > 999 ? (num/1000).toFixed(1) + 'k' : num
}


         $('#mrrRev2').fadeOut(200, function() {


            
            if(!json==''){
                
               var $span1 = $('<h1 style="text-align:center;" id="mrrRev2">$0</h1>'); 
            }else{
                var $span1 = $('<h1 style="text-align:center;" id="mrrRev2">$'+kFormatter(json)+'</h1>');
            }
        
            
        



         
        
        
        $("#mrrRev2").replaceWith($span1);
        
        $span1.fadeIn(800);
     
    });
        

    }

});










$.ajax({
    type: 'GET',
    url: "../ajax/getProductRev.php",
    success: function(json) {
        
               /* avgTickets = [];
        for(var i = 0; i < json.length; i++) {
        
        avgTickets.push (json[i]["tot_NonMRR_Revenue"]);
        
    }*/
    
        function kFormatter(num) {
    return num > 999 ? (num/1000).toFixed(1) + 'k' : num
}



$('#productRev1').fadeOut(200, function() {


            
            if(json==''){
                
               var $span1 = $('<h1 style="text-align:center;" id="productRev1">$0</h1>'); 
            }else{
                var $span1 = $('<h1 style="text-align:center;" id="productRev1">$'+kFormatter(json)+'</h1>');
            }
        
            
        



         
        
        
        $("#productRev1").replaceWith($span1);
        
        $span1.fadeIn(800);
     
    });
        

    }

});





$.ajax({
    type: 'GET',
    url: "../ajax/getProductRevMonth.php",
    success: function(json) {
        
               /* avgTickets = [];
        for(var i = 0; i < json.length; i++) {
        
        avgTickets.push (json[i]["tot_NonMRR_Revenue"]);
        
    }*/
    
        function kFormatter(num) {
    return num > 999 ? (num/1000).toFixed(1) + 'k' : num
}



$('#productRev2').fadeOut(200, function() {


            
            if(json==''){
                
               var $span1 = $('<h1 style="text-align:center;" id="productRev2">$0</h1>'); 
            }else{
                var $span1 = $('<h1 style="text-align:center;" id="productRev2">$'+kFormatter(json)+'</h1>');
            }
        
            
        



         
        
        
        $("#productRev2").replaceWith($span1);
        
        $span1.fadeIn(800);
     
    });
        

    }

});



var monthNames = ["January", "February", "March", "April", "May", "June",
  "July", "August", "September", "October", "November", "December"
];
var d = new Date();
console.log("The current month is " + monthNames[d.getMonth()-1]);

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




$.ajax({
    type: 'GET',
    url: "../ajax/salesByVcio.php",
    success: function(json) {
        
              labels=[], sales = [];
        for(var i = 0; i < json.length; i++) {
        
        
        labels.push (json[i]["first_name"]);
        sales.push (json[i]["Tot_NonMRR_Revenue"]);
    }
    

function getRandomColor() {
    var letters = '0123456789ABCDEF'.split('');
    var color = '#';
    for (var i = 0; i < 6; i++ ) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
}
        var barChartData = {
        title: "Sale by vCIO",
        labels : labels,
        datasets : [
            {
                fillColor : "rgba(120,420,220,0.5)",
                strokeColor : "rgba(120,420,220,0.8)",
                highlightFill: "rgba(120,420,220,0.75)",
                highlightStroke: "rgba(120,420,220,1)",
                data : sales
            },
            
        ]

    }

         $('#salesByVcio').fadeOut(200, function() {


            
            
    
var $span1 = $('<canvas id ="salesByVcio"height="auto"width="auto"></canvas>');
            
        
            
        



         
        
        
        $("#salesByVcio").replaceWith($span1);
        
        $span1.fadeIn(800);

        var ctx = document.getElementById("salesByVcio").getContext("2d");
        var myNewChart = new Chart(ctx).Bar(barChartData);
        //legend(document.getElementById("salesByVcioLegend"), data);
     
    });
        

    }

});











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




