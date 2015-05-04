/////////////FUNCTIONS/////////////
function loadSlide1(){


  $.ajax({
      url: "views/slide1.html",

      success: function(html){


          $('#meat').hide().html(html).fadeIn({ duration: 500 });

          var options = {useEasing : true,useGrouping : true,separator : ',',decimal : '.',prefix : '$'}
          var premium = new countUp("reportPremium", 0, 6569, 0, 2,options);
          premium.start();


          var subsidy = new countUp("reportSubsidy", 0,4100, 0, 2,options);
          subsidy.start();

          var fee = new countUp("reportConsulting", 0,8100, 0, 2,options);


          var data1 = {
        labels:["1","2","3","4","5","6","7","8","9","10","11"],
        datasets: [
          {

              fillColor: "rgb(69,188,155)",
              strokeColor: "rgb(69,188,155)",
              highlightFill: "rgb(69,188,155)",
              highlightStroke: "rgb(69,188,155)",
              data:[20,60,10,90,45,67,20,72,85,90,55],
              label: "This data"
          },
          {

              fillColor: "rgb(111,112,112)",
              strokeColor: "rgb(111,112,112)",
              highlightFill: "rgb(111,112,112)",
              highlightStroke: "rgb(111,112,112)",
              data:[20,30,20,40,65,27,30,45,85,120,80],
              label: "That data"
          }
        ]
        };

        $('#reviewChart').empty();
        $('#reviewChart').append('<canvas id="reportReviewChart"></canvas>');
        var ctx = document.getElementById("reportReviewChart").getContext("2d");
        var myNewBar1 = new Chart(ctx).Bar(data1,{scaleShowGridLines:false,scaleShowVerticalLines: false,scaleShowHorizontalLines:false});


          fee.start();


      }
  });




}












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

          var options = {useEasing : true,useGrouping : true,separator : ',',decimal : '.',prefix : '$'}
          var premium = new countUp("reportPremium", 0, 6569, 0, 2,options);
          premium.start();


          var subsidy = new countUp("reportSubsidy", 0,4100, 0, 2,options);
          subsidy.start();

          var fee = new countUp("reportConsulting", 0,8100, 0, 2,options);


          var data1 = {
        labels:["1","2","3","4","5","6","7","8","9","10","11"],
        datasets: [
          {

              fillColor: "rgb(69,188,155)",
              strokeColor: "rgb(69,188,155)",
              highlightFill: "rgb(69,188,155)",
              highlightStroke: "rgb(69,188,155)",
              data:[20,60,10,90,45,67,20,72,85,90,55],
              label: "This data"
          },
          {

              fillColor: "rgb(111,112,112)",
              strokeColor: "rgb(111,112,112)",
              highlightFill: "rgb(111,112,112)",
              highlightStroke: "rgb(111,112,112)",
              data:[20,30,20,40,65,27,30,45,85,120,80],
              label: "That data"
          }
        ]
        };

        $('#reviewChart').empty();
        $('#reviewChart').append('<canvas id="reportReviewChart"></canvas>');
        var ctx = document.getElementById("reportReviewChart").getContext("2d");
        var myNewBar1 = new Chart(ctx).Bar(data1,{scaleShowGridLines:false,scaleShowVerticalLines: false,scaleShowHorizontalLines:false});


          fee.start();
        },2000)

      }
  });

});

//////BACK BUTTONS////////////
$('#meat').on('click','#back1',function() {
  $.ajax({
      url: "views/slide1.html",
      success: function(html){
        loadSlide1();
      }
  });
});

$('#meat').on('click','#back2',function() {
  $.ajax({
      url: "views/slide2.html",
      success: function(html){
        $('#meat').hide().html(html).fadeIn({ duration: 500 });

      }
  });
});
/////////END BACK BUTTONS////////



////////NEXT BUTTONS///////////
$('#meat').on('click','#slide2',function() {
  $.ajax({
      url: "views/slide2.html",
      success: function(html){
          $('#meat').hide().html(html).fadeIn({ duration: 500 });
          var options = {useEasing : true,useGrouping : true,separator : ',',decimal : '.',prefix : '$'}

          var employer = new countUp("employerSavings", 0, 3000, 0, 2,options);
          employer.start();
          var employee = new countUp("employeeSavings",0,70000,0,2,options);
          employee.start();
      }
  });
});



$('#meat').on('click','#slide3',function() {

  $.ajax({
      url: "views/slide3.html",
      success: function(html){
          $('#meat').hide().html(html).fadeIn({ duration: 500 });
          var options = {useEasing : true,useGrouping : true,separator : ',',decimal : '.',prefix : '$'}
          var employerSavings = $('employerSavings').text();
          var actual = parseInt(employerSavings) * 2;
          actual = parseInt(actual);
          var employer = new countUp("employerSavings",3000,6578, 0, 2,options);
          employer.start();
          var employeeSavings = $('employeeSavings').text();

          var employee = new countUp("employeeSavings",70000,94039,0,2,options);
          employee.start();
      }
  });
});
//////END NEXT BUTTONS




$('#meat').on('change','#checkbox1',function() {


  if ($(this).is(':checked')) {
    $('#salaryUp').append('<table style="width:100%;" class="table table-list-search remodelGray"><thead><p class="remodelGreen" style="text-align:left;">Salary Up</p></thead><tbody><tr><td><b>Premium</b></td><td id="reportPremium"></td></tr><tr><td><b>Subsidy</b></td><td id="reportSubsidy"></td></tr><tr><td><b>Consulting Fee</b></td><td id="reportConsulting"></td></tr></tr></tbody></table>');
    //employer.reset();
    //employee.reset();
    var options = {useEasing : true,useGrouping : true,separator : ',',decimal : '.',prefix : '$'}
    var employerSavings = $('employerSavings').text();
    var actual = parseInt(employerSavings) * 2;
    actual = parseInt(actual);
    var employer = new countUp("employerSavings",3000,6578, 0, 2,options);
    employer.start();
    var employeeSavings = $('employeeSavings').text();

    var employee = new countUp("employeeSavings",70000,94039,0,2,options);
    employee.start();
  } else {
    $('#salaryUp').empty();
    //employer.reset();
    //employee.reset();
    var options = {useEasing : true,useGrouping : true,separator : ',',decimal : '.',prefix : '$'}
    var employerSavings = $('employerSavings').text();
    var actual = parseInt(employerSavings) * 2;
    actual = parseInt(actual);
    var employer = new countUp("employerSavings",6578,3000, 0, 2,options);
    employer.start();
    var employeeSavings = $('employeeSavings').text();

    var employee = new countUp("employeeSavings",94039,70000,0,2,options);
    employee.start();
  }
});
$('#meat').on('change','#checkbox2',function() {


  if ($(this).is(':checked')) {
    $('#hsa').append('<table style="width:100%;" class="table table-list-search remodelGray"><thead><p class="remodelGreen" style="text-align:left;">HSA</p></thead><tbody><tr><td><b>Premium</b></td><td id="reportPremium"></td></tr><tr><td><b>Subsidy</b></td><td id="reportSubsidy"></td></tr><tr><td><b>Consulting Fee</b></td><td id="reportConsulting"></td></tr></tr></tbody></table>');

    var options = {useEasing : true,useGrouping : true,separator : ',',decimal : '.',prefix : '$'}
    var employerSavings = $('employerSavings').text();
    var actual = parseInt(employerSavings) * 2;
    actual = parseInt(actual);
    var employer = new countUp("employerSavings",6578,7000, 0, 2,options);
    employer.start();
    var employeeSavings = $('employeeSavings').text();

    var employee = new countUp("employeeSavings",94039,80100,0,2,options);
    employee.start();

  } else {
    $('#hsa').empty();

    var options = {useEasing : true,useGrouping : true,separator : ',',decimal : '.',prefix : '$'}
    var employerSavings = $('employerSavings').text();
    var actual = parseInt(employerSavings) * 2;
    actual = parseInt(actual);
    var employer = new countUp("employerSavings",7000,6578, 0, 2,options);
    employer.start();
    var employeeSavings = $('employeeSavings').text();

    var employee = new countUp("employeeSavings",80100,94039,0,2,options);
    employee.start();

  }
});
$('#meat').on('change','#checkbox3',function() {


  if ($(this).is(':checked')) {
    $('#teledoc').append('<table style="width:100%;" class="table table-list-search remodelGray"><thead><p class="remodelGreen" style="text-align:left;">Teledoc</p></thead><tbody><tr><td><b>Premium</b></td><td id="reportPremium"></td></tr><tr><td><b>Subsidy</b></td><td id="reportSubsidy"></td></tr><tr><td><b>Consulting Fee</b></td><td id="reportConsulting"></td></tr></tr></tbody></table>');

    var options = {useEasing : true,useGrouping : true,separator : ',',decimal : '.',prefix : '$'}
    var employerSavings = $('employerSavings').text();
    var actual = parseInt(employerSavings) * 2;
    actual = parseInt(actual);
    var employer = new countUp("employerSavings",7000,3578, 0, 2,options);
    employer.start();
    var employeeSavings = $('employeeSavings').text();

    var employee = new countUp("employeeSavings",80100,54039,0,2,options);
    employee.start();

  } else {
    $('#teledoc').empty();

    var options = {useEasing : true,useGrouping : true,separator : ',',decimal : '.',prefix : '$'}
    var employerSavings = $('employerSavings').text();
    var actual = parseInt(employerSavings) * 2;
    actual = parseInt(actual);
    var employer = new countUp("employerSavings",3578,7000, 0, 2,options);
    employer.start();
    var employeeSavings = $('employeeSavings').text();

    var employee = new countUp("employeeSavings",54039,80100,0,2,options);
    employee.start();

  }
});
