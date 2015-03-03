// Welcome to the RazorFlow Dashbord Quickstart. Simply copy this "dashboard_quickstart"
// to somewhere in your computer/web-server to have a dashboard ready to use.
// This is a great way to get started with RazorFlow with minimal time in setup.
// However, once you're ready to go into deployment consult our documentation on tips for how to 
// maintain the most stable and secure 
//$.get("../ajax/getProjectHours.php", function(data) {
//$.get("../ajax/getOpenTickets.php", function(data) {
//$.get("../ajax/getTotalProjectHours.php", function(data) {
//$.get("../ajax/getTotalProjectHours.php", function(data) {
//$.get("../ajax/getProjectHours.php", function(data) {

function getServDelivData(value){
    $.ajax({
    type: 'POST',
    url: "../../ajax/avgTicketsPerDay.php"+value,
    success: function(json) {
        
                avgTickets = [];
        for(var i = 0; i < json.length; i++) {
        
        avgTickets.push (json[i]["Avg_Daily_Total_Tickets"]);
        
    }
    
        

         $('#title #avgTickets').fadeOut(500, function() {
         
        var $span1 = $('<h1 style="text-align:center;" id="avgTickets">'+json+'</h1>');
        //var $span2 = $('<canvas style="background-color:#F7E109;"  class="col-md-3" id="projectsCreated" height="auto" width="200"></canvas>');
        $("#avgTickets").replaceWith($span1);
        //$("#openProjects").replaceWith($span2);
        $span1.fadeIn(1200);
     
    });
        

    }

});














$.ajax({
    type: 'POST',
    url: "../../ajax/getOpenTicketsEcho.php"+value,
    success: function(json) {
        
                avgTickets = [];
        for(var i = 0; i < json.length; i++) {
        
        avgTickets.push (json[i]["Avg_Daily_Total_Tickets"]);
        
    }
    
        

         $('#ticketTitle #openTickets').fadeOut(500, function() {
         
        var $span1 = $('<h1 style="text-align:center;" id="openTickets">'+json+'</h1>');
        //var $span2 = $('<canvas style="background-color:#F7E109;"  class="col-md-3" id="projectsCreated" height="auto" width="200"></canvas>');
        $("#openTickets").replaceWith($span1);
        //$("#openProjects").replaceWith($span2);
        $span1.fadeIn(1200);
     
    });
        

    }

});







    $.ajax({
    type: 'POST',
    url: "../../ajax/serviceType.php"+value,
    success: function(json) {
        //labels = ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sept","Oct","Nov","Dec"];
        var xlabels = [], type_count = [],total_count=[],colors = [];
            for(var i = 0; i < json.length; i++) {

                label:xlabels.push (json[i]["Description"]);
                value: type_count.push (parseInt(json[i]["total_hours"]));
                value: total_count.push (parseInt(json[i]["typeCount"]));
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
        var radarChartData = {
        
        labels : xlabels,
        datasets : [
            {
                fillColor : "rgba(220,220,220,0.5)",
                strokeColor : "rgba(220,220,220,0.8)",
                highlightFill: "rgba(220,220,220,0.75)",
                highlightStroke: "rgba(220,220,220,1)",
                data : total_count
            },
            
        ]

    }




doughnutData = [
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
            ];



        $('#wherethestuffis #serviceType2').fadeOut(200, function() {




         
        var $span2 = $('<canvas id="serviceType2" height="300" width="300"></canvas>');
        //var $span2 = $('<canvas style="background-color:#F7E109;"  class="col-md-3" id="projectsCreated" height="auto" width="200"></canvas>');
        $("#serviceType2").replaceWith($span2);
        //$("#openProjects").replaceWith($span2);
        $span2.fadeIn(900);
        //$span2.fadeIn(500);

        var rCM = document.getElementById("serviceType2").getContext("2d");

        var projectChart = new Chart(rCM).Doughnut(doughnutData);

    });


    

$('#wherethestuffis #serviceType').fadeOut(200, function() {




         
        var $span2 = $('<canvas id="serviceType" height="300" width="400"></canvas>');
        //var $span2 = $('<canvas style="background-color:#F7E109;"  class="col-md-3" id="projectsCreated" height="auto" width="200"></canvas>');
        $("#serviceType").replaceWith($span2);
        //$("#openProjects").replaceWith($span2);
        $span2.fadeIn(1200);
        //$span2.fadeIn(500);

        var rCM = document.getElementById("serviceType").getContext("2d");

        var projectChart = new Chart(rCM).Radar(radarChartData);

    });


    
        
   
        

    }

});








    /*$.ajax({
    type: 'POST',
    url: "../ajax/serviceType.php"+value,
    success: function(json) {
        //labels = ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sept","Oct","Nov","Dec"];
           //labels = ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sept","Oct","Nov","Dec"];
        var xlabels = [], type_count = [],colors = [];
            for(var i = 0; i < json.length; i++) {

                label:xlabels.push (json[i]["Description"]);
                value: type_count.push (parseInt(json[i]["total_hours"]));
                fillColor: colors.push (getRandomColor());
                highlight: colors.push (getRandomColor());

                }
            
                
             doughnutData = [
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
            ];


                
function getRandomColor() {
    var letters = '0123456789ABCDEF'.split('');
    var color = '#';
    for (var i = 0; i < 6; i++ ) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
}


        $('#wherethestuffis #serviceType2').fadeOut(200, function() {




         
        var $span2 = $('<canvas style="background-color:#fff;" id="serviceType2" height="300" width="300"></canvas>');
        //var $span2 = $('<canvas style="background-color:#F7E109;"  class="col-md-3" id="projectsCreated" height="auto" width="200"></canvas>');
        $("#serviceType2").replaceWith($span2);
        //$("#openProjects").replaceWith($span2);
        $span2.fadeIn(900);
        //$span2.fadeIn(500);

        var rCM = document.getElementById("serviceType2").getContext("2d");

        var projectChart = new Chart(rCM).Doughnut(doughnutData);

    });


    
        
   
        

    }

});*/




















    $.ajax({
    type: 'POST',
    url: "../../ajax/projects2014.php"+value,
    success: function(json) {
        labels = ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sept","Oct","Nov","Dec"];
        var xlabels = [], project_count = [],colors = [];
            for(var i = 0; i < json.length; i++) {

                label:xlabels.push (json[i]["computed"]);
                value: project_count.push (parseInt(json[i]["projectsCreated"]));
                fillColor: colors.push (getRandomColor());

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
        title: "Projects Created by Month",
        labels : labels,
        datasets : [
            {
                fillColor : "rgba(220,220,220,0.5)",
                strokeColor : "rgba(220,220,220,0.8)",
                highlightFill: "rgba(220,220,220,0.75)",
                highlightStroke: "rgba(220,220,220,1)",
                data : project_count
            },
            
        ]

    }
    

$('#wherethestuffis #projectsCreated').fadeOut(500, function() {




         
        var $span2 = $('<canvas style="padding:10px;" id="projectsCreated" height="300" width="200"></canvas>');
        //var $span2 = $('<canvas style="background-color:#F7E109;"  class="col-md-3" id="projectsCreated" height="auto" width="200"></canvas>');
        $("#projectsCreated").replaceWith($span2);
        //$("#openProjects").replaceWith($span2);
        $span2.fadeIn(900);
        //$span2.fadeIn(500);

        var rCM = document.getElementById("projectsCreated").getContext("2d");

        var projectChart = new Chart(rCM).Bar(barChartData);

    });


    
        
   
        

    }

});
}




$(function() {

    // Get the form.
    var form = $('#companyForm');

    // Get the messages div.
    //var formMessages = $('#form-messages');

    // Set up an event listener for the contact form.
    $(form).submit(function(e) {

        


     
    
        // Stop the browser from submitting the form.
        e.preventDefault();
         event.stopPropagation();

        $('#companyForm input').on('click',function(){
            var clickedVal = $(this).attr('href');
             e.preventDefault();
             event.stopPropagation();
            //console.log(clickedVal);

            




        



var title = clickedVal.substr(clickedVal.indexOf("=") + 1);

$("#title").text(title);
getClientData(clickedVal);
$('input').off('click');
            
        });



    });

});
