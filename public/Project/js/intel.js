var IntelAppMaster = IntelAppMaster || {};


IntelAppMaster.commonStuff = {

  printObject: function(obj) {

    for(property in obj){
      if(obj.hasOwnProperty(property)){

        console.log(property+": "+obj[property]);

      }
    }
  }

}


var IntelBox = function (boxName,boxClass,html,query,purpose) {

this.boxName = boxName;
this.boxClass = boxClass;
this.html = html;
this.query = query;
this.purpose = purpose;


};





var ticketKpi1 = new IntelBox("Machine Count","col-md-6","<h1></h1>","SELECT * FROM machines","To show the total count of machines for a given client/account");

var ticketKpi2 = new IntelBox("Workstation Count","col-md-2","<canvas></canvas>","SELECT * FROM machines where machine_name not like '%server%'","To show the total count of workstations for a given client/account");

objArray = [];
objArray.push(ticketKpi1);
objArray.push(ticketKpi2);



//IntelAppMaster.commonStuff.printObject(ticketKpi1);
//IntelAppMaster.commonStuff.printObject(ticketKpi2);


/*var test = "jordan";
//test[0].toUpperCase();
var firstLetter = '';
var name ='';
for(i=0;i<test.length;i++){
  if(i=0){
    var firstLetter = test[i].toUpperCase();
  }else{
    name = name+test[i];
  }
console.log(firstLetter+name);

}*/
