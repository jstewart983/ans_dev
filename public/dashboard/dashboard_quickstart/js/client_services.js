rf.StandaloneDashboard(function(db){
db.setTabbedDashboardTitle("ANS Reporting");
     var tab1 = new Dashboard ();
     tab1.setDashboardTitle('Active Client List');
    
    var table = new TableComponent ('test');
    table.setCaption ("Regional Sales");
    table.setDimensions(8, 4);
    table.addColumn ('type', "Type");
    table.addColumn ('status', "Status");
    table.addColumn ('Company_Name', "Company");
    table.addColumn ('Address_Line1', "Address 1");
    table.addColumn ('Address_Line2', "Address 2");
    table.addColumn ('City', "City");
    table.addColumn ('State_ID', "State");
    table.addColumn ('Zip', "Zip");

   
    $.get("../ajax/getClientList.php", function(data) {
    var clients = [];
    for(var i = 0; i < data.length; i++) {
        
        
        clients = data[i];
        console.log(clients);
        table.addMultipleRows (clients);

    }
    
    });
    
    
    

    
    
   
    
    
    
    
    

    tab1.addComponent(table);
  // Now actually add the dashboards to the main dashboard.
  db.addDashboardTab (tab1, {
    title: "Active Client List",
    active: true // this tab should be active by default.
  });
  
}, {tabbed:true});

