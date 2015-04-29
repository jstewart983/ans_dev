//####SLIDE 2#####
$('#step2').click(function() {
  var timeout = null;
  $('#slide').fadeOut(500,function(){

  //$('#slide').replaceWith('#loading');
  $('#loading').fadeIn(500);
  $('#loading').removeClass('hidden');
  });
  //$('#slide1').addClass("hidden");
  //$('#loading').removeClass("hidden");



  $.ajax({
      url: "views/slide1.html",

      success: function(html){

        setTimeout(function(){

          $("#gear").replaceWith("<span class='remodelGreen'>done!</span>");


        },2000)

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


        var ctx = document.getElementById("reportReviewChart").getContext("2d");
        var myNewBar1 = new Chart(ctx).Bar(data1,{scaleShowGridLines:false,scaleShowVerticalLines: false,scaleShowHorizontalLines:false});


          fee.start();
        },4000)





      }
  });





});






//####SLIDE 1#####
$('#next1').click(function() {

  $('#next1').fadeOut(500,function(){

      $('#next2').removeClass("invisible");

    $('#next2').fadeIn(600,function(){



    });

  });

    $('#box1').fadeOut(500,function(){

        $('#box2').removeClass("invisible");

      $('#box2').fadeIn(600,function(){
        if(!myNewBar1||!myNewPie1||!myNewBar2){

          var data1 = {
        labels:["1","2","3","4","5","6","7","8","9","10","11"],
        datasets: [
          {

              fillColor: "rgba(220,220,220,0.9)",
              strokeColor: "rgba(220,220,220,0.9)",
              highlightFill: "rgba(220,220,220,0.9)",
              highlightStroke: "rgba(220,220,220,.9)",
              data:[20,60,10,90,45,67,20,72,85,90,55],
              label: "This data"
          },
          {

              fillColor: "rgba(160,120,316,0.9)",
              strokeColor: "rgba(160,120,316,0.9)",
              highlightFill: "rgba(160,120,316,0.9)",
              highlightStroke: "rgba(160,120,316,0.9)",
              data:[20,30,20,90,45,67,20,45,85,90,80],
              label: "That data"
          }
        ]
        };


        var ctx = document.getElementById("bar1").getContext("2d");
        var myNewBar1 = new Chart(ctx).Bar(data1,{scaleShowGridLines:false,scaleShowVerticalLines: false,scaleShowHorizontalLines:false});

        var data2 = {
        labels:["1","2","3","4","5","6","7","8","9","10","11"],
        datasets: [
        {

        fillColor: "rgba(220,220,220,0.9)",
        strokeColor: "rgba(220,220,220,0.9)",
        highlightFill: "rgba(220,220,220,0.9)",
        highlightStroke: "rgba(220,220,220,.9)",
        data:[80,20,10,90,45,67,20,12,85,90,120],
        label: "This data"
        },
        {

        fillColor: "rgba(160,120,316,0.9)",
        strokeColor: "rgba(160,120,316,0.9)",
        highlightFill: "rgba(160,120,316,0.9)",
        highlightStroke: "rgba(160,120,316,0.9)",
        data:[50,60,10,34,49,67,87,12,44,90,30],
        label: "That data"
        }
        ]
        };


        var ctx = document.getElementById("bar2").getContext("2d");
        var myNewBar2 = new Chart(ctx).Bar(data2,{scaleShowGridLines:false,scaleShowVerticalLines: false,scaleShowHorizontalLines:false});


        var data3 = {
        labels:["1","2","3","4","5","6","7","8","9","10","11"],
        datasets: [
        {

        fillColor: "rgba(220,220,220,0.9)",
        strokeColor: "rgba(220,220,220,0.9)",
        highlightFill: "rgba(220,220,220,0.9)",
        highlightStroke: "rgba(220,220,220,.9)",
        data:[20,30,10,90,45,67,20,12,85,90,30],
        label: "This data"
        },
        {

        fillColor: "rgba(160,120,316,0.9)",
        strokeColor: "rgba(160,120,316,0.9)",
        highlightFill: "rgba(160,120,316,0.9)",
        highlightStroke: "rgba(160,120,316,0.9)",
        data:[20,30,10,90,45,67,20,12,85,90,30],
        label: "That data"
        }
        ]
        };


        var ctx = document.getElementById("pie1").getContext("2d");
        var myNewPie1 = new Chart(ctx).Bar(data3,{scaleShowGridLines:false,scaleShowVerticalLines: false,scaleShowHorizontalLines:false});


        }else{

          myNewBar1.update();
          myNewPie1.update();
          myNewBar2.update();

          }
      });

    });



});




//####SLIDE 2#####
$('#next2').click(function() {


    $('#box2').fadeOut(500,function(){

        $('#box3').removeClass("invisible");



      $('#box3').fadeIn(600,function(){



      });

    });

    $('#next2').fadeOut(500,function(){

        $('#next3').removeClass("invisible");

      $('#next3').fadeIn(600,function(){



      });

    });

});


//####GO BACK TO SLIDE 3#####
$('#back3').click(function() {


    $('#box3').fadeOut(500,function(){

        $('#box2').removeClass("invisible");



      $('#box2').fadeIn(600,function(){



      });

    });

    $('#next3').fadeOut(500,function(){

        $('#next2').removeClass("invisible");

      $('#next2').fadeIn(600,function(){



      });

    });

});


//####GO BACK TO SLIDE 2#####
$('#back2').click(function() {


    $('#box2').fadeOut(500,function(){

        $('#box1').removeClass("invisible");



      $('#box1').fadeIn(600,function(){



      });

    });

    $('#next2').fadeOut(500,function(){

        $('#next1').removeClass("invisible");

      $('#next1').fadeIn(600,function(){



      });

    });

});
