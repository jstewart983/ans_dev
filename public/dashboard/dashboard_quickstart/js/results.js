// Welcome to the RazorFlow Dashbord Quickstart. Simply copy this "dashboard_quickstart"
// to somewhere in your computer/web-server to have a dashboard ready to use.
// This is a great way to get started with RazorFlow with minimal time in setup.
// However, once you're ready to go into deployment consult our documentation on tips for how to 
// maintain the most stable and secure 
$(function() {

    // Get the form.
    var form = $('#companyForm');

    // Get the messages div.
    var formMessages = $('#form-messages');

    // Set up an event listener for the contact form.
    $(form).submit(function(e) {
        // Stop the browser from submitting the form.
        e.preventDefault();
         event.stopPropagation();
        // Serialize the form data.
        var formData = $(form).serialize();
        var href = $('input').attr('href');
        console.log(href);
        $.ajax({ 
                url: "../ajax/getOpenProjectCount.php"+href,
                    //data:href,
                    type:"POST",
                    context: document.body,
                    success: function(html){
                        console.log(html);
                     $("#clientData").append(html);
                    }
                })

       rf.StandaloneDashboard(function(tdb){


var title = href.substr(href.indexOf("=") + 1);

$("#title").text(title);
//tdb.setDashboardTitle(title);




var service_delivery = new KPIComponent();
service_delivery.setDimensions (2,2);
service_delivery.setCaption ("Open Tickets");
service_delivery.lock();
db.addComponent(service_delivery);

getOpenProjects1();
function getOpenProjects1(){
$.ajax({ 
                url: "../ajax/getOpenProjectCount.php"+href,
                    //data:href,
                    type:"POST",
                    context: document.body,
                    success: function(html){
                        
                     var labels = [], service_data = [];
                    for(var i = 0; i < html.length; i++) {
        
                    service_data.push (parseInt(html[i]["openProjects"]));
                    }
                    service_delivery.setValue (service_data, {
         
                    valueTextColor: "#ff000d"
                    });
    
                    service_delivery.unlock();
                    }
                })

}

db.setInterval(function(){
 getOpenProjects1();
}, 30000);



var results1 = new KPIComponent();
results1.setDimensions (2,2);
results1.setCaption ("Open Projects");
results1.lock();
db.addComponent(results1);

getOpenTickets();
function getOpenTickets(){
$.ajax({ 
                url: "../ajax/getOpenProjectCount.php"+href,
                    //data:href,
                    type:"POST",
                    context: document.body,
                    success: function(html){
                        
                     var labels = [], data = [];
                    for(var i = 0; i < html.length; i++) {
        
                    results1.push (parseInt(html[i]["openProjects"]));
                    }
                    results1.setValue (data, {
         
                    valueTextColor: "#ff000d"
                    });
    
                    results1.unlock();
                    }
                })

}

db.setInterval(function(){
 getOpenTickets();
}, 30000);


}); 
        /*.done(function(response) {
            
        })*/
        /*.fail(function(data) {
           
        });*/

    });

});


