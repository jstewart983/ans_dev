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

       rf.StandaloneDashboard(function(tdb){


var title = clickedVal.substr(clickedVal.indexOf("=") + 1);

$("#title").text(title);
//tdb.setDashboardTitle(title);



var results1 = new KPIComponent();
results1.setDimensions (1,1);
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

}




var service_delivery = new KPIComponent();
service_delivery.setDimensions (1,1);
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

}





var projects_2014= new ChartComponent();
projects_2014.setDimensions (3,3);
projects_2014.setCaption ("Projects Created by Month in 2014");
projects_2014.lock();
db.addComponent(projects_2014);


$.get("../ajax/projects2014.php"+clickedVal, function(data) {

    if(data.length>0){

        
        
        var labels = [], project_count = [];
    for(var i = 0; i < data.length; i++) {
        labels.push (data[i]["computed"]);
        project_count.push (parseInt(data[i]["projectsCreated"]));
    }
    projects_2014.setLabels (labels);
    
    projects_2014.addSeries ("Projects", "Projects", project_count, {
       
    });
    
    projects_2014.unlock();
        
    }else{
        projects_2014.unlock();
    }
    
    
    
    
    
    
    
});









/*db.setInterval(function(){
 getOpenProjects1();
}, 30000);*/





/*db.setInterval(function(){
 getOpenTickets();
}, 30000);*/


}); 




        });

        /*.done(function(response) {
            
        })*/
        /*.fail(function(data) {
           
        });*/

    });

});


