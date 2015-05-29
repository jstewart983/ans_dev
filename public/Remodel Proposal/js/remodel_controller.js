var employee = function(empID,EmpEnrollLvl,EmpIncome,empState,empAge,spouseAge,depCountUnder,depCountOver,spouseIncome){
  this.empID = empID;
  this.EmpEnrollLvl = EmpEnrollLvl;
  this.EmpIncome = EmpIncome;
  this.empState = empState;
  this.empAge = empAge;
  this.spouseAge = spouseAge;
  this.depCountUnder = depCountUnder;
  this.depCountOver = depCountOver;
  this.spouseIncome = spouseIncome;
}

employee.prototype.calcIndSubEmp = function(){
  var IndSubEmp = 0;
  if(this.EmpEnrollLvl == "EE"){
    IndSubEmp = this.EmpIncome * .05;
  }else if(this.EmpEnrollLvl == "EC"){

    IndSubEmp = this.EmpIncome * 1;
  }else{
    IndSubEmp = 1000;
  }
  return IndSubEmp;
}

avgSalary = function(array){
  var num = 0;
  for(i=0;i<array.length;i++){
    num = parseInt(num) + parseInt(array[i].EmpIncome);
  }
  var average = parseInt(num) / parseInt(array.length);
  return average;
}

var stateList = new Array("AK","AL","AR","AZ","CA","CO","CT","DC","DE","FL","GA","GU","HI","IA","ID", "IL","IN","KS","KY","LA","MA","MD","ME","MH","MI","MN","MO","MS","MT","NC","ND","NE","NH","NJ","NM","NV","NY", "OH","OK","OR","PA","PR","PW","RI","SC","SD","TN","TX","UT","VA","VI","VT","WA","WI","WV","WY");

getRandomCounty = function(array){

  for(i=0;i<array.length;i++){
    $.ajax({
      type:"GET",
      crossDomain: true,
      url:"http://api.sba.gov/geodata/city_county_links_for_state_of/"+array[i].empState+"&format=json",
      dataType:'jsonp',
      success:function(json){console.log("success");},
      error: function(){console.log("fail");}
    });
  }


}


var lvlArray = ['EE','EF','EC','W'];
var empIDArray = [0,1,2,3,4,5,6,7,8,9];
var EmpEnrollLvlArray = [lvlArray[Math.floor((Math.random()*3)+0)],lvlArray[Math.floor((Math.random()*3)+0)],lvlArray[Math.floor((Math.random()*3)+0)],lvlArray[Math.floor((Math.random()*3)+0)],lvlArray[Math.floor((Math.random()*3)+0)],lvlArray[Math.floor((Math.random()*3)+0)],lvlArray[Math.floor((Math.random()*3)+0)],lvlArray[Math.floor((Math.random()*3)+0)],lvlArray[Math.floor((Math.random()*3)+0)],lvlArray[Math.floor((Math.random()*3)+0)]];
var EmpIncomeArray = [Math.floor((Math.random()*100000)+30000),Math.floor((Math.random()*100000)+30000),Math.floor((Math.random()*100000)+30000),Math.floor((Math.random()*100000)+30000),Math.floor((Math.random()*100000)+30000),Math.floor((Math.random()*100000)+30000),Math.floor((Math.random()*100000)+30000),Math.floor((Math.random()*100000)+30000),Math.floor((Math.random()*100000)+30000),Math.floor((Math.random()*100000)+30000)];
var empStateArray = [stateList[Math.floor((Math.random()*50)+1)],stateList[Math.floor((Math.random()*50)+1)],stateList[Math.floor((Math.random()*50)+1)],stateList[Math.floor((Math.random()*50)+1)],stateList[Math.floor((Math.random()*50)+1)],stateList[Math.floor((Math.random()*50)+1)],stateList[Math.floor((Math.random()*50)+1)],stateList[Math.floor((Math.random()*50)+1)],stateList[Math.floor((Math.random()*50)+1)],stateList[Math.floor((Math.random()*50)+1)]]
var numEmps = empIDArray.length;
var emps = [];
for(i = 0;i<empIDArray.length;i++){
   emps[i] = new employee(empIDArray[i],EmpEnrollLvlArray[i],EmpIncomeArray[i],empStateArray[i]);
}

console.log(emps);
for(i=0;i<emps.length;i++){
  console.log(emps[i].calcIndSubEmp());
}

console.log(avgSalary(emps));
//getRandomCounty(emps);

$.ajax({
  type:"GET",
  Host: "api.sba.gov",
  url:"http://api.sba.gov/geodata/city_county_links_for_state_of/"+emps[0].empState+".json",
  success:function(json){console.log("success");},
  error: function(){console.log("fail");}
});
