var employee = function(empID,EmpEnrollLvl,EmpIncome){
  this.empID = empID;
  this.EmpEnrollLvl = EmpEnrollLvl;
  this.EmpIncome = EmpIncome;
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
var lvlArray = ['EE','EF','EC','W'];
var empIDArray = [0,1,2,3,4,5,6,7,8,9];
var EmpEnrollLvlArray = [lvlArray[Math.floor((Math.random()*3)+0)],lvlArray[Math.floor((Math.random()*3)+0)],lvlArray[Math.floor((Math.random()*3)+0)],lvlArray[Math.floor((Math.random()*3)+0)],lvlArray[Math.floor((Math.random()*3)+0)],lvlArray[Math.floor((Math.random()*3)+0)],lvlArray[Math.floor((Math.random()*3)+0)],lvlArray[Math.floor((Math.random()*3)+0)],lvlArray[Math.floor((Math.random()*3)+0)],lvlArray[Math.floor((Math.random()*3)+0)]];
var EmpIncomeArray = [Math.floor((Math.random()*100000)+30000),Math.floor((Math.random()*100000)+30000),Math.floor((Math.random()*100000)+30000),Math.floor((Math.random()*100000)+30000),Math.floor((Math.random()*100000)+30000),Math.floor((Math.random()*100000)+30000),Math.floor((Math.random()*100000)+30000),Math.floor((Math.random()*100000)+30000),Math.floor((Math.random()*100000)+30000),Math.floor((Math.random()*100000)+30000)];
//total number of employees
var numEmps = empIDArray.length;
var emps = [];
for(i = 0;i<empIDArray.length;i++){
   emps[i] = new employee(empIDArray[i],EmpEnrollLvlArray[i],EmpIncomeArray[i]);
}
for(i=0;i<emps.length;i++){
  console.log(emps[i].calcIndSubEmp());
}

console.log(avgSalary(emps));
