



//var chartData = "";
//var labels = '';
//var myNewBar1 = null;

      //slider
      $(document).ready(function() {
          $("#slider").slider({

              range: "min",
              animate: true,

              min: -100,
              max: 50,
              step: 10,
              slide: function(event, ui) {
                REMODELPROPOSAL.commonMethod.update(1,ui.value);
                var indexToUpdate = Math.floor(Math.random() * REMODELPROPOSAL.chartData.labels.length-1)+1;
                REMODELPROPOSAL.bar1.datasets[1].bars[indexToUpdate].value = Math.floor(Math.random()*20)+1;
                REMODELPROPOSAL.bar1.datasets[0].bars[indexToUpdate].value = Math.floor(Math.random()*20)+1;
                REMODELPROPOSAL.bar1.update();
                var options = {useEasing : true,useGrouping : true,separator : '',decimal : '.',prefix : '$'}
                var employerSavings = $('#employerSavings').text();
                employerSavings = REMODELPROPOSAL.commonMethod.getSecondPart(employerSavings,'$');


                var employeeSavings = $('#employeeSavings').text();
                employeeSavings = REMODELPROPOSAL.commonMethod.getSecondPart(employeeSavings,'$');


                var totalSavings = $('#totalSavings').text();
                totalSavings = REMODELPROPOSAL.commonMethod.getSecondPart(totalSavings,'$');



                var employer = new countUp("employerSavings",employerSavings,employerSavings*2, 0, 2,options);
                employer.start();
                var employeeSavings = $('#employeeSavings').text();

                var employee = new countUp("employeeSavings",employeeSavings,employeeSavings*2,0,2,options);
                employee.start(); //changed

                var total = new countUp("totalSavings",totalSavings,employeeSavings+employerSavings,0,2,options);
                total.start(); //changed
              }
          });


          //Added, set initial value.
          $("#employees").val(20);
          //$("#avgsalary").val(16);
          //$("#tlpremium").val(25);
          //$("#contribution").val(1);



          $("#employees-label").text(20);


          REMODELPROPOSAL.commonMethod.update();
          console.log("slider.js is here!");
      });






      //changed. now with parameter
      /*function update(slider,val) {


        var $employees = slider == 1?val:$("#employees").val();



         $("#employees").val($employees);
         $("#employees-label").text($employees+"%");
         var options = {useEasing : true,useGrouping : true,separator : '',decimal : '.',prefix : '$'}
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

      }*/





//////////EVENT LISTENERS///////////


/////FIRST NEXT BUTTON WITH "THINKING" animation////
$('#slide1').click(function() {

  var timeout = null;
  $('#slide').fadeOut(500,function(){

  //$('#slide').replaceWith('#loading');
  $('#loading').fadeIn(500);
  $('#loading').removeClass('hidden');

  });

  $.ajax({

      url: "views/slide1.html",

      success: function(html){

        setTimeout(function(){

          $("#gear").replaceWith("<span class='remodelGreen'>done!</span>");


        },1000)

        setTimeout(function(){

          $('#loading').fadeOut();
          $('#meat').hide().html(html).fadeIn({ duration: 2000 });

          var options = {useEasing : true,useGrouping : true,separator : '',decimal : '.',prefix : '$'}

                    var employer = new countUp("employerSavings", 0, 3000, 0, 2,options);
                    employer.start();
                    var employee = new countUp("employeeSavings",0,70000,0,2,options);
                    employee.start();
                    var total = new countUp("totalSavings",40100,194039,0,2,options);
                    total.start(); //changed


           REMODELPROPOSAL.chartData = {
        labels:["1","2","3","4","5","6"],
        datasets: [
          {

              fillColor: "rgb(69,188,155)",
              strokeColor: "rgb(69,188,155)",
              highlightFill: "rgb(69,188,155)",
              highlightStroke: "rgb(69,188,155)",
              data:[20,60,10,90,45,67],
              label: "This data"
          },
          {

              fillColor: "rgb(111,112,112)",
              strokeColor: "rgb(111,112,112)",
              highlightFill: "rgb(111,112,112)",
              highlightStroke: "rgb(111,112,112)",
              data:[20,30,20,40,65,27],
              label: "That data"
          }
        ]
        };

        $('#reviewChart').empty();
        $('#reviewChart').append('<canvas id="reportReviewChart"></canvas>');
        REMODELPROPOSAL.commonMethod.generateBarChart("reportReviewChart",REMODELPROPOSAL.chartData);

        //var ctx = document.getElementById("reportReviewChart").getContext("2d");
         //myNewBar1 = new Chart(ctx).Bar(chartData,{scaleShowGridLines:false,scaleShowVerticalLines: false,scaleShowHorizontalLines:false});



        },2000)
        //console.log(REMODELPROPOSAL.chartData);

      }
  });

});

//**START BACK BUTTONS**//

REMODELPROPOSAL.commonMethod.addButtonAction('#meat','click','#back1',"views/slide1.html");
REMODELPROPOSAL.commonMethod.addButtonAction('#meat','click','#back2',"views/slide2.html");

//**END BACK BUTTONS**//


//**START NEXT BUTTONS**//

//Lets Remodel! button
REMODELPROPOSAL.commonMethod.addButtonAction('#meat','click','#slide2',"views/slide2.html");

//**END NEXT BUTTONS**//




$('#meat').on('click','#slide3',function() {


  $.ajax({
      url: "views/slide3.html",
      success: function(html){

          $('#meat').hide().html(html).fadeIn({ duration: 500 });

          var options = {useEasing : true,useGrouping : true,separator : '',decimal : '.',prefix : '$'}
          var employerSavings = $('employerSavings').text();
          var actual = parseInt(employerSavings) * 2;
          actual = parseInt(actual);
          var employer = new countUp("employerSavings",3000,6578, 0, 2,options);
          employer.start();
          var employeeSavings = $('employeeSavings').text();

          var employee = new countUp("employeeSavings",70000,94039,0,2,options);
          employee.start();
          var total = new countUp("totalSavings",40100,194039,0,2,options);
          total.start(); //changed

    REMODELPROPOSAL.chartData = {
        labels:["1","2","3","4","5","6"],
        datasets: [
          {

              fillColor: "rgb(69,188,155)",
              strokeColor: "rgb(69,188,155)",
              highlightFill: "rgb(69,188,155)",
              highlightStroke: "rgb(69,188,155)",
              data:[20,60,10,90,45,67],
              label: "This data"
          },
          {

              fillColor: "rgb(111,112,112)",
              strokeColor: "rgb(111,112,112)",
              highlightFill: "rgb(111,112,112)",
              highlightStroke: "rgb(111,112,112)",
              data:[20,30,20,40,65,27],
              label: "That data"
          }
        ]
        };
        $('#reviewChart').empty();
        $('#reviewChart').append('<canvas id="reportReviewChart"></canvas>');

        REMODELPROPOSAL.commonMethod.generateBarChart("reportReviewChart",REMODELPROPOSAL.chartData);
        //var ctx = document.getElementById("reportReviewChart").getContext("2d");
         //myNewBar1 = new Chart(ctx).Bar(chartData,{scaleShowGridLines:false,scaleShowVerticalLines: false,scaleShowHorizontalLines:false});
         console.log(REMODELPROPOSAL.chartData);
      }
  });
});
//////END NEXT BUTTONS




$('#meat').on('change','#checkbox1',function() {



  if ($(this).is(':checked')) {

    var indexToUpdate = Math.floor(Math.random() * REMODELPROPOSAL.chartData.labels.length-1)+1;


REMODELPROPOSAL.bar1.datasets[1].bars[indexToUpdate].value = Math.floor(Math.random()*20)+1;
REMODELPROPOSAL.bar1.datasets[0].bars[indexToUpdate].value = Math.floor(Math.random()*20)+1;


REMODELPROPOSAL.bar1.update();


    $('#salary').removeClass('hidden');
    //employer.reset();
    //employee.reset();
    var options = {useEasing : true,useGrouping : true,separator : '',decimal : '.',prefix : '$'}
    var employerSavings = $(REMODELPROPOSAL.employerSavingsEl).text();
    var actual = parseInt(employerSavings) * 2;
    actual = parseInt(actual);
    var employer = new countUp("employerSavings",3000,6578, 0, 2,options);
    employer.start();
    var employeeSavings = $('employeeSavings').text();

    var employee = new countUp("employeeSavings",70000,94039,0,2,options);
    employee.start();
    var total = new countUp("totalSavings",40100,194039,0,2,options);
    total.start(); //changed


  $('#salary').on('change','#percentCheckbox',function() {


  if ($(this).is(':checked')) {

    $('#percentSlider').removeClass('hidden');

    var indexToUpdate = Math.floor(Math.random() * REMODELPROPOSAL.chartData.labels.length-1)+1;


    REMODELPROPOSAL.bar1.datasets[1].bars[indexToUpdate].value = Math.floor(Math.random()/10)+1;
    REMODELPROPOSAL.bar1.datasets[0].bars[indexToUpdate].value = Math.floor(Math.random()/10)+1;


    REMODELPROPOSAL.bar1.update();

    var options = {useEasing : true,useGrouping : true,separator : '',decimal : '.',prefix : '$'}
    var employerSavings = $('employerSavings').text();
    var actual = parseInt(employerSavings) * 2;
    actual = parseInt(actual);
    var employer = new countUp("employerSavings",7000,6578, 0, 2,options);
    employer.start();
    var employeeSavings = $('employeeSavings').text();

    var employee = new countUp("employeeSavings",80100,94039,0,2,options);
    employee.start();
    var total = new countUp("totalSavings",40100,194039,0,2,options);
    total.start(); //changed

  } else {

    $('#percentSlider').addClass('hidden');

    var indexToUpdate = Math.floor(Math.random() * REMODELPROPOSAL.chartData.labels.length-1)+1;


    REMODELPROPOSAL.bar1.datasets[1].bars[indexToUpdate].value = Math.floor(Math.random()*5)+1;
    REMODELPROPOSAL.bar1.datasets[0].bars[indexToUpdate].value = Math.floor(Math.random()*5)+1;


    REMODELPROPOSAL.bar1.update();

    var options = {useEasing : true,useGrouping : true,separator : '',decimal : '.',prefix : '$'}
    var employerSavings = $('employerSavings').text();
    var actual = parseInt(employerSavings) * 2;
    actual = parseInt(actual);
    var employer = new countUp("employerSavings",7000,6578, 0, 2,options);
    employer.start();
    var employeeSavings = $('employeeSavings').text();

    var employee = new countUp("employeeSavings",80100,94039,0,2,options);
    employee.start();
    var total = new countUp("totalSavings",40100,194039,0,2,options);
    total.start(); //changed

  }

  });
        $('#salary').on('change','#byFamily',function() {


  if ($(this).is(':checked')) {

    $('#byFamilyDetail').removeClass('hidden');

    var indexToUpdate = Math.floor(Math.random() * REMODELPROPOSAL.chartData.labels.length-1)+1;


    REMODELPROPOSAL.bar1.datasets[1].bars[indexToUpdate].value = Math.floor(Math.random()*10)+1;
    REMODELPROPOSAL.bar1.datasets[0].bars[indexToUpdate].value = Math.floor(Math.random()*10)+1;


    REMODELPROPOSAL.bar1.update();

    var options = {useEasing : true,useGrouping : true,separator : '',decimal : '.',prefix : '$'}
    var employerSavings = $('employerSavings').text();
    var actual = parseInt(employerSavings) * 2;
    actual = parseInt(actual);
    var employer = new countUp("employerSavings",7000,6578, 0, 2,options);
    employer.start();
    var employeeSavings = $('employeeSavings').text();

    var employee = new countUp("employeeSavings",80100,94039,0,2,options);
    employee.start();
    var total = new countUp("totalSavings",40100,194039,0,2,options);
    total.start(); //changed

  } else {

    $('#byFamilyDetail').addClass('hidden');

    var indexToUpdate = Math.floor(Math.random() * REMODELPROPOSAL.chartData.labels.length-1)+1;


    REMODELPROPOSAL.bar1.datasets[1].bars[indexToUpdate].value = Math.floor(Math.random()*5)+1;
    REMODELPROPOSAL.bar1.datasets[0].bars[indexToUpdate].value = Math.floor(Math.random()*5)+1;


    REMODELPROPOSAL.bar1.update();

    var options = {useEasing : true,useGrouping : true,separator : '',decimal : '.',prefix : '$'}
    var employerSavings = $('employerSavings').text();
    var actual = parseInt(employerSavings) * 2;
    actual = parseInt(actual);
    var employer = new countUp("employerSavings",7000,6578, 0, 2,options);
    employer.start();
    var employeeSavings = $('employeeSavings').text();

    var employee = new countUp("employeeSavings",80100,94039,0,2,options);
    employee.start();
    var total = new countUp("totalSavings",40100,194039,0,2,options);
    total.start(); //changed

  }
      });

  } else {
    $('#salary').addClass('hidden');

    var indexToUpdate = Math.floor(Math.random() * REMODELPROPOSAL.chartData.labels.length-1)+1;


    REMODELPROPOSAL.bar1.datasets[1].bars[indexToUpdate].value = Math.floor(Math.random()*10)+1;
    REMODELPROPOSAL.bar1.datasets[0].bars[indexToUpdate].value = Math.floor(Math.random()*10)+1;


    REMODELPROPOSAL.bar1.update();
    //employer.reset();
    //employee.reset();
    var options = {useEasing : true,useGrouping : true,separator : '',decimal : '.',prefix : '$'}
    var employerSavings = $('employerSavings').text();
    var actual = parseInt(employerSavings) * 2;
    actual = parseInt(actual);
    var employer = new countUp("employerSavings",6578,3000, 0, 2,options);
    employer.start();
    var employeeSavings = $('employeeSavings').text();

    var employee = new countUp("employeeSavings",94039,70000,0,2,options);
    employee.start();
    var total = new countUp("totalSavings",40100,194039,0,2,options);
    total.start(); //changed
  }
});
$('#meat').on('change','#checkbox2',function() {


  if ($(this).is(':checked')) {


    var indexToUpdate = Math.floor(Math.random() * REMODELPROPOSAL.chartData.labels.length-1)+1;


    REMODELPROPOSAL.bar1.datasets[1].bars[indexToUpdate].value = Math.floor(Math.random()*20)+1;
    REMODELPROPOSAL.bar1.datasets[0].bars[indexToUpdate].value = Math.floor(Math.random()*20)+1;


    REMODELPROPOSAL.bar1.update();
    //$('#hsa').append('<table style="width:100%;" class="table table-list-search remodelGray"><thead><p class="remodelGreen" style="text-align:left;">HSA</p></thead><tbody><tr><td><b>Single</b></td><td id="reportPremium"><div class="form-group"><input type="text" class="form-control" name="Name" autocomplete="off" id="name" placeholder="$150"></div></td></tr><tr><td><b>Subsidy</b></td><td id="reportSubsidy"></td></tr><tr><td><b>Consulting Fee</b></td><td id="reportConsulting"></td></tr></tr></tbody></table>');
    $('#hsa').removeClass('hidden');
    var options = {useEasing : true,useGrouping : true,separator : '',decimal : '.',prefix : '$'}
    var employerSavings = $('employerSavings').text();
    var actual = parseInt(employerSavings) * 2;
    actual = parseInt(actual);
    var employer = new countUp("employerSavings",6578,7000, 0, 2,options);
    employer.start();
    var employeeSavings = $('employeeSavings').text();

    var employee = new countUp("employeeSavings",94039,80100,0,2,options);
    employee.start();
    var total = new countUp("totalSavings",40100,194039,0,2,options);
    total.start(); //changed

    //if HSA Single field is updated - do the calculations below
    //in order to do this correctly, I need to check the previous value to see
    //if there was a change to have live updating values that are correct
    $( "#meat").on('change', "#single",function() {

  	var num = $(this).val();
  	num = parseInt(num);

    var indexToUpdate = Math.floor(Math.random() * REMODELPROPOSAL.chartData.labels.length-1)+1;


    REMODELPROPOSAL.bar1.datasets[1].bars[indexToUpdate].value = Math.floor(Math.random()*num)+1;
    REMODELPROPOSAL.bar1.datasets[0].bars[indexToUpdate].value = Math.floor(Math.random()*num)+1;


    REMODELPROPOSAL.bar1.update();

    var options = {useEasing : true,useGrouping : true,separator : '',decimal : '.',prefix : '$'}
    var employerSavings = $('employerSavings').text();
    var actual = parseInt(employerSavings) * 2;
    actual = parseInt(actual);
    var employer = new countUp("employerSavings",6578,7000, 0, 2,options);
    employer.start();
    var employeeSavings = $('employeeSavings').text();

    var employee = new countUp("employeeSavings",94039,80100,0,2,options);
    employee.start();
    var total = new countUp("totalSavings",40100,194039,0,2,options);
    total.start(); //changed


});

    //if HSA couple field is updated - do the calculations below
    $( "#meat").on('change', "#couple",function() {

  	var num = $(this).val();
  	num = parseInt(num);

    var indexToUpdate = Math.floor(Math.random() * REMODELPROPOSAL.chartData.labels.length-1)+1;


    REMODELPROPOSAL.bar1.datasets[1].bars[indexToUpdate].value = Math.floor(Math.random()*num)+1;
    REMODELPROPOSAL.bar1.datasets[0].bars[indexToUpdate].value = Math.floor(Math.random()*num)+1;


    REMODELPROPOSAL.bar1.update();

    var options = {useEasing : true,useGrouping : true,separator : '',decimal : '.',prefix : '$'}
    var employerSavings = $('employerSavings').text();
    var actual = parseInt(employerSavings) * 2;
    actual = parseInt(actual);
    var employer = new countUp("employerSavings",6578,7000, 0, 2,options);
    employer.start();
    var employeeSavings = $('employeeSavings').text();

    var employee = new countUp("employeeSavings",94039,80100,0,2,options);
    employee.start();
    var total = new countUp("totalSavings",40100,194039,0,2,options);
    total.start(); //changed


});

    //if HSA single parent field is updated - do the calculations below
   $( "#meat").on('change', "#singleParent",function() {

  	var num = $(this).val();
  	num = parseInt(num);

    var indexToUpdate = Math.floor(Math.random() * REMODELPROPOSAL.chartData.labels.length-1)+1;


    REMODELPROPOSAL.bar1.datasets[1].bars[indexToUpdate].value = Math.floor(Math.random()*num)+1;
    REMODELPROPOSAL.bar1.datasets[0].bars[indexToUpdate].value = Math.floor(Math.random()*num)+1;


    REMODELPROPOSAL.bar1.update();

    var options = {useEasing : true,useGrouping : true,separator : '',decimal : '.',prefix : '$'}
    var employerSavings = $('employerSavings').text();
    var actual = parseInt(employerSavings) * 2;
    actual = parseInt(actual);
    var employer = new countUp("employerSavings",6578,7000, 0, 2,options);
    employer.start();
    var employeeSavings = $('employeeSavings').text();

    var employee = new countUp("employeeSavings",94039,80100,0,2,options);
    employee.start();
    var total = new countUp("totalSavings",40100,194039,0,2,options);
    total.start(); //changed

});


    //if HSA family field is updated - do the calculations below
    $( "#meat").on('change', "#family",function() {

  	var num = $(this).val();
  	num = parseInt(num);

    var indexToUpdate = Math.floor(Math.random() * REMODELPROPOSAL.chartData.labels.length-1)+1;


    REMODELPROPOSAL.bar1.datasets[1].bars[indexToUpdate].value = Math.floor(Math.random()*num)+1;
    REMODELPROPOSAL.bar1.datasets[0].bars[indexToUpdate].value = Math.floor(Math.random()*num)+1;


    REMODELPROPOSAL.bar1.update();

    var options = {useEasing : true,useGrouping : true,separator : '',decimal : '.',prefix : '$'}
    var employerSavings = $('employerSavings').text();
    var actual = parseInt(employerSavings) * 2;
    actual = parseInt(actual);
    var employer = new countUp("employerSavings",6578,7000, 0, 2,options);
    employer.start();
    var employeeSavings = $('employeeSavings').text();

    var employee = new countUp("employeeSavings",94039,80100,0,2,options);
    employee.start();
    var total = new countUp("totalSavings",40100,194039,0,2,options);
    total.start(); //changed


});



  } else {
    $('#hsa').addClass('hidden');
    //$('#hsa').empty();

    var indexToUpdate = Math.floor(Math.random() * REMODELPROPOSAL.chartData.labels.length-1)+1;


    REMODELPROPOSAL.bar1.datasets[1].bars[indexToUpdate].value = Math.floor(Math.random()*10)+1;
    REMODELPROPOSAL.bar1.datasets[0].bars[indexToUpdate].value = Math.floor(Math.random()*10)+1;


    REMODELPROPOSAL.bar1.update();

    var options = {useEasing : true,useGrouping : true,separator : '',decimal : '.',prefix : '$'}
    var employerSavings = $('employerSavings').text();
    var actual = parseInt(employerSavings) * 2;
    actual = parseInt(actual);
    var employer = new countUp("employerSavings",7000,6578, 0, 2,options);
    employer.start();
    var employeeSavings = $('employeeSavings').text();

    var employee = new countUp("employeeSavings",80100,94039,0,2,options);
    employee.start();
    var total = new countUp("totalSavings",40100,194039,0,2,options);
    total.start(); //changed

  }
});

$( "#meat").on('REMODELPROPOSAL.commonMethod.update', "#employees",function() {

  var indexToUpdate = Math.floor(Math.random() * REMODELPROPOSAL.chartData.labels.length-1)+1;


  REMODELPROPOSAL.bar1.datasets[1].bars[indexToUpdate].value = Math.floor(Math.random()*10)+1;
  REMODELPROPOSAL.bar1.datasets[0].bars[indexToUpdate].value = Math.floor(Math.random()*10)+1;


  REMODELPROPOSAL.bar1.update();



});
