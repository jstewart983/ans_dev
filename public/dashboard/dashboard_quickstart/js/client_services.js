rf.StandaloneDashboard(function(tdb){

tdb.setTabbedDashboardTitle("ANS Reporting");

var db1 = new Dashboard();
db1.setDashboardTitle('Summary');

var solution_delivery= new ChartComponent();
solution_delivery.setDimensions (6,3);
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
        seriesDisplayType: "area"
    });
    solution_delivery.addSeries ("hours", "Hours", project_data, {
        seriesDisplayType: "line"
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


tdb.addDashboardTab(db1, {
        title: 'Active Client List',
        active: true
    });
  
  


}, {tabbed: true});

