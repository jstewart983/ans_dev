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



/*table.addColumn ('name', 'Name');
table.addColumn ('category', 'Category');
table.addColumn ('price', 'Price');*/
     var tableData = [
{name: "Broccoli", category: "Vegetables", price: 14},
{name: "Cheese", category: "Dairy", price: 18},
{name: "Tomatoes", category: "Vegetables", price: 8},
{name: "Orange Juice", category: "Beverages", price: 12},
{name: "Root Beer", category: "Beverages", price: 13},
];
console.log(tableData);


        $.get("../ajax/getClientList.php", function(data) {
    var c = { data: [] };

for (var o in data) {
    var n = o.match(/^object(\d+)$/);
    if (n) c.data[n[1]] = data[o];
    console.log(data);

}
   table.addMultipleRows(data);







    });















    tab1.addComponent(table);
  // Now actually add the dashboards to the main dashboard.
  db.addDashboardTab (tab1, {
    title: "Active Client List",
    active: true // this tab should be active by default.
  });

}, {tabbed:true});
