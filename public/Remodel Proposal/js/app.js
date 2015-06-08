var REMODELPROPOSAL = REMODELPROPOSAL || {};

// GLOBAL VARIABLES
REMODELPROPOSAL.chartData = null;
REMODELPROPOSAL.bar1 = null;
REMODELPROPOSAL.ctx = null;
REMODELPROPOSAL.employeeSavings = null;
REMODELPROPOSAL.employerSavings = null;
REMODELPROPOSAL.totalSavings = null;
REMODELPROPOSAL.hsa = null;
REMODELPROPOSAL.salaryUp = null;
REMODELPROPOSAL.employeeSavingsEl = "#employeeSavings";
REMODELPROPOSAL.employerSavingsEl = "#employerSavings";
REMODELPROPOSAL.totalSavingsEl = "#totalSavings";
//REMODELPROPOSAL.labels = null;

// Create container called MYAPP.commonMethod for common method and properties
REMODELPROPOSAL.commonMethod = {
  addButtonAction:function(parentEl,event,targetEl,url){//jquery button listener + ajax call

    $(parentEl).on(event,targetEl,function() {
      $.ajax({
          url: url,
          success: function(html){
            $(parentEl).hide().html(html).fadeIn({ duration: 500 });
          }
      });
    });

  },
  generateBarChart:function(targetEl,data){//adds bar chart

    REMODELPROPOSAL.ctx = document.getElementById(targetEl).getContext("2d");
    REMODELPROPOSAL.bar1 = new Chart(REMODELPROPOSAL.ctx).Bar(data,{scaleShowGridLines:false,scaleShowVerticalLines: false,scaleShowHorizontalLines:false});

  },
  numberWithCommas:function(x) {

    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");

  },
  searchStringInArray:function(str, strArray) {
   afterComma = "";
   for (var j=0; j<strArray.length; j++) {
   if (strArray[j].match(str))

     return strArray[j].toString();
   }
   return -1;
 },
 update:function(slider,val) {


   var $employees = slider == 1?val:$("#employees").val();



    $("#employees").val($employees);
    $("#employees-label").text($employees+"%");




 },
 getSecondPart:function(str,delimiter) {
    return str.split(delimiter)[1];
  },
  commaReplace:function(str,char){
    str = str.replace(/,/g, "");
  }
}
