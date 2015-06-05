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

  }
}
