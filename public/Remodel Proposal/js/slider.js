
      //slider
      $(document).ready(function() {
          $("#slider").slider({
              range: "min",
              animate: true,

              min: 1,
              max: 100,
              step: 1,
              slide: function(event, ui) {
                update(1,ui.value); //changed
              }
          });


          //Added, set initial value.
          $("#employees").val(20);
          //$("#avgsalary").val(16);
          //$("#tlpremium").val(25);
          //$("#contribution").val(1);



          $("#employees-label").text(20);


          update();
          console.log("slider.js is here!");
      });






      //changed. now with parameter
      function update(slider,val) {


        var $employees = slider == 1?val:$("#employees").val();



         $("#employees").val($employees);
         $("#employees-label").text($employees+"%");
         var options = {useEasing : true,useGrouping : true,separator : ',',decimal : '.',prefix : '$'}
         var employerSavings = $('employerSavings').text();
         var actual = parseInt(employerSavings) * 2;
         actual = parseInt(actual);
         var employer = new countUp("employerSavings",7000,6578, 0, 2,options);
         employer.start();
         var employeeSavings = $('employeeSavings').text();

         var employee = new countUp("employeeSavings",80100,94039,0,2,options);
         employee.start();
         var indexToUpdate = Math.floor(Math.random() * REMODELPROPOSAL.chartData.labels.length-1)+1;


         REMODELPROPOSAL.bar1.datasets[1].bars[indexToUpdate].value = Math.floor(Math.random()*10)+1;
         REMODELPROPOSAL.bar1.datasets[0].bars[indexToUpdate].value = Math.floor(Math.random()*10)+1;


         REMODELPROPOSAL.bar1.update();

      }
