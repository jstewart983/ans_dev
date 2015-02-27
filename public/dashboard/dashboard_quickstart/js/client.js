// Welcome to the RazorFlow Dashbord Quickstart. Simply copy this "dashboard_quickstart"
// to somewhere in your computer/web-server to have a dashboard ready to use.
// This is a great way to get started with RazorFlow with minimal time in setup.
// However, once you're ready to go into deployment consult our documentation on tips for how to 
// maintain the most stable and secure 



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

            




        // Serialize the form data.
        var formData = $(form).serialize();

        //var href = $('input').attr('href');

        



        /*$.ajax({ 
                url: "../ajax/getOpenProjectCount.php"+clickedVal,
                    //data:href,
                    type:"POST",
                    context: document.body,
                    success: function(html){
                        console.log(html);
                     $("#clientData").append(html);
                    }
                })*/

      // rf.StandaloneDashboard(function(tdb){


var title = clickedVal.substr(clickedVal.indexOf("=") + 1);

$("#title").text(title);
//tdb.setDashboardTitle(title);

  

/*var results1 = new KPIComponent();
//results1.setDimensions (1,1);
results1.setCaption ("Open Tickets");
results1.lock();
db.addComponent(results1);

getOpenTickets();

function getOpenTickets(){
results1.lock();
$.ajax({ 
                url: "../ajax/getTicketsByCompany.php"+clickedVal,
                    //data:href,
                    type:"POST",
                    context: document.body,
                    success: function(html){
                        
                     var labels = [], data = [];
                    for(var i = 0; i < html.length; i++) {
        
                    data.push (parseInt(html[i]["openTickets"]));
                    }
                    results1.setValue (data, {
         
                    valueTextColor: "#414141"
                    });
    
                    results1.unlock();
                    }
                })

}*/




/*var service_delivery = new KPIComponent();
//service_delivery.setDimensions (1,1);
service_delivery.setCaption ("Open Projects");
service_delivery.lock();
db.addComponent(service_delivery);

getOpenProjects1();

function getOpenProjects1(){
    service_delivery.lock();
$.ajax({ 
                url: "../ajax/getOpenProjectCount.php"+clickedVal,
                    //data:href,
                    type:"POST",
                    context: document.body,
                    success: function(html){
                        
                     var labels = [], service_data = [];
                    for(var i = 0; i < html.length; i++) {
        
                    service_data.push (parseInt(html[i]["openProjects"]));
                    }
                    service_delivery.setValue (service_data, {
         
                    valueTextColor: "#F78E1E"
                    });
    
                    service_delivery.unlock();
                    }
                })

}*/
$.ajax({
    type: 'POST',
    url: "../ajax/avgTicketsPerDay.php"+clickedVal,
    success: function(json) {
        console.log(json);
                avgTickets = [];
        for(var i = 0; i < json.length; i++) {
        
        avgTickets.push (json[i]["Avg_Daily_Total_Tickets"]);
        console.log(json[i]['Avg_Daily_Total_Tickets']);
    }
    
        

         $('#title #avgTickets').fadeOut(500, function() {
         
        var $span1 = $('<h1 style="text-align:center;" id="avgTickets">'+json+'</h1>');
        //var $span2 = $('<canvas style="background-color:#F7E109;"  class="col-md-3" id="projectsCreated" height="auto" width="200"></canvas>');
        $("#avgTickets").replaceWith($span1);
        //$("#openProjects").replaceWith($span2);
        $span1.fadeIn(500);
     
    });
        

    }

});














$.ajax({
    type: 'POST',
    url: "../ajax/getOpenTicketsEcho.php"+clickedVal,
    success: function(json) {
        console.log(json);
                avgTickets = [];
        for(var i = 0; i < json.length; i++) {
        
        avgTickets.push (json[i]["Avg_Daily_Total_Tickets"]);
        console.log(json[i]['Avg_Daily_Total_Tickets']);
    }
    
        

         $('#ticketTitle #openTickets').fadeOut(500, function() {
         
        var $span1 = $('<h1 style="text-align:center;" id="openTickets">'+json+'</h1>');
        //var $span2 = $('<canvas style="background-color:#F7E109;"  class="col-md-3" id="projectsCreated" height="auto" width="200"></canvas>');
        $("#openTickets").replaceWith($span1);
        //$("#openProjects").replaceWith($span2);
        $span1.fadeIn(500);
     
    });
        

    }

});





    $.ajax({
    type: 'POST',
    url: "../ajax/projects2014.php"+clickedVal,
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




         
        var $span2 = $('<canvas style="background-color:#fff;" id="projectsCreated" height="300" width="700"></canvas>');
        //var $span2 = $('<canvas style="background-color:#F7E109;"  class="col-md-3" id="projectsCreated" height="auto" width="200"></canvas>');
        $("#projectsCreated").replaceWith($span2);
        //$("#openProjects").replaceWith($span2);
        $span2.fadeIn(500);
        //$span2.fadeIn(500);

        var rCM = document.getElementById("projectsCreated").getContext("2d");

        var projectChart = new Chart(rCM).Bar(barChartData);

    });


    
        
   
        

    }

});









/*db.setInterval(function(){
 getOpenProjects1();
}, 30000);*/





/*db.setInterval(function(){
 getOpenTickets();
}, 30000);*/


//}); 




        });

        /*.done(function(response) {
            
        })*/
        /*.fail(function(data) {
           
        });*/

    });

});


