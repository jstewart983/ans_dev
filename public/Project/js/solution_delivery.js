// Welcome to the RazorFlow Dashbord Quickstart. Simply copy this "dashboard_quickstart"
// to somewhere in your computer/web-server to have a dashboard ready to use.
// This is a great way to get started with RazorFlow with minimal time in setup.
// However, once you're ready to go into deployment consult our documentation on tips for how to 
// maintain the most stable and secure 



rf.StandaloneDashboard(function(tdb){

tdb.setTabbedDashboardTitle("ANS Reporting");

var db1 = new Dashboard();
db1.setDashboardTitle('Summary');

var solution_delivery= new ChartComponent();
solution_delivery.setDimensions (6,5);
solution_delivery.setCaption ("Project Hours Completed this week by Engineer");
solution_delivery.lock();
db1.addComponent(solution_delivery);


$.get("../ajax/getProjectHours.php", function(data) {
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
solution.setDimensions(5,3);
solution.setCaption("Hours by Engineer");
solution.lock();
db1.addComponent(solution);

$.get("../ajax/getProjectHours.php", function(data) {
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

var db2 = new Dashboard('db2');
db2.setDashboardTitle("Project Services");

var solution_delivery2 = new GaugeComponent();
solution_delivery2.setDimensions (6,6);
solution_delivery2.setCaption ("Hours vs Goal");
solution_delivery2.setLimits(0,60)
solution_delivery2.lock();
db2.addComponent(solution_delivery2);

$.get("../ajax/getTotalProjectHours.php", function(data) {
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
solution_delivery3.setDimensions (3,3);
solution_delivery3.setCaption ("Total Hours");
solution_delivery3.lock();
db2.addComponent(solution_delivery3);

getTotalHours();
function getTotalHours(){
$.get("../ajax/getTotalProjectHours.php", function(data) {
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

var db3 = new Dashboard('db3');
db3.setDashboardTitle("Managed Services");

var service_delivery = new KPIComponent();
service_delivery.setDimensions (4,4);
service_delivery.setCaption ("Open Tickets");
service_delivery.lock();
db3.addComponent(service_delivery);

getOpenTickets()
function getOpenTickets(){
$.get("../ajax/getOpenTickets.php", function(data) {
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
window.setInterval(function(){
 getOpenTickets();
}, 8000);

tdb.addDashboardTab(db1, {
        title: 'Summary',
        active: true
    });
  tdb.addDashboardTab(db2, {
        active: true
    });
  tdb.addDashboardTab(db3, {
        active: true
    });


}, {tabbed: true});