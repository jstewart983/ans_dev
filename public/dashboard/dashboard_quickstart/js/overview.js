// Welcome to the RazorFlow Dashbord Quickstart. Simply copy this "dashboard_quickstart"
// to somewhere in your computer/web-server to have a dashboard ready to use.
// This is a great way to get started with RazorFlow with minimal time in setup.
// However, once you're ready to go into deployment consult our documentation on tips for how to 
// maintain the most stable and secure 



rf.StandaloneDashboard(function(tdb){




tdb.setDashboardTitle('Executive Summary');

var company_tickets= new ChartComponent();
company_tickets.setDimensions (6,4);
company_tickets.setCaption ("Open Tickets by Company - Top 10 (excluding Results)");
company_tickets.lock();
tdb.addComponent(company_tickets);


$.get("./ajax/getTicketsByCompany.php", function(data) {
    var labels = [], ticket_data = [];
    for(var i = 0; i < data.length; i++) {
        labels.push (data[i]["Company_Name"]);
        ticket_data.push (parseInt(data[i]["openTickets"]));
    }
    company_tickets.setLabels (labels);
    
    company_tickets.addSeries ("Tickets", "Tickets", ticket_data, {
       
    });
    
    company_tickets.unlock();
});

var solution_delivery= new ChartComponent();
solution_delivery.setDimensions (4,4);
solution_delivery.setCaption ("Project Hours Completed this week by Engineer");
solution_delivery.lock();
tdb.addComponent(solution_delivery);


$.get("./ajax/getProjectHours.php", function(data) {
    var labels = [], project_data = [];
    for(var i = 0; i < data.length; i++) {
        labels.push (data[i]["lName"]);
        project_data.push (parseInt(data[i]["Project_Hours"]));
    }
    solution_delivery.setLabels (labels);
    
    solution_delivery.addSeries ("hours", "Hours", project_data, {
       
    });
    
    solution_delivery.unlock();
});
var solution = new ChartComponent();
solution.setDimensions(3,2);
solution.setCaption("Hours by Engineer");
solution.lock();
tdb.addComponent(solution);

$.get("./ajax/getProjectHours.php", function(data) {
    var labels = [], project = [];
    for(var i = 0; i < data.length; i++) {
        labels.push (data[i]["lName"]);
        project.push (parseInt(data[i]["Project_Hours"]));
    }
    solution.setLabels (labels);
    solution.setPieValues (project, {
       dataType:"number",
       numberSuffix:"hrs"
    });
    
    solution.unlock();
});




var solution_delivery2 = new GaugeComponent();
solution_delivery2.setDimensions (2,3);
solution_delivery2.setCaption ("Hours vs Goal");
solution_delivery2.setLimits(0,60)
solution_delivery2.lock();
tdb.addComponent(solution_delivery2);

$.get("./ajax/getTotalProjectHours.php", function(data) {
    var labels = [], project_data2 = [];
    for(var i = 0; i < data.length; i++) {
        
        project_data2.push (parseInt(data[i]["Project_Hours"]));
    }
    solution_delivery2.setValue (project_data2, {
         
        valueTextColor: "#ff000d"
    });
    
    solution_delivery2.unlock();
});

var solution_delivery3 = new KPIComponent();
solution_delivery3.setDimensions (2,2);
solution_delivery3.setCaption ("Total Project Hours This Week");
solution_delivery3.lock();
tdb.addComponent(solution_delivery3);

getTotalHours();
function getTotalHours(){
$.get("./ajax/getTotalProjectHours.php", function(data) {
    var labels = [], project_data3 = [];
    for(var i = 0; i < data.length; i++) {
        
        project_data3.push (parseInt(data[i]["Project_Hours"]));
    }
    solution_delivery3.setValue (project_data3, {
         
        valueTextColor: "#ff000d"
    });
    
    solution_delivery3.unlock();
});
}
window.setInterval(function(){
 getTotalHours();
}, 1200000);




var service_delivery = new KPIComponent();
service_delivery.setDimensions (2,2);
service_delivery.setCaption ("Total Open Tickets");
service_delivery.lock();
db.addComponent(service_delivery);

getOpenTickets()
function getOpenTickets(){
$.get("./ajax/getOpenTickets.php", function(data) {
    var labels = [], service_data = [];
    for(var i = 0; i < data.length; i++) {
        
        service_data.push (parseInt(data[i]["computed"]));
    }
    service_delivery.setValue (service_data, {
         
        valueTextColor: "#ff000d"
    });
    
    service_delivery.unlock();
});
}

db.setInterval(function(){
 getOpenTickets();
}, 30000);






});


