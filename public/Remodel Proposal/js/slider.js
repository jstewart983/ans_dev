
      //slider
      $(document).ready(function() {
          $("#slider").slider({
              range: "min",
              animate: true,

              min: 50,
              max: 500,
              step: 1,
              slide: function(event, ui) {
                update(1,ui.value); //changed
              }
          });

          $("#slider2").slider({
              range: "min",
              animate: true,

              min: 16,
              max: 100,
              step: 1,
              slide: function(event, ui) {
                update(2,ui.value); //changed
              }
          });

          $("#slider3").slider({
              range: "min",
              animate: true,

              min: 25,
              max: 1000,
              step: 5,
              slide: function(event, ui) {
                update(3,ui.value); //changed
              }
          });

          $("#slider4").slider({
              range: "min",
              animate: true,

              min: 0,
              max: 1000,
              step: 5,
              slide: function(event, ui) {
                update(4,ui.value); //changed
              }
          });

          //Added, set initial value.
          $("#employees").val(50);
          $("#avgsalary").val(16);
          $("#tlpremium").val(25);
          $("#contribution").val(1);



          $("#employees-label").text(50);
          $("#avgsalary-label").text(16);
          $("#tlpremium-label").text(25);
          $("#contribution-label").text(1);

          update();
      });
      function numberWithCommas(x) {

        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");

      }
         function searchStringInArray (str, strArray) {
          afterComma = "";
          for (var j=0; j<strArray.length; j++) {
          if (strArray[j].match(str))

            return strArray[j].toString();
          }
          return -1;
        }


      //changed. now with parameter
      function update(slider,val) {

        //array of premium(IP) values
        var ipArray = ["16000/0","17000/0","18000/0","19000/0","20000/0","21000/0","22000/8000","23000/8000","24000/8000","25000/8000","26000/8000","27000/8000","28000/8000","29000/8000","30000/8000","31000/8000","32000/8000","33000/8000","33000/8000","34000/8000","35000/8000","36000/8000","37000/8000","38000/8000","39000/8000","40000/8000","41000/8000","42000/8000","43000/8000","44000/8000","45000/8000","46000/8000","47000/8000","48000/8000","49000/8000","50000/8000","51000/8000","52000/8000","53000/8000","54000/8000","55000/8000","56000/8000","57000/8000","58000/8000","59000/8000","60000/8000","61000/8000","62000/8000","63000/8000","64000/8000","65000/8000","66000/8000","67000/8000","68000/8000","69000/8000","70000/8000","71000/8000","72000/8000","73000/8000","74000/8000","75000/8000","76000/8000","77000/8000","78000/8000","79000/8000","80000/8000","81000/8000","82000/8000","83000/8000","84000/8000","85000/8000","86000/8000","87000/8000","88000/8000","89000/8000","90000/8000","91000/8000","92000/8000","93000/8000","94000/8000","95000/8000","96000/8000","97000/8000","98000/8000","99000/8000","100000/8000"];

        //array of subsidy(SU) values
         var suArray = ["16000/0","17000/0","18000/0","19000/0","20000/0","21000/0","22000/5116","23000/5001","24000/4869","25000/4760","26000/4645","27000/4524","28000/4385","29000/4253","30000/4116","31000/3958","32000/3813","33000/3680","34000/3543","35000/3390","36000/3244","37000/3095","38000/2927","39000/2769","40000/2608","41000/2456","42000/2288","43000/2129","44000/1966","45000/1800","46000/1617","47000/1443","48000/1280","49000/1185","50000/1090","51000/995","52000/900","53000/805","54000/710","55000/615","56000/520","57000/425","58000/330","59000/235","60000/140","61000/45","62000/0","63000/0","64000/0","65000/0","66000/0","67000/0","68000/0","69000/0","70000/0","71000/0","72000/0","73000/0","74000/0","75000/0","76000/0","77000/0","78000/0","79000/0","80000/0","81000/0","82000/0","83000/0","84000/0","85000/0","86000/0","87000/0","88000/0","89000/0","90000/0","91000/0","92000/0","93000/0","94000/0","95000/0","96000/0","97000/0","98000/0","99000/0","100000/0"];

        //changed. Now, directly take value from ui.value. if not set (initial, will use current value.)

        var $employees = slider == 1?val:$("#employees").val();
        /*var $avgsalary = slider == 2?val:$("#avgsalary").val();
        var $tlpremium = slider == 3?val:$("#tlpremium").val();
        var $contribution = slider == 4?val:$("#contribution").val();*/



         //Loop through the Premiums array until the avgsalary text is found

         //the premium is now .95 of $tlpremium

         //Get all characters after the / to retrieve the premium corresponding with the average salary



         //Loop through the Subsidies array until the avgsalary text is found
         //var $su = searchStringInArray((parseFloat($avgsalary)*1000).toString(),suArray);

        //Get all characters after the / to retrieve the subsidy corresponding with the average salary
         //var $su = $su.substr($su.indexOf("/") + 1);
         /*$su = parseFloat($su);
         $employees = parseFloat($employees);
         $contribution = parseFloat($contribution);
         $tlpremium = parseFloat($tlpremium);
         $avgsalary = parseFloat($avgsalary);*/

         /*var $ee = $employees;
         var $es = $avgsalary * 1000;
         var $gp = $tlpremium * 1000;
         var $ec = $contribution * 1000;
         var $ip = $gp * .95;*/


////////////////RESULT 1/////////////////////////////

          //if($ee < 50){
            //If EE <50 (EC*12)-(((GP-EC)*12)*.0765)
            //$employersavings = (($ec)*12)-(((($gp)-($ec))*12)*.0765);



          //}else{
            //If EE =>100 (GP*12*EC) -  ((EE-80) * 2,000)
            //$employersavings = (($ec)*12)-(((($gp)-($ec))*12)*.0765) - (($ee-30)*2805);


          //}

////////////////END RESULT 1////////////////////////////



/////////////////RESULT 2///////////////////////////////


        //$employeesavings = ((($gp) - $ec)*12) - ((($ip * 12)) -  ($ee*$su)) - ((($gp-$ec)*12)*.25);



/////////////////END RESULT 2///////////////////////////////



//////////////////RESULT 3/////////////////////////////////
        //Total Annual Savings sum of result 1 and result 2
        //$totalsavings = $employersavings + $employeesavings;


/////////////////END RESULT 3///////////////////////////////



        //Total Estimated Premium Tax Credits for Employees
        //$premiumtax = $ee * $su;

        //Append "$" to the totals with commas added
        /*$employersavings = "$" + numberWithCommas(Math.round($employersavings));
        $employeesavings = "$" + numberWithCommas(Math.round($employeesavings));
        $totalsavings = "$" + numberWithCommas(Math.round($totalsavings));
        $premiumtax = " " + "$" + numberWithCommas($premiumtax);*/



         $("#employees").val($employees);
         $("#employees-label").text($employees);
         /*$("#avgsalary").val($avgsalary);
         $("#avgsalary-label").text($avgsalary);
         $("#tlpremium").val($tlpremium);
         $("#tlpremium-label").text($tlpremium);
         $("#contribution").val($contribution);
         $("#contribution-label").text($contribution);
         $( "#employersavings" ).val($employersavings);
         $( "#employersavings-label" ).text($employersavings);
         $( "#employeesavings" ).val($employeesavings);
         $( "#employeesavings-label" ).text($employeesavings);
         $( "#totalsavings" ).val($totalsavings);
         $( "#totalsavings-label" ).text($totalsavings);
         $( "#premiumtax" ).val($premiumtax);
         $( "#premiumtax-label" ).text($premiumtax);*/


         //$('#slider a').html('<label><span class="glyphicon glyphicon-map-marker"></span> '+$employees+' <span class="glyphicon glyphicon-chevron-right"></span></label>');
        // $('#slider2 a').html('<label><span class="glyphicon glyphicon-chevron-left"></span> '+$avgsalary+' <span class="glyphicon glyphicon-chevron-right"></span></label>');
        // $('#slider3 a').html('<label><span class="glyphicon glyphicon-chevron-left"></span> '+$tlpremium+' <span class="glyphicon glyphicon-chevron-right"></span></label>');
        // $('#slider4 a').html('<label><span class="glyphicon glyphicon-chevron-left"></span> '+$contribution+' <span class="glyphicon glyphicon-chevron-right"></span></label>');
      }